<?php
class M_peminjaman extends CI_Model {

    public function result_dat($cari = '')
    {
        // Query yang diperbaiki untuk menangani pencarian
        $sql = "SELECT p.*, 
                       b.judul as judul_buku, 
                       p.nama_user as nama_user
                FROM peminjaman p
                LEFT JOIN buku b ON b.id_buku = p.id_buku
                WHERE 1=1";
        
        $params = [];
        
        // Tambahkan kondisi pencarian jika ada
        if (!empty($cari)) {
            $sql .= " AND (p.nama_user LIKE ? OR b.judul LIKE ?)";
            $params[] = "%$cari%";
            $params[] = "%$cari%";
        }
        
        $sql .= " ORDER BY p.id_peminjaman DESC";
        
        $query = $this->db->query($sql, $params);
        return $query->result();
    }

    public function count_total_peminjaman()
    {
        return $this->db->count_all('peminjaman');
    }
    
    public function count_active_peminjaman()
    {
        $this->db->where('status', 'dipinjam');
        return $this->db->count_all_results('peminjaman');
    }

    public function count_returned_peminjaman()
    {
        $this->db->where('status', 'dikembalikan');
        return $this->db->count_all_results('peminjaman');
    }

    public function row_data($id)
    {
        $sql = "SELECT p.*, b.judul as judul_buku 
                FROM peminjaman p 
                LEFT JOIN buku b ON p.id_buku = b.id_buku 
                WHERE p.id_peminjaman = ?";
        
        $query = $this->db->query($sql, [$id]);
        return $query->row();
    }

    // Tambah data peminjaman
    public function tambah()
    {
        $nama_user = $this->input->post('nama_user');
        $id_buku = $this->input->post('id_buku');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $status = 'dipinjam'; // Default status ketika pinjam
    
        $inputan = array(
            'nama_user' => $nama_user,
            'id_buku' => $id_buku,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'status' => $status
        );
    
        $this->db->trans_begin();
    
        // Insert ke tabel peminjaman
        $this->db->insert('peminjaman', $inputan);
    
        // Update status buku menjadi 'dipinjam'
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', ['status' => 'dipinjam']);
    
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => "Data Gagal Ditambahkan"];
        } else {
            $this->db->trans_commit();
            return ['status' => true, 'message' => "Data Berhasil Ditambahkan"];
        }
    }
    

    public function hapus($id_peminjaman)
    {
        if (empty($id_peminjaman)) {
            return ['status' => false, 'message' => 'ID peminjaman tidak valid'];
        }
    
        $this->db->trans_begin();
    
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->delete('peminjaman');
    
        // cek error query
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => "Error DB: " . $error['message']];
        }
    
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => "Data gagal dihapus"];
        } else {
            $this->db->trans_commit();
            return ['status' => true, 'message' => "Data berhasil dihapus"];
        }
    }
    

    public function edit()
    {
        $id_peminjaman = $this->input->post('id_peminjaman');
        $nama_user = $this->input->post('nama_user');
        $id_buku = $this->input->post('id_buku');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $status = $this->input->post('status');

        $inputan = array(
            'nama_user' => $nama_user,
            'id_buku' => $id_buku,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'status' => $status
        );

        $this->db->trans_begin();
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->update('peminjaman', $inputan);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => "Data Gagal Diedit"];
        } else {
            $this->db->trans_commit();
            return ['status' => true, 'message' => "Data Berhasil Diedit"];
        }
    }

    public function kembalikan() 
    {
        $id = $this->input->post('id_peminjaman');
        
        if (empty($id)) {
            return ['status' => false, 'message' => 'ID peminjaman tidak valid'];
        }
        
        // Ambil data peminjaman untuk mendapatkan id_buku
        $peminjaman = $this->db->get_where('peminjaman', ['id_peminjaman' => $id])->row();
    
        if (!$peminjaman) {
            return ['status' => false, 'message' => 'Data peminjaman tidak ditemukan'];
        }
        
        $data = [
            'status' => 'dikembalikan',
            'tanggal_kembali' => date('Y-m-d')
        ];
        
        $this->db->trans_begin();
    
        // Update status peminjaman
        $this->db->where('id_peminjaman', $id);
        $this->db->update('peminjaman', $data);
    
        // Update status buku jadi tersedia
        $this->db->where('id_buku', $peminjaman->id_buku);
        $this->db->update('buku', ['status' => 'tersedia']);
        
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return ['status' => false, 'message' => 'Gagal mengembalikan buku'];
        } else {
            $this->db->trans_commit();
            return ['status' => true, 'message' => 'Buku berhasil dikembalikan'];
        }
    }
    

    public function get_all($id = null, $search = null)
    {
        $sql = "SELECT p.*, b.judul as judul_buku 
                FROM peminjaman p 
                LEFT JOIN buku b ON p.id_buku = b.id_buku 
                WHERE 1=1";

        $params = [];

        if ($id) {
            $sql .= " AND p.id_peminjaman = ?";
            $params[] = $id;
        }

        if ($search) {
            $sql .= " AND (p.nama_user LIKE ? OR b.judul LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        $sql .= " ORDER BY p.id_peminjaman DESC";

        $query = $this->db->query($sql, $params);
        return $query->result();
    }

    // Method untuk debugging - cek struktur tabel
    public function check_table_structure()
    {
        $fields = $this->db->field_data('peminjaman');
        return $fields;
    }

    // Method untuk test koneksi database
    public function test_connection()
    {
        try {
            $query = $this->db->query("SELECT COUNT(*) as total FROM peminjaman");
            return $query->row();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}