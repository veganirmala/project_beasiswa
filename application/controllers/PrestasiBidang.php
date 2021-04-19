<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrestasiBidang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PrestasiBidang_model');
        $this->load->model('TahunUsulan_model');
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

    //tampil data bidang
    public function bidang()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Bidang Prestasi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['bidang'] = $this->PrestasiBidang_model->getPrestasiBidang();

            $this->load->view('template/header', $data);
            $this->load->view('prestasibidang/prestasi_bidang', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambah data bidang
    public function bidang_tambah()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Tambah Data Bidang Prestasi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['tingkat'] = $this->anggota_enum('tb_prestasi_bidang', 'tingkat');
            $data['status'] = $this->anggota_enum('tb_prestasi_bidang', 'status');

            $this->load->view('template/header', $data);
            $this->load->view('prestasibidang/prestasi_bidang_tambah', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambah data tabel prestasi bidang
    public function bidang_tambah_save()
    {
        if ($this->session->userdata('email')) {
            $this->PrestasiBidang_model->addBidang();
            redirect('prestasibidang/bidang');
        } else {
            redirect('login');
        }
    }

    //edit data bidang
    public function bidang_edit($id)
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Edit Data Bidang Prestasi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $qr = "select tb_prestasi_bidang.* from tb_prestasi_bidang where tb_prestasi_bidang.id_bidang=" . $id;
            $data['bidang'] = $this->db->query($qr)->row_array();

            $data['tingkat'] = $this->anggota_enum('tb_prestasi_bidang', 'tingkat');
            $data['status'] = $this->anggota_enum('tb_prestasi_bidang', 'status');

            $this->load->view('template/header', $data);
            $this->load->view('prestasibidang/prestasi_bidang_edit', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //edit data bidang
    public function bidang_edit_save()
    {
        if ($this->session->userdata('email')) {
            $id = $this->input->post('id_bidang');
            // $data = [
            // 'nama_bidang' => $this->input->post('nama_bidang'),
            // 'tingkat' => $this->input->post('tingkat'),
            // 'juara' => $this->input->post('juara'),
            // 'skor' => $this->input->post('skor'),
            // 'status' => $this->input->post('status')
            // ];
            // $this->db->where('id_bidang', $id);
            // $this->db->update('tb_prestasi_bidang', $data);
            $this->PrestasiBidang_model->updateBidang();
            redirect('prestasibidang/bidang');
        } else {
            redirect('login');
        }
    }

    public function bidang_delete($id)
    {
        $this->PrestasiBidang_model->deletePrestasiBidang($id);
        redirect('prestasibidang/bidang');
    }

    public function bidang_view($id)
    {
        $data['title'] = 'Detail Data Bidang Prestasi ';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bidang'] = $this->PrestasiBidang_model->getPrestasiBidangById($id);

        $this->load->view('template/header', $data);
        $this->load->view('prestasibidang/prestasi_bidang_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
