<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //memanggil form validasi
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Dashboard');
        }
        //aturan validasi
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $this->Auth_model->login();
    }

    public function logout()
    {
        session_start();

        $this->session->sess_destroy();
        //redirect('login');
        //$this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Logout!</div>');
        redirect('auth');
    }
}
