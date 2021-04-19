<?php

class Jurusan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getFakultasById()
    {
        $query = "SELECT * FROM tb_fakultas
                ORDER BY id_fakultas";

        return $this->db->query($query)->result_array();
    }

    public function getJurusan()
    {
        $query = "SELECT * FROM tb_fakultas
                INNER JOIN tb_jurusan ON
                tb_fakultas.id_fakultas = tb_jurusan.id_fakultas
                ORDER BY id_jurusan";

        return $this->db->query($query)->result_array();
    }

    public function addJurusan()
    {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama_jurusan' => $this->input->post('nama_jurusan'),
            'ket_jur' => $this->input->post('ket_jur')
        ];
        $this->db->insert('tb_jurusan', $data);
    }

    public function getJurusanById($id)
    {
        $query = "SELECT * FROM tb_jurusan
        INNER JOIN tb_fakultas
        ON tb_fakultas.id_fakultas = tb_jurusan.id_fakultas
        WHERE id_jurusan = $id";

        return $this->db->query($query)->row_array();
    }

    public function updateJurusan()
    {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama_jurusan' => $this->input->post('nama_jurusan'),
            'ket_jur' => $this->input->post('ket_jur')
        ];
        $this->db->where('id_jurusan', $this->input->post('id_jurusan'));
        $this->db->update('tb_jurusan', $data);
    }

    public function deleteJurusan($id)
    {
        $this->db->delete('tb_jurusan', ['id_jurusan' => $id]);
    }
}
