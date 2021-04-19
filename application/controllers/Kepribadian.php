<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepribadian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kepribadian_model');
        $this->load->model('TahunUsulan_model');
        $this->load->model('JenisBeasiswa_model');
    }

    //tampil data kepribadian
    public function kepribadian()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Kepribadian";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            // $qr = "select * from tb_kepribadian, tb_thusulan, tb_mahasiswa 
            // where tb_kepribadian.nim=tb_mahasiswa.nim and tb_kepribadian.id_usulan=tb_thusulan.id_usulan 
            // and tb_thusulan.status_usulan='" . "Aktif'";

            // $data['pribadi'] = $this->db->query($qr)->result_array();

            //ngambil data kepribadian
            $data['pribadi'] = $this->Kepribadian_model->getKepribadian();
            //$data['thusulan'] = $this->db->get_where('tb_thusulan', array('status_usulan' => "Aktif"))->row_array();
            $data['thusulan'] = $this->TahunUsulan_model->getStatusTahunUsulanById();
            //$data['beasiswa'] = $this->db->get_where('tb_jenis_beasiswa', array('status_beasiswa' => "Aktif"))->result_array();
            $data['beasiswa'] = $this->JenisBeasiswa_model->getStatusBeasiswa();

            $this->load->view('template/header', $data);
            $this->load->view('kepribadian/kepribadian', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambah data kepribadian
    public function kepribadian_tambah()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Tambah Data Kepribadian";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            //$qr = "select * from tb_kepribadian, tb_thusulan, tb_mahasiswa where tb_kepribadian.nim=tb_mahasiswa.nim and tb_kepribadian.thusulan=tb_thusulan.tahun and tb_thusulan.status_usulan='" . "Aktif'";
            //$data['pribadi'] = $this->db->query($qr)->result_array();
            //$data['thusulan'] = $this->db->get_where('tb_thusulan', array('status_usulan' => "Aktif"))->row_array();
            // $data['thusulan'] = $this->TahunUsulan_model->getStatusTahunUsulanById();
            $data['thusulan'] = $this->TahunUsulan_model->getStatusTahunById();
            $data['thus'] = $this->TahunUsulan_model->getNamaBeasiswaAktif();
            //$data['beasiswa'] = $this->db->get_where('tb_jenis_beasiswa', array('status_beasiswa' => "Aktif"))->result_array();
            //$data['beasiswa'] = $this->JenisBeasiswa_model->getStatusBeasiswa();
            //var_dump($data);
            //die;

            $this->load->view('template/header', $data);
            $this->load->view('kepribadian/kepribadian_tambah', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //tambah data kepribadian
    public function kepribadian_tambah_save()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Tambah Data Kepribadian";
            $id = $this->input->post('id_usulan');
            $nim = $this->input->post('nim');
            $idbeasiswa = $this->input->post('nama_beasiswa');
            $data = [
                'id_usulan' => $id,
                'id_beasiswa' => $idbeasiswa,
                'nim' => $nim,
                'nilai_pribadi' => $this->input->post('nilai_pribadi'),
                'ipk' => $this->input->post('ipk')
            ];
            //var_dump($data);
            //die;
            $cek = "select * from tb_kepribadian where id_usulan=" . $id . " and nim=" . $nim;
            $ada = $this->db->query($cek)->row_array();
            if ($ada <> null) {
                //echo "ada data";
                //die;
                $data['title'] = "Data Kerpibadian";
                $qr = "select * from tb_kepribadian, tb_thusulan, tb_mahasiswa 
                where tb_kepribadian.nim=tb_mahasiswa.nim and tb_kepribadian.id_usulan=tb_thusulan.id_usulan 
                and tb_thusulan.status_usulan='Aktif' and tb_kepribadian.nim=" . $nim;

                $data['pribadi'] = $this->db->query($qr)->result_array();
                $data['thusulan'] = $this->db->get_where('tb_thusulan', array('status_usulan' => "Aktif"))->row_array();
                //$data['beasiswa'] = $this->db->get_where('tb_jenis_beasiswa', array('status_beasiswa' => "Aktif"))->result_array();
                //$data['beasiswa'] = $this->JenisBeasiswa_model->getStatusBeasiswa();
                $data['beasiswa'] = $this->TahunUsulan_model->getNamaBeasiswaAktif();

                $this->load->view('template/header', $data);
                $this->load->view('kepribadian/kepribadian', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                //$this->db->insert('tb_kepribadian', $data);
                $this->Kepribadian_model->addKepribadian();
                redirect('kepribadian/kepribadian');
            }
        } else {
            redirect('login');
        }
    }

    //edit kepribadian
    public function kepribadian_edit($id)
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Edit Data Kepribadian";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            //$qr = "select * from tb_kepribadian, tb_thusulan, tb_mahasiswa where tb_kepribadian.nim=tb_mahasiswa.nim and tb_kepribadian.thusulan=tb_thusulan.tahun and tb_thusulan.status_usulan='" . "Aktif'";
            //$data['pribadi'] = $this->db->query($qr)->result_array();
            $data['pribadi'] = $this->db->get_where('tb_kepribadian', array('id_kepribadian' => $id))->row_array();
            //$data['beasiswa'] = $this->db->get_where('tb_jenis_beasiswa', array('status_beasiswa' => "Aktif"))->result_array();
            //var_dump($data);
            //die;
            $this->load->view('template/header', $data);
            $this->load->view('kepribadian/kepribadian_edit', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //edit kepribadian
    public function kepribadian_edit_save()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Edit Data Kepribadian";
            // $id = $this->input->post('id_kepribadian');
            // $data = [

            //     'nilai_pribadi' => $this->input->post('nilai'),
            //     'ipk' => $this->input->post('ipk')
            // ];
            // $this->db->where('id_kepribadian', $id);
            // $this->db->update('tb_kepribadian', $data);
            $this->Kepribadian_model->updateKepribadian();
            redirect('kepribadian/kepribadian');
        } else {
            redirect('login');
        }
    }

    public function kepribadian_delete($id)
    {
        $this->Kepribadian_model->deleteKepribadian($id);
        redirect('kepribadian/kepribadian');
    }

    public function kepribadian_view($id)
    {
        $data['title'] = 'Detail Data Kepribadian';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pribadi'] = $this->Kepribadian_model->getKepribadianById($id);

        $this->load->view('template/header', $data);
        $this->load->view('kepribadian/kepribadian_view', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
