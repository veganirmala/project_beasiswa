<?php

class Prestasi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPrestasi()
    {
        // $qr = "select * from tb_prestasi, tb_thusulan, tb_mahasiswa 
        // where tb_prestasi.nim=tb_mahasiswa.nim and tb_prestasi.id_usulan=tb_thusulan.id_usulan 
        // and tb_thusulan.status_usulan='" . "Aktif'";

        $query = "SELECT * FROM tb_prestasi INNER JOIN tb_thusulan
                ON tb_thusulan.id_usulan = tb_prestasi.id_usulan
                INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_prestasi.nim
                INNER JOIN tb_jenis_beasiswa ON tb_jenis_beasiswa.id_beasiswa = tb_prestasi.id_beasiswa
                ORDER BY id_prestasi ASC";
        //INNER JOIN tb_jenis_beasiswa ON tb_jenis_beasiswa.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
        // WHERE tb_thusulan.status_usulan = '" . "Aktif'";
        return $this->db->query($query)->result_array();
    }

    public function getPrestasiById($id)
    {
        $query = "SELECT * FROM tb_prestasi 
                INNER JOIN tb_thusulan ON tb_thusulan.id_usulan = tb_prestasi.id_usulan
                INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_prestasi.nim
                INNER JOIN tb_jenis_beasiswa ON tb_jenis_beasiswa.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
               WHERE id_prestasi = $id";
        return $this->db->query($query)->row_array();

        // $query = "SELECT * FROM tb_prestasi INNER JOIN tb_thusulan
        // ON tb_thusulan.id_usulan = tb_prestasi.id_usulan
        // INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_prestasi.nim
        // WHERE id_prestasi = $id";
        // return $this->db->query($query)->row_array();
    }


    public function addPrestasi()
    {
        $id = $this->input->post('id_usulan');
        $id_beasiswa = $this->input->post('id_beasiswa');
        $nim = $this->input->post('nim');
        $nilaiprestasi = $this->input->post('nilai_prestasi');
        $data = [
            'id_usulan' => $id,
            'nim' => $nim,
            'id_beasiswa' => $id_beasiswa,
            'nilai_prestasi' => $nilaiprestasi
        ];
        $this->db->insert('tb_prestasi', $data);
    }

    public function updatePrestasi()
    {
        $id = $this->input->post('id_prestasi');
        $data = [

            'nilai_prestasi' => $this->input->post('nilai')
        ];
        $this->db->where('id_prestasi', $id);
        $this->db->update('tb_prestasi', $data);
    }

    public function deletePrestasi($id)
    {
        $this->db->delete('tb_prestasi', ['id_prestasi' => $id]);
    }
}
