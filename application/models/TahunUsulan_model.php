<?php

class TahunUsulan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsulan()
    {
        // $this->db->select('*');
        // $this->db->from('tb_thusulan');

        $query = "SELECT * FROM tb_thusulan
                INNER JOIN tb_jenis_beasiswa ON
                tb_thusulan.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
                ORDER BY id_usulan ASC";

        // return $this->db->get()->result_array();
        return $this->db->query($query)->result_array();
    }

    public function getUsulanById($id)
    {
        // $this->db->select('*');
        // $this->db->from('tb_thusulan');

        $query = "SELECT * FROM tb_thusulan
                INNER JOIN tb_jenis_beasiswa ON
                tb_thusulan.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
               WHERE id_usulan = $id";

        // return $this->db->get()->result_array();
        return $this->db->query($query)->row_array();
    }

    public function getStatusTahunUsulanById()
    {
        $this->db->select('*');
        $this->db->from('tb_thusulan');
        $this->db->where('status_usulan =', 'Aktif');
        return $this->db->get()->row_array();

        // $query = "SELECT * FROM tb_thusulan INNER JOIN tb_jenis_beasiswa 
        // ON tb_thusulan.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
        // WHERE tb_thusulan.status_usulan= '" . "Aktif'";
        // return $this->db->query($query)->row_array();
    }

    public function getStatusTahunById()
    {
        $query = "SELECT * FROM tb_thusulan INNER JOIN tb_jenis_beasiswa 
        ON tb_thusulan.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
         WHERE tb_thusulan.status_usulan= '" . "Aktif'";
        return $this->db->query($query)->row_array();
    }

    public function getNamaBeasiswaAktif()
    {
        $query = "SELECT * FROM tb_thusulan INNER JOIN tb_jenis_beasiswa 
        ON tb_thusulan.id_beasiswa = tb_jenis_beasiswa.id_beasiswa
        WHERE tb_thusulan.status_usulan= '" . "Aktif'";
        return $this->db->query($query)->result_array();
    }

    public function addUsulan()
    {
        $data = [
            'tahun' => $this->input->post('tahun'),
            'id_beasiswa' => $this->input->post('id_beasiswa'),
            'status_usulan' => $this->input->post('status')
        ];
        $this->db->insert('tb_thusulan', $data);
    }

    public function updateUsulan()
    {
        $data = [
            'tahun' => $this->input->post('tahun'),
            'id_beasiswa' => $this->input->post('id_beasiswa'),
            'status_usulan' => $this->input->post('status')
        ];
        $this->db->where('id_usulan', $this->input->post('id_usulan'));
        $this->db->update('tb_thusulan', $data);
    }

    public function deleteUsulan($id)
    {
        $this->db->delete('tb_thusulan', ['id_usulan' => $id]);
    }
}
