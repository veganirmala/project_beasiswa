<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TahunUsulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TahunUsulan_model');
        $this->load->model('JenisBeasiswa_model');
    }

    //data usulan
    public function usulan()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Tahun Usulan Beasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //$data['usulan'] = $this->db->get('tb_thusulan')->result_array();
            $data['usulan'] = $this->TahunUsulan_model->getUsulan();

            $this->load->view('template/header', $data);
            $this->load->view('tahunusulan/usulan', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //nampilin data jenis beasiswa yang statusnya aktif
    public function usulan_tambah()
    {
        if ($this->session->userdata('email')) {

            $this->form_validation->set_rules('nama', 'Nama beasiswa', 'required|is_unique[tb_jenis_beasiswa.nama_beasiswa]');

            $data['title'] = "Tambah Data Tahun Usulan";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //$qr = "select tb_prestasi_bidang.* from tb_prestasi_bidang";
            // $data['bidang'] = $this->db->query($qr)->result_array();
            //$data['jk'] = $this->anggota_enum('tb_mahasiswa', 'jk');
            // $data['smt'] = $this->anggota_enum('tb_mahasiswa', 'smt');

            //$data['nama_beasiswa'] = $this->db->get_where('tb_jenis_beasiswa', ['status_beasiswa' => "Aktif"])->result_array();
            //$data['nama_beasiswa'] = $this->TahunUsulan_model->getStatusBeasiswa();
            $data['nama_beasiswa'] = $this->JenisBeasiswa_model->getStatusBeasiswa();

            $this->load->view('template/header', $data);
            $this->load->view('tahunusulan/usulan_tambah', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambah data usulan
    public function usulan_tambah_save()
    {
        if ($this->session->userdata('email')) {
            $tahun = $this->input->post('tahun');
            $nama = $this->input->post('id_beasiswa');
            $cekdata = $this->db->query("select * from tb_thusulan where tahun=" . $tahun . " and id_beasiswa='" . $nama . "'")->row_array();
            if ($cekdata <> null) {
                //$data['title'] = "Data Tahun Usulan Beasiswa";
                //$data['usulan'] = $cekdata;

                //$this->load->view('header', $data);
                //$this->load->view('usulan', $data);
                //$this->load->view('sidebar');
                //$this->load->view('footer');
                redirect('tahunusulan/usulan');
            } else {
                // $data = [
                //     'tahun' => $tahun,
                //     'nama_beasiswa' => $nama
                // ];
                // $this->db->insert('tb_thusulan', $data);
                $this->TahunUsulan_model->addUsulan();
                redirect('tahunusulan/usulan');
            }
        } else {
            redirect('login');
        }
    }

    public function usulan_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('tahun', 'Tahun', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Tahun Usulan";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                // $data['fakultas'] = $this->db->get_where('tb_fakultas', ['id_fakultas' => $id])->row_array();
                $data['nama_beasiswa'] = $this->JenisBeasiswa_model->getStatusBeasiswa();
                $data['thusulan'] = $this->TahunUsulan_model->getUsulanById($id);

                $this->load->view('template/header', $data);
                $this->load->view('tahunusulan/usulan_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->TahunUsulan_model->updateUsulan();
                redirect('tahunusulan/usulan');
            }
        } else {
            redirect('login');
        }
    }

    //edit data usulan
    // public function usulan_edit($id, $str)
    // {
    //     if ($this->session->userdata('email')) {

    //         if ($str == "Aktif") {
    //             $st = "Aktif";
    //         } else {
    //             $st = "Tidak Aktif";
    //         }
    //         $this->db->set('status_usulan', 'Tidak Aktif');
    //         //$this->db->where('id', 2);
    //         $this->db->update('tb_thusulan');
    //         $this->db->set('status_usulan', $st);
    //         $this->db->where('id_usulan', $id);
    //         $this->db->update('tb_thusulan');

    //         redirect('tahunusulan/usulan');
    //     } else {
    //         redirect('login');
    //     }
    // }

    public function usulan_delete($id)
    {
        $this->TahunUsulan_model->deleteUsulan($id);
        redirect('tahunusulan/usulan');
    }

    public function usulan_view($id)
    {
        $data['title'] = 'Detail Data Tahun Usulan';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['usulan'] = $this->TahunUsulan_model->getUsulanById($id);

        $this->load->view('template/header', $data);
        $this->load->view('tahunusulan/usulan_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
