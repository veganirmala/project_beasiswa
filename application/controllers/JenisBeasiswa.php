<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisBeasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JenisBeasiswa_model');
    }

    //menampilkan data beasiswa
    public function jenis_beasiswa()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Jenis Beasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['jenis'] = $this->JenisBeasiswa_model->getJenisBeasiswa();

            $this->load->view('template/header', $data);
            $this->load->view('jenisbeasiswa/jenis_beasiswa', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambah data jenis beasiswa
    public function jenis_beasiswa_tambah()
    {
        if ($this->session->userdata('email')) {

            $this->form_validation->set_rules('nama', 'Nama beasiswa', 'required|is_unique[tb_jenis_beasiswa.nama_beasiswa]');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Jenis Beasiswa";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
                //$qr = "select tb_prestasi_bidang.* from tb_prestasi_bidang";
                // $data['bidang'] = $this->db->query($qr)->result_array();
                //$data['jk'] = $this->anggota_enum('tb_mahasiswa', 'jk');
                // $data['smt'] = $this->anggota_enum('tb_mahasiswa', 'smt');
                //$data['id_prodi'] = $this->db->get('tb_prodi')->result_array();
                $this->load->view('template/header', $data);
                $this->load->view('jenisbeasiswa/jenis_beasiswa_tambah', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->JenisBeasiswa_model->addJenisBeasiswa();
                redirect('jenisbeasiswa/jenis_beasiswa');
            }
        } else {
            redirect('login');
        }
    }

    //edit jenis beasiswa
    public function jenis_beasiswa_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama', 'Nama Beasiswa', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Jenis Beasiswa";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
                $data['jenis'] = $this->JenisBeasiswa_model->getJenisBeasiswaById($id);

                $this->load->view('template/header', $data);
                $this->load->view('jenisbeasiswa/jenis_beasiswa_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->JenisBeasiswa_model->updateJenisBeasiswa();
                redirect('jenisbeasiswa/jenis_beasiswa');
            }
        } else {
            redirect('login');
        }
    }

    public function jenis_beasiswa_delete($id)
    {
        $this->JenisBeasiswa_model->deleteJenisBeasiswa($id);
        redirect('jenisbeasiswa/jenis_beasiswa');
    }

    public function jenis_beasiswa_view($id)
    {
        $data['title'] = 'Detail Data Jenis Beasiswa';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->JenisBeasiswa_model->getJenisBeasiswaById($id);

        $this->load->view('template/header', $data);
        $this->load->view('jenisbeasiswa/jenis_beasiswa_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
