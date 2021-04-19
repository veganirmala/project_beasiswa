<?php

class Kepribadian_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKepribadian()
    {
        // $qr = "select * from tb_kepribadian, tb_thusulan, tb_mahasiswa 
        //     where tb_kepribadian.nim=tb_mahasiswa.nim and tb_kepribadian.id_usulan=tb_thusulan.id_usulan 
        //     and tb_thusulan.status_usulan='" . "Aktif'";

        // $query = "SELECT * FROM tb_thusulan
        //     INNER JOIN tb_jenis_beasiswa ON
        //     tb_thusulan.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
        //     ORDER BY id_usulan ASC";

        $query = "SELECT * FROM tb_kepribadian INNER JOIN tb_mahasiswa 
                ON tb_mahasiswa.nim = tb_kepribadian.nim
                INNER JOIN tb_thusulan ON tb_thusulan.id_usulan = tb_kepribadian.id_usulan
                INNER JOIN tb_jenis_beasiswa ON tb_jenis_beasiswa.id_beasiswa = tb_kepribadian.id_beasiswa
                ORDER BY id_kepribadian ASC";
        // WHERE tb_thusulan.status_usulan= '" . "Aktif'";
        return $this->db->query($query)->result_array();
    }

    public function addKepribadian()
    {
        $id = $this->input->post('id_usulan');
        $idbeasiswa = $this->input->post('nama_beasiswa');
        $nim = $this->input->post('nim');
        $data = [
            'id_usulan' => $id,
            'id_beasiswa' => $idbeasiswa,
            'nim' => $nim,
            'nilai_pribadi' => $this->input->post('nilai_pribadi'),
            'ipk' => $this->input->post('ipk')
        ];
        $this->db->insert('tb_kepribadian', $data);
    }

    public function updateKepribadian()
    {
        $id = $this->input->post('id_kepribadian');
        $data = [

            'nilai_pribadi' => $this->input->post('nilai'),
            'ipk' => $this->input->post('ipk')
        ];
        $this->db->where('id_kepribadian', $id);
        $this->db->update('tb_kepribadian', $data);
    }


    public function getKepribadianById($id)
    {
        $query = "SELECT * FROM tb_kepribadian 
                INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_kepribadian.nim
                INNER JOIN tb_thusulan ON tb_thusulan.id_usulan = tb_kepribadian.id_usulan
                INNER JOIN tb_jenis_beasiswa ON tb_jenis_beasiswa.id_beasiswa = tb_kepribadian.id_beasiswa
                WHERE id_kepribadian = $id";

        return $this->db->query($query)->row_array();
    }

    public function deleteKepribadian($id)
    {
        $this->db->delete('tb_kepribadian', ['id_kepribadian' => $id]);
    }
}
