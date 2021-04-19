<?php

class JenisBeasiswa_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //menampilkan semua data jenis beasiswa 
    public function getJenisBeasiswa()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_beasiswa');
        return $this->db->get()->result_array();
    }

    //menampilkan semua data jenis beasiswa berdasarkan status yang aktif
    public function getStatusBeasiswa()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_beasiswa');
        $this->db->where('status_beasiswa =', 'Aktif');
        return $this->db->get()->result_array();
    }

    //menampilkan data jenis beasiswa sesuai id berdasarkan status yang aktif
    public function getStatusBeasiswaById()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_beasiswa');
        $this->db->where('status_beasiswa =', 'Aktif');
        return $this->db->get()->row_array();
    }

    //menampilkan data jenis beasiswa berdasarkan id
    public function getJenisBeasiswaById($id)
    {
        return $this->db->get_where('tb_jenis_beasiswa', ['id_beasiswa' => $id])->row_array();
    }

    //query menambahkan data jenis beasiswa
    public function addJenisBeasiswa()
    {
        $data = [
            'nama_beasiswa' => $this->input->post('nama'),
            'ket_beasiswa' => $this->input->post('keterangan'),
            'status_beasiswa' => $this->input->post('status')
        ];
        $this->db->insert('tb_jenis_beasiswa', $data);
    }

    //query update data jenis beasiswa
    public function updateJenisBeasiswa()
    {
        $data = [
            'nama_beasiswa' => $this->input->post('nama'),
            'ket_beasiswa' => $this->input->post('keterangan'),
            'status_beasiswa' => $this->input->post('status')
        ];
        $this->db->where('id_beasiswa', $this->input->post('id_beasiswa'));
        $this->db->update('tb_jenis_beasiswa', $data);
    }

    //query delete data jenis beasiswa
    public function deleteJenisBeasiswa($id)
    {
        $this->db->delete('tb_jenis_beasiswa', ['id_beasiswa' => $id]);
    }
}
