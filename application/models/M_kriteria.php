<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kriteria extends CI_Model
{
    public function simpan_kriteria($data)
    {
        return $this->db->insert('kriteria', $data);
    }

    // Ambil semua data pegawai (opsional)
    public function get_all_kriteria()
    {
        return $this->db->get('kriteria')->result();
    }

    // Ambil satu pegawai berdasarkan ID (opsional)
    public function get_by_id($id)
    {
        return $this->db->get_where('kriteria', ['id' => $id])->row();
    }

    public function hapusKriteria($id)
    {
        return $this->db->delete('kriteria', ['id' => $id]);
    }
}
