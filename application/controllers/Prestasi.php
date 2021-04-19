<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prestasi_model');
        $this->load->model('TahunUsulan_model');
    }

    //tampil data prestasi
    public function prestasi()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Prestasi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            // $qr = "select * from tb_prestasi, tb_thusulan, tb_mahasiswa 
            //   where tb_prestasi.nim=tb_mahasiswa.nim and tb_prestasi.id_usulan=tb_thusulan.id_usulan 
            //   and tb_thusulan.status_usulan='" . "Aktif'";

            // $data['prestasi'] = $this->db->query($qr)->result_array();
            $data['prestasi'] = $this->Prestasi_model->getPrestasi();

            $data['thusulan'] = $this->db->get_where('tb_thusulan', array('status_usulan' => "Aktif"))->row_array();
            //$data['thusulan'] = $this->TahunUsulan_model->getStatusTahunUsulanById();

            $this->load->view('template/header', $data);
            $this->load->view('prestasi/prestasi', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //menambahkan data prestasi
    public function prestasi_tambah()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Tambah Data Prestasi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            //$qr = "select * from tb_kepribadian, tb_thusulan, tb_mahasiswa where tb_kepribadian.nim=tb_mahasiswa.nim and tb_kepribadian.thusulan=tb_thusulan.tahun and tb_thusulan.status_usulan='" . "Aktif'";
            //$data['pribadi'] = $this->db->query($qr)->result_array();
            //$data['thusulan'] = $this->db->get_where('tb_thusulan', array('status_usulan' => "Aktif"))->row_array();

            $data['thusulan'] = $this->TahunUsulan_model->getStatusTahunUsulanById();
            $data['thus'] = $this->TahunUsulan_model->getNamaBeasiswaAktif();
            //$data['beasiswa'] = $this->db->get_where('tb_jenis_beasiswa', array('status_beasiswa' => "Aktif"))->result_array();
            //var_dump($data);
            //die;
            $this->load->view('template/header', $data);
            $this->load->view('prestasi/prestasi_tambah', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambah data prestasi
    public function prestasi_tambah_save()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Tambah Data Prestasi";
            $id = $this->input->post('id_usulan');
            $nim = $this->input->post('nim');
            $data = [
                'id_usulan' => $id,
                'nim' => $nim,
                'nilai_prestasi' => $this->input->post('nilai_prestasi'),
                'id_beasiswa' => $this->input->post('id_beasiswa')
            ];
            //var_dump($data);
            //die;
            $cek = "select * from tb_prestasi where id_usulan=" . $id . " and nim=" . $nim;
            $ada = $this->db->query($cek)->row_array();
            if ($ada <> null) {
                //echo "ada data";
                //die;
                $data['title'] = "Data Prestasi";
                $qr = "select * from tb_prestasi, tb_thusulan, tb_mahasiswa 
                 where tb_prestasi.nim=tb_mahasiswa.nim and tb_prestasi.id_usulan=tb_thusulan.id_usulan 
                 and tb_thusulan.status_usulan='Aktif' and tb_prestasi.nim=" . $nim;

                $data['prestasi'] = $this->db->query($qr)->result_array();
                $data['thusulan'] = $this->db->get_where('tb_thusulan', array('status_usulan' => "Aktif"))->row_array();
                $data['beasiswa'] = $this->db->get_where('tb_jenis_beasiswa', array('status_beasiswa' => "Aktif"))->result_array();
                $this->load->view('template/header', $data);
                $this->load->view('prestasi/prestasi', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {

                //$this->db->insert('tb_prestasi', $data);
                $this->Prestasi_model->addPrestasi();
                redirect('prestasi/prestasi');
            }
        } else {
            redirect('login');
        }
    }

    //edit data prestasi
    public function prestasi_edit($id)
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Edit Data Prestasi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['prestasi'] = $this->db->get_where('tb_prestasi', array('id_prestasi' => $id))->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('prestasi/prestasi_edit', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //simpan data prestasi
    public function prestasi_edit_save()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Simpan Data Prestasi";
            // $id = $this->input->post('id_prestasi');
            // $data = [

            //     'nilai_prestasi' => $this->input->post('nilai')
            // ];
            // $this->db->where('id_prestasi', $id);
            // $this->db->update('tb_prestasi', $data);
            $this->Prestasi_model->updatePrestasi();
            redirect('prestasi/prestasi');
        } else {
            redirect('login');
        }
    }

    public function prestasi_delete($id)
    {
        $this->Prestasi_model->deletePrestasi($id);
        redirect('prestasi/prestasi');
    }

    public function prestasi_view($id)
    {
        $data['title'] = 'Detail Data Prestasi';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prestasi'] = $this->Prestasi_model->getPrestasiById($id);

        $this->load->view('template/header', $data);
        $this->load->view('prestasi/prestasi_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
