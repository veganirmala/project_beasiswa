<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    //nampilin seluruh data dari tabel user
    public function user()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data User";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $this->User_model->getUser();

            $this->load->view('template/header', $data);
            $this->load->view('user/user', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambahkan data user
    public function user_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_user.email]');
            $this->form_validation->set_rules('nama', 'Nama pengguna', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data User";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->view('template/header', $data);
                $this->load->view('user/user_tambah', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->User_model->addUser();
                redirect('user/user');
            }
        } else {
            redirect('login');
        }
    }

    //edit data user
    public function user_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('nama', 'Nama pengguna', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data User";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['user'] = $this->User_model->getUserById($id);

                $this->load->view('template/header', $data);
                $this->load->view('user/user_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->User_model->updateUser();
                redirect('user/user');
            }
        } else {
            redirect('login');
        }
    }

    //hapus data user
    public function user_delete($id)
    {
        $this->User_model->deleteUser($id);
        redirect('user/user');
    }

    //detail data user
    public function user_view($id)
    {
        $data['title'] = 'Detail Data User';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $this->User_model->getUserById($id);

        $this->load->view('template/header', $data);
        $this->load->view('user/user_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
