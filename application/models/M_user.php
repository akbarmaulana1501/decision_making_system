<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model 
{

    public function get_user($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row(); // return satu baris
    }
    public function get_all_user()
    {
        $this->db->where('role','bos');
        return $this->db->get('user')->result();
    }

    public function simpan_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function update_password($id, $new_password)
    {
        $this->db->where('id', $id);
        $this->db->update('user', ['password' => $new_password]);
    }

    public function hapusUser($id)
    {
        return $this->db->delete('user', ['id' => $id]);
    }

    // public function hapusData($id)
    // {
    //     // Logic untuk menghapus data pegawai
    //     $this->db->where('id', $id);
    //     return $this->db->delete('user');
    // }
}
