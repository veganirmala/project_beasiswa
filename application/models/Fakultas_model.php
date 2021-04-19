<?php

class Fakultas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getFakultas()
    {
        $this->db->select('*');
        $this->db->from('tb_fakultas');
        return $this->db->get()->result_array();
    }

    public function getFakultasById($id)
    {
        return $this->db->get_where('tb_fakultas', ['id_fakultas' => $id])->row_array();
    }

    public function addFakultas()
    {
        $data = [
            'nama_fakultas' => $this->input->post('nama_fakultas'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('tb_fakultas', $data);
    }

    public function updateFakultas()
    {
        $data = [
            'nama_fakultas' => $this->input->post('nama_fakultas'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id_fakultas', $this->input->post('id_fakultas'));
        $this->db->update('tb_fakultas', $data);
    }

    public function deleteFakultas($id)
    {
        $this->db->delete('tb_fakultas', ['id_fakultas' => $id]);
    }
}
