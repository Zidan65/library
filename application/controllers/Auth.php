<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_auth', 'auth');
        $this->load->library('session');
    }

    public function login(){
        $this->load->view('auth/login');
    }

    public function proses_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->auth->get_by_username($username);

        if($user && password_verify($password, $user->password)){
            $this->session->set_userdata([
                'user_id'   => $user->id_user,
                'username'  => $user->username,
                'role'      => $user->role
            ]);

            echo json_encode([
                'success' => true,
                'message' => 'Login berhasil',
                'redirect' => base_url('dashboard')
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Username atau password salah'
            ]);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
