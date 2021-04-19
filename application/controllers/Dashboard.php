<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //memanggil funtion rekap
    public function index()
    {
        $this->rekap();
    }


    //menampilkan data rekapan
    public function rekap()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Rekap Data Beasiswa";
            $qr = "select * from tb_rekap,tb_mahasiswa,tb_jurusan,tb_prodi,tb_kepribadian, tb_thusulan 
            where tb_jurusan.id_jurusan=tb_prodi.id_jurusan and tb_rekap.nim=tb_mahasiswa.nim 
            and tb_mahasiswa.id_prodi=tb_prodi.id_prodi and tb_kepribadian.nim=tb_rekap.nim 
            and tb_rekap.id_usulan=tb_thusulan.id_usulan and tb_kepribadian.id_usulan=tb_rekap.id_usulan 
            and tb_thusulan.status_usulan='Aktif'";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['rekap'] = $this->db->query($qr)->result_array();
            $data['th_aktif'] = $this->db->get_where('tb_thusulan', ['status_usulan' => "Aktif"])->row_array();
            //echo "<pre>";
            //var_dump($data);
            //die;
            $this->load->view('template/header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }
}
