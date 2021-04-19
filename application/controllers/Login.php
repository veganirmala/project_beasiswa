<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        // $this->load->library('session');
        // $this->load->library('form_validation');
        //$this->load->model('M_login');
    }
    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     $this->_login();
        // }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }
    public function _login()
    {
        if ($this->session->userdata('email')) {
            $username = $this->session->userdata('email');
        } else {
            $username = $this->input->post('email');
            $this->session->set_userdata('email', $username);
        }

        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['email' => $username])->row_array();

        if ($user) {
            if ($user['pass'] == $password) {
                $username = $this->session->userdata('email');
                $this->_admin();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User tidak terdaftar</div>');
            redirect('login');
        }
    }
    public function _admin()
    {
        //$data['title'] = "Halaman Admin";
        //$this->load->view('header', $data);
        //$this->load->view('blank');
        //$this->load->view('sidebar');

        //$this->load->view('footer');
        redirect('dashboard');
    }
    public function logout()
    {
        /*unset(
        	$_SESSION['status']
		);
		
		redirect('Login');*/

        session_start();

        $this->session->sess_destroy();
        redirect('login');
    }
}
