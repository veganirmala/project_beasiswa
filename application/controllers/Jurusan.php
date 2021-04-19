<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->model('Fakultas_model');
    }

    //menampilkan seluruh data jurusan
    public function jurusan()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Jurusan";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['jur'] = $this->Jurusan_model->getJurusan();

            $this->load->view('template/header', $data);
            $this->load->view('jurusan/jurusan', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambahkan data jurusan
    public function jurusan_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_jurusan', 'Nama jurusan', 'required|is_unique[tb_jurusan.nama_jurusan]');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Jurusan";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['fak'] = $this->Fakultas_model->getFakultas();

                $this->load->view('template/header', $data);
                $this->load->view('jurusan/jurusan_tambah', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->Jurusan_model->addJurusan();
                redirect('jurusan/jurusan');
            }
        } else {
            redirect('login');
        }
    }

    //edit data jurusan 
    public function jurusan_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_jurusan', 'Nama jurusan', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Jurusan";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['jurusan'] = $this->Jurusan_model->getJurusanById($id);
                $data['fak'] = $this->Fakultas_model->getFakultas();

                $this->load->view('template/header', $data);
                $this->load->view('jurusan/jurusan_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->Jurusan_model->updateJurusan();
                redirect('jurusan/jurusan');
            }
        } else {
            redirect('login');
        }
    }

    public function jurusan_delete($id)
    {
        $this->Jurusan_model->deleteJurusan($id);
        redirect('jurusan/jurusan');
    }

    public function jurusan_view($id)
    {
        $data['title'] = 'Detail Data Jurusan';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = $this->Jurusan_model->getJurusanById($id);

        $this->load->view('template/header', $data);
        $this->load->view('jurusan/jurusan_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
