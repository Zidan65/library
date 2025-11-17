<?php
class M_buku extends CI_Model {

    public function result_dat($id = null)
    {
        $cari = $this->input->post('cari') ?? '';
    
        $sql = "SELECT b.*, k.nama AS nama_kategori, 
                COALESCE(b.status, 'tersedia') as status
                FROM buku b
                LEFT JOIN kategori k ON k.id = b.id_kategori
                WHERE 1=1";
        
        $params = [];
    
        // filter by ID (untuk detail buku tertentu)
        if ($id) {
            $sql .= " AND b.id_buku = ?";
            $params[] = $id;
        }
    
        // filter pencarian judul atau pengarang
        if (!empty($cari)) {
            $sql .= " AND (b.judul LIKE ? OR b.pengarang LIKE ?)";
            $params[] = "%$cari%";
            $params[] = "%$cari%";
        }
    
        $sql .= " ORDER BY b.id_buku DESC";
    
        $query = $this->db->query($sql, $params);
        return $query->result();
    }

    // Method baru untuk filter buku dengan AJAX
    public function get_books_filtered($search = '', $category = '')
    {
        $sql = "SELECT b.*, k.nama AS nama_kategori,
                COALESCE(b.status, 'tersedia') as status
                FROM buku b
                LEFT JOIN kategori k ON k.id = b.id_kategori
                WHERE 1=1";
        
        $params = [];
    
        // filter pencarian judul atau pengarang
        if (!empty($search)) {
            $sql .= " AND (b.judul LIKE ? OR b.pengarang LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        // filter kategori
        if (!empty($category)) {
            $sql .= " AND b.id_kategori = ?";
            $params[] = $category;
        }
    
        $sql .= " ORDER BY b.id_buku DESC";
    
        $query = $this->db->query($sql, $params);
        return $query->result();
    }

    public function row_data($id)
    {
        $sql = "SELECT b.*, k.nama AS nama_kategori,
                COALESCE(b.status, 'tersedia') as status
                FROM buku b
                LEFT JOIN kategori k ON k.id = b.id_kategori
                WHERE b.id_buku = ?";
        
        $query = $this->db->query($sql, [$id]);
        return $query->row();
    }

    // Method untuk menghitung total buku
    public function count_total_buku()
    {
        return $this->db->count_all('buku');
    }

    public function count_buku_tersedia()
    {
        $this->db->where('status', 'tersedia');
        $this->db->or_where('status IS NULL');
        return $this->db->count_all_results('buku');
    }

    public function count_buku_dipinjam()
    {
        $this->db->where('status', 'dipinjam');
        return $this->db->count_all_results('buku');
    }

    public function count_total_kategori()
    {
        return $this->db->count_all('kategori');
    }

    public function count_total_peminjaman()
    {
        return $this->db->count_all('peminjaman');
    }

    // Tambah data buku
    public function tambah()
    {
        $judul = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $id_kategori = $this->input->post('id_kategori');
        $deskripsi = $this->input->post('deskripsi');
        $cover = '';

        // Handle file upload
        if (!empty($_FILES['cover']['name'])) {
            $config['upload_path'] = './assets/cover/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('cover')) {
                return [
                    'status' => false,
                    'message' => $this->upload->display_errors()
                ];
            }

            $cover = $this->upload->data('file_name');
        }

        $inputan = array(
            'judul' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'id_kategori' => $id_kategori,
            'deskripsi' => $deskripsi,
            'cover' => $cover,
            'status' => 'tersedia' // Default status
        );

        $this->db->trans_begin();
        $this->db->insert('buku', $inputan);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => "Data Gagal Ditambahkan"];
        } else {
            $this->db->trans_commit();
            return ['status' => true, 'message' => "Data Berhasil Ditambahkan"];
        }
    }

    // Edit data buku
    public function edit()
    {
        $id_buku = $this->input->post('id_buku');
        $judul = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $id_kategori = $this->input->post('id_kategori');
        $deskripsi = $this->input->post('deskripsi');

        $inputan = array(
            'judul' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'id_kategori' => $id_kategori,
            'deskripsi' => $deskripsi
        );

        // Handle file upload jika ada file baru
        if (!empty($_FILES['cover']['name'])) {
            $config['upload_path'] = './assets/cover/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('cover')) {
                return [
                    'status' => false,
                    'message' => $this->upload->display_errors()
                ];
            }

            $cover = $this->upload->data('file_name');
            $inputan['cover'] = $cover;

            // Hapus file lama
            $old = $this->db->get_where('buku', ['id_buku' => $id_buku])->row();
            if ($old && $old->cover && file_exists('./assets/cover/' . $old->cover)) {
                unlink('./assets/cover/' . $old->cover);
            }
        }

        $this->db->trans_begin();
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $inputan);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => "Data Gagal Diedit"];
        } else {
            $this->db->trans_commit();
            return ['status' => true, 'message' => "Data Berhasil Diedit"];
        }
    }

    public function hapus()
    {
        $id_buku = $this->input->post('id_buku');

        // Cek apakah buku sedang dipinjam
        $this->db->where('id_buku', $id_buku);
        $this->db->where('status', 'dipinjam');
        $peminjaman = $this->db->get('peminjaman')->row();
        
        if ($peminjaman) {
            return ['status' => false, 'message' => "Buku tidak dapat dihapus karena sedang dipinjam"];
        }

        // Ambil data buku untuk menghapus file cover
        $buku = $this->db->get_where('buku', ['id_buku' => $id_buku])->row();

        $this->db->trans_begin();
        $this->db->where('id_buku', $id_buku);
        $this->db->delete('buku');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => "Data Gagal Dihapus"];
        } else {
            // Hapus file cover jika ada
            if ($buku && $buku->cover && file_exists('./assets/cover/' . $buku->cover)) {
                unlink('./assets/cover/' . $buku->cover);
            }
            
            $this->db->trans_commit();
            return ['status' => true, 'message' => "Data Berhasil Dihapus"];
        }
    }

    public function nama_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get()->result();
    }
}