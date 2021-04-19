<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Prodi_model');
    }

    public function anggota_enum($table, $field)
    {
        $query = "SHOW COLUMNS FROM " . $table . " LIKE '$field'";
        $row = $this->db->query("SHOW COLUMNS FROM " . $table . " LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row, $enum_array);
        $enum_fields = $enum_array[1];
        foreach ($enum_fields as $key => $values) {
            $enums[$values] = $values;
        }
        return $enums;
    }

    //menampilkan data mahasiswa
    public function mahasiswa()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Mahasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['mhs'] = $this->Mahasiswa_model->getMahasiswa();

            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/mahasiswa', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambahkan tambah data mahasiswa
    public function mahasiswa_tambah()
    {
        if ($this->session->userdata('email')) {

            $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|is_unique[tb_mahasiswa.nim]');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Mahasiswa";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['jk'] = $this->anggota_enum('tb_mahasiswa', 'jk');
                $data['smt'] = $this->anggota_enum('tb_mahasiswa', 'smt');

                $data['id_prodi'] = $this->Prodi_model->getProdi();

                $this->load->view('template/header', $data);
                $this->load->view('mahasiswa/mahasiswa_tambah', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->Mahasiswa_model->addMahasiswa();
                redirect('mahasiswa/mahasiswa');
            }
        } else {
            redirect('login');
        }
    }

    //edit mahasiswa
    public function mahasiswa_edit($nim)
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Edit Data Mahasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['jk'] = $this->anggota_enum('tb_mahasiswa', 'jk');
            $data['smt'] = $this->anggota_enum('tb_mahasiswa', 'smt');
            $data['id_prodi'] = $this->db->get('tb_prodi')->result_array();
            $data['mhs'] = $this->db->get_where('tb_mahasiswa', array('nim' => $nim))->row_array();
            $data['nm_prodi'] = $this->db->query("select * from tb_mahasiswa, tb_prodi 
            where tb_mahasiswa.id_prodi=tb_prodi.id_prodi and tb_mahasiswa.nim=" . $nim)->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/mahasiswa_edit', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //edit mahasiswa
    public function mahasiswa_edit_save()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = " Edit Data Mahasiswa";
            $this->Mahasiswa_model->updateMahasiswa();
            redirect('mahasiswa/mahasiswa');
        } else {
            redirect('login');
        }
    }

    //menampilkan data mahasiswa
    public function mahasiswa_detail($nim)
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Detail Data Mahasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            //$qr = "select tb_prestasi_bidang.* from tb_prestasi_bidang";
            // $data['bidang'] = $this->db->query($qr)->result_array();
            $data['jk'] = $this->anggota_enum('tb_mahasiswa', 'jk');
            $data['smt'] = $this->anggota_enum('tb_mahasiswa', 'smt');
            $data['id_prodi'] = $this->db->get('tb_prodi')->result_array();
            $data['mhs'] = $this->db->get_where('tb_mahasiswa', array('nim' => $nim))->row_array();
            $data['nm_prodi'] = $this->db->query("select * from tb_mahasiswa, tb_prodi 
            where tb_mahasiswa.id_prodi=tb_prodi.id_prodi and tb_mahasiswa.nim=" . $nim)->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/mahasiswa_detail', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    public function mahasiswa_delete($id)
    {
        $this->Mahasiswa_model->deleteMahasiswa($id);
        redirect('mahasiswa/mahasiswa');
    }
}
