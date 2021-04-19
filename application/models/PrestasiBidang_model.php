<?php

class PrestasiBidang_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPrestasiBidang()
    {
        //$query = "SELECT * FROM tb_prestasi_bidang";

        // $query = "select tb_prestasi_bidang.* from tb_prestasi_bidang";

        // return $this->db->query($query)->result_array();

        $this->db->select('*');
        $this->db->from('tb_prestasi_bidang');

        return $this->db->get()->result_array();
    }

    public function getPrestasiBidangById($id)
    {
        $this->db->select('*');
        $this->db->from('tb_prestasi_bidang');

        return $this->db->get()->row_array();
    }

    public function addBidang()
    {
        $data = [
            'nama_bidang' => $this->input->post('nama_bidang'),
            'tingkat' => $this->input->post('tingkat'),
            'juara' => $this->input->post('juara'),
            'skor' => $this->input->post('skor'),
            'status' => $this->input->post('status')
        ];
        $this->db->insert('tb_prestasi_bidang', $data);
    }

    public function updateBidang()
    {
        $data = [
            'nama_bidang' => $this->input->post('nama_bidang'),
            'tingkat' => $this->input->post('tingkat'),
            'juara' => $this->input->post('juara'),
            'skor' => $this->input->post('skor'),
            'status' => $this->input->post('status')
        ];
        $this->db->where('id_bidang', $this->input->post('id_bidang'));
        $this->db->update('tb_prestasi_bidang', $data);
    }

    public function deletePrestasiBidang($id)
    {
        $this->db->delete('tb_prestasi_bidang', ['id_bidang' => $id]);
    }
}
