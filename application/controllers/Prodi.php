<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->model('Jurusan_model');
    }

    //menampilkan data prodi
    public function prodi()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Program Studi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['progstudi'] = $this->Prodi_model->getProdi();

            $this->load->view('template/header', $data);
            $this->load->view('prodi/prodi', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambahkan data prodi
    public function prodi_tambah()
    {
        if ($this->session->userdata('email')) {

            $this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required|is_unique[tb_prodi.nama_prodi]');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Program Studi";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['jur'] = $this->Jurusan_model->getJurusan();

                $this->load->view('template/header', $data);
                $this->load->view('prodi/prodi_tambah', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->Prodi_model->addProdi();
                redirect('prodi/prodi');
            }
        } else {
            redirect('login');
        }
    }

    //melakukan edit prodi
    public function prodi_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Program Studi";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['prodi'] = $this->Prodi_model->getProdiById($id);

                $data['jur'] = $this->Jurusan_model->getJurusan();

                $this->load->view('template/header', $data);
                $this->load->view('prodi/prodi_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->Prodi_model->updateProdi();
                redirect('prodi/prodi');
            }
        } else {
            redirect('login');
        }
    }

    public function prodi_delete($id)
    {
        $this->Prodi_model->deleteProdi($id);
        redirect('prodi/prodi');
    }

    public function prodi_view($id)
    {
        $data['title'] = 'Detail Data Program Studi';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prodi'] = $this->Prodi_model->getProdiById($id);

        $this->load->view('template/header', $data);
        $this->load->view('prodi/prodi_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    //melihat detail prodi
    public function prodi_detail($id_j, $id_f)
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Program Studi per Jurusan dan Fakultas";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['id_jur'] = $id_j;
            $data['id_fak'] = $id_f;
            // $qr = "select tb_fakultas.*,tb_jurusan.*, tb_prodi.* from tb_fakultas,tb_jurusan, tb_prodi 
            // where tb_jurusan.id_fakultas=tb_fakultas.id_fakultas and tb_prodi.id_jurusan=tb_jurusan.id_jurusan 
            // and tb_jurusan.id_jurusan=" . $id_j;

            $query = "SELECT * FROM tb_fakultas INNER JOIN tb_jurusan ON
            tb_fakultas.id_fakultas = tb_jurusan.id_fakultas
            INNER JOIN tb_prodi ON
            tb_prodi.id_jurusan = tb_jurusan.id_jurusan
            WHERE tb_jurusan.id_jurusan = " . $id_j;

            $data['progstudi'] = $this->db->query($query)->result_array();
            $this->load->view('template/header', $data);
            $this->load->view('prodi/prodi_detail', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }
}
