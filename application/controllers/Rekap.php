<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //menampilkan data rekapan
    public function rekap()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Rekap Data Beasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $qr = "select * from tb_rekap,tb_mahasiswa,tb_jurusan,tb_prodi,tb_kepribadian, tb_thusulan 
             where tb_jurusan.id_jurusan=tb_prodi.id_jurusan and tb_rekap.nim=tb_mahasiswa.nim 
             and tb_mahasiswa.id_prodi=tb_prodi.id_prodi and tb_kepribadian.nim=tb_rekap.nim 
             and tb_rekap.id_usulan=tb_thusulan.id_usulan and tb_kepribadian.id_usulan=tb_rekap.id_usulan 
             and tb_thusulan.status_usulan='Aktif'";

            $data['rekap'] = $this->db->query($qr)->result_array();
            $data['th_aktif'] = $this->db->get_where('tb_thusulan', ['status_usulan' => "Aktif"])->row_array();
            //echo "<pre>";
            //var_dump($data);
            //die;
            $this->load->view('template/header', $data);
            $this->load->view('rekap/rekap', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
    }

    //sinkronisasi data rekap
    public function rekap_sinkron()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Rekap Data Beasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $qr = "select * from tb_mahasiswa,tb_prodi,tb_kepribadian, tb_prestasi, tb_thusulan 
             where tb_mahasiswa.id_prodi=tb_prodi.id_prodi and tb_kepribadian.nim=tb_mahasiswa.nim 
             and tb_kepribadian.id_usulan=tb_thusulan.id_usulan and tb_prestasi.id_usulan=tb_thusulan.id_usulan 
             and tb_prestasi.nim=tb_kepribadian.nim and tb_thusulan.status_usulan='Aktif'";

            $id_aktif = $this->db->get_where('tb_thusulan', ['status_usulan' => "Aktif"])->row_array();
            $qr2 = "delete from tb_rekap where id_usulan=" . $id_aktif['id_usulan'] . " and ket_rekap='Draf'";
            //return $this->db->query($qr2);
            //$this->db->delete('mytable', array('id' => $id));
            $this->db->delete('tb_rekap', array('id_usulan' => $id_aktif['id_usulan'], 'ket_rekap' => "Draf"));
            $rekap = $this->db->query($qr)->result_array();
            //echo "<pre>";
            //var_dump($rekap);
            //die;
            //melakukan proses insert ke tabel rekap
            if ($rekap <> null) {
                //echo "<pre>";
                //var_dump($data['rekap']);
                //die;
                //lakukan perulangan untuk semua data yg ada
                foreach ($rekap as $rek) {
                    //$id = $rek['id_usulan'];
                    // $ket_rekap = $rek['ket_rekap'];
                    //cek di rekap apakah data sudha ada atau belum
                    //$cek_rekap = $this->db->query("select * from tb_rekap where id_usulan=" . $id . " and ket_rekap='Draf'")->result_array();
                    //echo "<pre>";
                    //var_dump($cek_rekap);
                    //die;
                    //perhitungan skor IP,Prestasi, Pribadi,Ekonomi
                    $ip = $rek['ipk']; //IF(F63>=3.61,"100",IF(F63>=3.41,"80",IF(F63>=3.21,"60",IF(F63>=3.01,"40","20"))))
                    $prestasi = $rek['nilai_prestasi']; //IF(I63>=21,"100",IF(I63>=16,"80",IF(I63>=11,"60",IF(I63>=6,"40","20"))))
                    $pribadi = $rek['nilai_pribadi']; //IF(P63>=29,"100",IF(P63>=26,"80",IF(P63>=21,"60",IF(P63>=16,"40",IF(P63>=10,"20","0")))))
                    $ekonomi = $rek['ortu_penghasilan']; //IF(M63>=3000001,"20",IF(M63>=2000001,"40",IF(M63>=1000001,"60",IF(M63>=500001,"80","100"))))
                    if ($ip >= 3.61) {
                        $skor_ip = 100;
                    } else if ($ip >= 3.41) {
                        $skor_ip = 80;
                    } else if ($ip >= 3.21) {
                        $skor_ip = 60;
                    } else if ($ip >= 3.01) {
                        $skor_ip = 40;
                    } else {
                        $skor_ip = 20;
                    }
                    if ($prestasi >= 21) {
                        $skor_prestasi = 100;
                    } else if ($prestasi >= 16) {
                        $skor_prestasi = 80;
                    } else if ($prestasi >= 11) {
                        $skor_prestasi = 60;
                    } else if ($prestasi >= 6) {
                        $skor_prestasi = 40;
                    } else {
                        $skor_prestasi = 20;
                    }
                    if ($pribadi >= 29) {
                        $skor_pribadi = 100;
                    } else if ($pribadi >= 26) {
                        $skor_pribadi = 80;
                    } else if ($pribadi >= 21) {
                        $skor_pribadi = 60;
                    } else if ($pribadi >= 16) {
                        $skor_pribadi = 40;
                    } else if ($pribadi >= 10) {
                        $skor_pribadi = 20;
                    } else {
                        $skor_pribadi = 0;
                    }
                    //IF(M63>=3000001,"20",IF(M63>=2000001,"40",IF(M63>=1000001,"60",IF(M63>=500001,"80","100"))))
                    if ($ekonomi >= 3000001) {
                        $skor_ekonomi = 20;
                    } else if ($ekonomi >= 2000001) {
                        $skor_ekonomi = 40;
                    } else if ($ekonomi >= 1000001) {
                        $skor_ekonomi = 60;
                    } else if ($ekonomi >= 500001) {
                        $skor_ekonomi = 80;
                    } else {
                        $skor_ekonomi = 100;
                    }
                    $skor_total = $skor_ip + $skor_prestasi + $skor_pribadi + $skor_ekonomi;
                    //echo $skor_ip . " " . $skor_prestasi . " " . $skor_pribadi . " " . $skor_ekonomi . " = " . $skor_total;
                    //die;
                    //akhir perhitungan skor
                    /*foreach ($cek_rekap as $cek) {
                         if ($cek <> null) {
                             $id_rekap = $cek['id_rekap'];
                             //jika ada hapus dulu baru masukkan
                             $this->db->where('id_rekap', $id_rekap);
                             $this->db->delete('tb_rekap');
                             $data = [
                                 'id_usulan' => $rek['id_usulan'],
                                 'nama_beasiswa' => $rek['nama_beasiswa'],
                                 'nim' => $rek['nim'],
                                 'nilai_prestasi' => $rek['nilai_prestasi'],
                                 'skor_ip' => $skor_ip,
                                 'skor_prestasi' => $skor_prestasi,
                                 'skor_pribadi' => $skor_pribadi,
                                 'skor_ekonomi' => $skor_ekonomi,
                                 'skor_total' => $skor_total
                             ];
                             $this->db->insert('tb_rekap', $data);
                             redirect('rekap/rekap');
                         } else {*/
                    $data = [
                        'id_usulan' => $rek['id_usulan'],
                        'id_beasiswa' => $rek['id_beasiswa'],
                        'nim' => $rek['nim'],
                        'nilai_prestasi' => $rek['nilai_prestasi'],
                        'skor_ip' => $skor_ip,
                        'skor_prestasi' => $skor_prestasi,
                        'skor_pribadi' => $skor_pribadi,
                        'skor_ekonomi' => $skor_ekonomi,
                        'skor_total' => $skor_total
                    ];
                    $this->db->insert('tb_rekap', $data);

                    //}
                    //}
                    //akhir cek
                    //echo $rek['tahun'] . "<br>";
                }
                redirect('rekap/rekap');
            } else {
                echo "data kosong";
                die;
            }
        } else {
            redirect('login');
        }
    }

    //edit data rekap keterangan
    public function rekap_ket($id, $str)
    {
        if ($this->session->userdata('email')) {
            if ($str == "Tidak_Diusulkan") {
                $data['title'] = "Form Alasan Tidak Diusulkan";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['id'] = $id;
                $data['status'] = $str;
                $this->load->view('template/header', $data);
                $this->load->view('rekap/rekap_ket_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->db->where('id_rekap', $id);
                $this->db->update('tb_rekap', ['ket_rekap' => $str]);
                redirect('rekap/rekap');
            }
        } else {
            redirect('login');
        }
    }

    //edit data rekap keterangan
    public function rekap_ket_save()
    {
        if ($this->session->userdata('email')) {
            $id = $this->input->post('id');
            $alasan = $this->input->post('alasan');
            $str = "Tidak Diusulkan";
            $this->db->where('id_rekap', $id);
            $this->db->update('tb_rekap', ['ket_rekap' => $str, 'ket_rekap_alasan' => $alasan]);
            redirect('rekap/rekap');
        } else {
            redirect('login');
        }
    }

    //edit rekap status
    public function rekap_status($id, $str)
    {
        if ($this->session->userdata('email')) {
            if ($str == "Ditolak") {
                $data['title'] = "Form Alasan Penolakan";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['id'] = $id;
                $data['status'] = $str;
                $this->load->view('template/header', $data);
                $this->load->view('rekap/rekap_status_edit', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/footer');
            } else {
                $this->db->where('id_rekap', $id);
                $this->db->update('tb_rekap', ['status' => $str]);
                redirect('rekap/rekap');
            }
        } else {
            redirect('login');
        }
    }

    public function rekap_status_save()
    {
        if ($this->session->userdata('email')) {
            $id = $this->input->post('id');
            $alasan = $this->input->post('alasan');
            $str = "Ditolak";
            $this->db->where('id_rekap', $id);
            $this->db->update('tb_rekap', ['status' => $str, 'status_alasan' => $alasan]);
            redirect('rekap/rekap');
        } else {
            redirect('login');
        }
    }
    public function rekap_kunci($id, $str)
    {
        if ($this->session->userdata('email')) {
            $this->db->where('id_rekap', $id);
            $this->db->update('tb_rekap', ['kunci' => $str]);
            redirect('rekap/rekap');
        } else {
            redirect('login');
        }
    }

    //mencetak rekap
    public function cetak_rekap()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Rekap Data Beasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $qr = "select * from tb_rekap,tb_mahasiswa,tb_prodi,tb_kepribadian, tb_thusulan 
             where tb_rekap.nim=tb_mahasiswa.nim and tb_mahasiswa.id_prodi=tb_prodi.id_prodi 
             and tb_kepribadian.nim=tb_rekap.nim and tb_rekap.id_usulan=tb_thusulan.id_usulan 
             and tb_kepribadian.id_usulan=tb_rekap.id_usulan and tb_thusulan.status_usulan='Aktif'";

            $data['rekap'] = $this->db->query($qr)->result_array();
            $this->load->view('rekap/rekap_excel', $data);
        } else {
            redirect('login');
        }
    }
}
