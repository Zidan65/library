<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_peminjaman');
        $this->load->model('M_buku');
        
       
    }

    public function index()
    {
        $data['title'] = "Data Peminjaman"; 
        $this->load->view('templates/header', $data);
        $this->load->view('v_peminjaman');
        $this->load->view('templates/footer');
    }

    public function result_data()
    {
        $cari = $this->input->post('cari');
        if (!$cari) $cari = ''; // default kosong

        $data = $this->M_peminjaman->result_dat($cari);

        header('Content-Type: application/json');
        echo json_encode([
            'result' => true,
            'data' => $data
        ]);
    }

    public function view_tambah()
    {
        $data['buku'] = $this->db->get_where('buku', ['status' => 'tersedia'])->result();

        $data['users'] = $this->db->get('users')->result();

        $this->load->view('templates/header',$data);
        $this->load->view('peminjaman/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $result = $this->M_peminjaman->tambah();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function view_edit($id)
{
    $data['peminjaman'] = $this->M_peminjaman->row_data($id);

    $this->db->where('status', 'tersedia');
    $this->db->or_where('id_buku', $data['peminjaman']->id_buku);
    $data['buku'] = $this->db->get('buku')->result();

    $data['users'] = $this->db->get('users')->result();

    $this->load->view('templates/header',$data);
    $this->load->view('peminjaman/edit', $data);
    $this->load->view('templates/footer');
}

    public function edit()
    {
        $result = $this->M_peminjaman->edit();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function kembalikan()
    {
        $result = $this->M_peminjaman->kembalikan();

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function hapus()
    {
        $id_peminjaman = $this->input->post('id_peminjaman');
        $result = $this->M_peminjaman->hapus($id_peminjaman);
    
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    

    public function cetak()
    {
        $data['peminjaman'] = $this->M_peminjaman->result_dat('');

        $this->load->view('templates/header',$data);
        $this->load->view('peminjaman/cetak', $data);
        $this->load->view('templates/footer');
    }
}
