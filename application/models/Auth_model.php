<?php
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        //mengambil nilai yang diinputkan di email dan password
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        //cek jika user ada
        if ($user) {
            //cek password untuk user
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username belum terdaftar!</div>');
            redirect('auth');
        }
    }
}
