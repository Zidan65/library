<?php
class Buku extends CI_Controller{

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_buku','model');
        $this->load->model('M_kategori');
    }

    public function index(){
        $data['active'] = 'Buku';
        $data['title'] = 'Buku';
        $this->load->view('templates/header', $data);
        $this->load->view('v_buku', $data);
        $this->load->view('templates/footer');
    }

    public function view_tambah(){
        $data['active'] = 'Buku';
        $data['title'] = 'Buku';

        $this->load->view('templates/header', $data);
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function view_edit($id){
        $data['row'] = $this->model->row_data($id);
        $data['active'] = 'Buku';
        $data['title'] = 'Buku';

        $this->load->view('templates/header', $data);
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    public function view_detail($id)
    {
        $data['active'] = 'Buku';
        $data['title'] = 'Detail Buku';
        $data['row'] = $this->model->row_data($id);
    
        $this->load->view('templates/header', $data);
        $this->load->view('buku/detail', $data);
        $this->load->view('templates/footer');
    }
    


    public function tambah(){
        $response = $this->model->tambah();

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function edit(){
        $response = $this->model->edit();

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function result_data(){
        $data = $this->model->result_dat();

        if ($data) {
            $response = array(
                'result' => true,
                'data' => $data
            );
        } else {
            $response = array(
                'result' => false,
                'message' => 'Data Kosong'
            );
        }
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function hapus(){
        $response = $this->model->hapus();

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function kategori()
    {
        $this->load->model('M_kategori');
        $kategori = $this->M_kategori->get_all(); 
        echo json_encode($kategori);
    }
    
}
?>