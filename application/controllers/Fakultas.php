<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fakultas_model');
    }

    //menampilkan seluruh data fakultas
    public function fakultas()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Fakultas";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['fak'] = $this->Fakultas_model->getFakultas();

            $this->load->view('template/header', $data);
            $this->load->view('fakultas/fakultas', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambahkan data fakultas
    public function fakultas_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_fakultas', 'Nama fakultas', 'required|is_unique[tb_fakultas.nama_fakultas]');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Fakultas";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->view('template/header', $data);
                $this->load->view('fakultas/fakultas_tambah', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->Fakultas_model->addFakultas();
                redirect('fakultas/fakultas');
            }
        } else {
            redirect('login');
        }
    }

    //edit data fakultas
    public function fakultas_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_fakultas', 'Nama fakultas', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Fakultas";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['fakultas'] = $this->Fakultas_model->getFakultasById($id);

                $this->load->view('template/header', $data);
                $this->load->view('fakultas/fakultas_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->Fakultas_model->updateFakultas();
                redirect('fakultas/fakultas');
            }
        } else {
            redirect('login');
        }
    }

    //hapus data fakultas
    public function fakultas_delete($id)
    {
        $this->Fakultas_model->deleteFakultas($id);
        redirect('fakultas/fakultas');
    }

    //detail data fakultas
    public function fakultas_view($id)
    {
        $data['title'] = 'Detail Data Fakultas';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['fakultas'] = $this->Fakultas_model->getFakultasById($id);

        $this->load->view('template/header', $data);
        $this->load->view('fakultas/fakultas_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
