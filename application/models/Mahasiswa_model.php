<?php

class Mahasiswa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getMahasiswa()
    {
        $query = "SELECT * FROM tb_mahasiswa INNER JOIN tb_prodi ON
                tb_prodi.id_prodi = tb_mahasiswa.id_prodi";

        return $this->db->query($query)->result_array();
    }

    public function addMahasiswa()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'id_prodi' => $this->input->post('prodi'),
            'ortu_nama' => $this->input->post('ortu_nama'),
            'ortu_pekerjaan' => $this->input->post('ortu_pekerjaan'),
            'ortu_penghasilan' => $this->input->post('ortu_penghasilan'),
            'ortu_tanggungan' => $this->input->post('ortu_tanggungan'),
            'ortu_nohp' => $this->input->post('ortu_nohp'),
            'bank_nama' => $this->input->post('bank_nama'),
            'bank_norek' => $this->input->post('bank_norek'),
            'smt' => $this->input->post('smt')
        ];
        $this->db->insert('tb_mahasiswa', $data);
    }

    public function updateMahasiswa()
    {
        $nim = $this->input->post('nim');
        $data = [
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'id_prodi' => $this->input->post('prodi'),
            'ortu_nama' => $this->input->post('ortu_nama'),
            'ortu_pekerjaan' => $this->input->post('ortu_pekerjaan'),
            'ortu_penghasilan' => $this->input->post('ortu_penghasilan'),
            'ortu_tanggungan' => $this->input->post('ortu_tanggungan'),
            'ortu_nohp' => $this->input->post('ortu_nohp'),
            'bank_nama' => $this->input->post('bank_nama'),
            'bank_norek' => $this->input->post('bank_norek'),
            'smt' => $this->input->post('smt')
        ];
        //var_dump($data);
        //die;
        $this->db->where('nim', $nim);
        $this->db->update('tb_mahasiswa', $data);
    }

    public function deleteMahasiswa($id)
    {
        $this->db->delete('tb_mahasiswa', ['nim' => $id]);
    }
}
