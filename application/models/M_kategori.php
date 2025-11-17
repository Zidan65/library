<?php
class M_kategori extends CI_Model {

  public function result_dat($id = null)
  {
      $cari = $this->input->post('cari') ?? '';
  
      $sql = "SELECT k.* FROM kategori k WHERE 1=1";
      $params = [];
  
      if ($id) {
          $sql .= " AND k.id = ?";
          $params[] = $id;
      }
  
      if ($cari != '') {
          $sql .= " AND (k.nama LIKE ?)";
          $params[] = "%$cari%";
      }
  
      $sql .= " ORDER BY k.id DESC";
  
      $query = $this->db->query($sql, $params);
      return $query->result();
  }

  // Ambil satu data kategori berdasarkan id
  public function row_data($id)
  {
      $sql = $this->db->query("SELECT k.* FROM kategori k WHERE k.id = ?", array($id));
      return $sql->row();
  }

  // Tambah data kategori
  public function tambah()
  {
      $inputan = array(
          'nama' => $this->input->post('nama')
      );

      $this->db->trans_begin();
      $this->db->insert('kategori', $inputan);
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) {
          $this->db->trans_rollback();
          return ['status' => false, 'message' => "Data Gagal Ditambahkan"];
      } else {
          $this->db->trans_commit();
          return ['status' => true, 'message' => "Data Berhasil Ditambahkan"];
      }
  }

  // Edit data kategori
  public function edit()
  {
      $inputan = array(
          'nama' => $this->input->post('nama')
      );

      $this->db->trans_begin();
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('kategori', $inputan);
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
      $this->db->trans_begin();
      $this->db->where('id', $this->input->post('id'));
      $this->db->delete('kategori');
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) {
          $this->db->trans_rollback();
          return ['status' => false, 'message' => "Data Gagal Dihapus"];
      } else {
          $this->db->trans_commit();
          return ['status' => true, 'message' => "Data Berhasil Dihapus"];
      }
  }

    public function get_all() {
    return $this->db->get('kategori')->result(); 
}

}
