<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
        $this->load->model('M_peminjaman'); 
    }

    public function index()
    {
        // Ambil data untuk statistik
        $data['total_buku'] = $this->M_buku->count_total_buku();
        $data['total_kategori'] = $this->M_buku->count_total_kategori();
        $data['total_peminjaman'] = $this->M_peminjaman->count_total_peminjaman();
        $data['buku_tersedia'] = $this->M_buku->count_buku_tersedia();
        $data['buku_dipinjam'] = $this->M_buku->count_buku_dipinjam();
        
        // Ambil semua kategori untuk dropdown
        $data['kategori'] = $this->M_buku->nama_kategori();
        
        // Ambil semua buku untuk ditampilkan
        $data['buku'] = $this->M_buku->result_dat();
        
        $this->load->view('home', $data);
    }

    public function get_books()
    {
        $search = $this->input->get('search');
        $category = $this->input->get('category');
        
        $books = $this->M_buku->get_books_filtered($search, $category);
        
        header('Content-Type: application/json');
        echo json_encode($books);
    }

    public function get_book_detail($id)
    {
        $book = $this->M_buku->row_data($id);
        
        header('Content-Type: application/json');
        echo json_encode($book);
    }

    // Method untuk AJAX - ambil statistik real-time
    public function get_statistics()
    {
        $stats = [
            'total_buku' => $this->M_buku->count_total_buku(),
            'total_kategori' => $this->M_buku->count_total_kategori(),
            'total_peminjaman' => $this->M_peminjaman->count_total_peminjaman(),
            'buku_tersedia' => $this->M_buku->count_buku_tersedia(),
            'buku_dipinjam' => $this->M_buku->count_buku_dipinjam()
        ];
        
        header('Content-Type: application/json');
        echo json_encode($stats);
    }
}