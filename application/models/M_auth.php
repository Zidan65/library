<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    // 🔹 Cari user berdasarkan username
    public function get_by_username($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row();
    }
}
