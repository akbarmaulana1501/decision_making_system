<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{

    public function simpan_pegawai($data)
    {
        return $this->db->insert('pegawai2', $data);
    }

    // Ambil semua data pegawai (opsional)
    public function get_all_pegawai()
    {
        return $this->db->get('pegawai2')->result();
    }

    // Ambil satu pegawai berdasarkan ID (opsional)
    public function get_by_id($id)
    {
        return $this->db->get_where('pegawai2', ['id' => $id])->row();
    }

    public function hapusPegawai($id)
    {
        return $this->db->delete('pegawai2', ['id' => $id]);
    }

    // public function hapusData($id)
    // {
    //     // Logic untuk menghapus data pegawai
    //     $this->db->where('id', $id);
    //     return $this->db->delete('pegawai');
    // }
}
