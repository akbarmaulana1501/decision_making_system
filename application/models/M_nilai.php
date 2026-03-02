<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_nilai extends CI_Model
{
    public function simpan_nilai($data)
    {
        return $this->db->insert('nilai_karyawan', $data);
    }

    // Ambil semua data pegawai (opsional)
    public function get_all_nilai()
    {
        return $this->db->get('nilai_karyawan')->result();
    }

    public function delete_multiple($ids)
    {
        $this->db->where_in('id', $ids);
        return $this->db->delete('nilai_karyawan'); // ganti nama tabel sesuai punya kamu
    }

    // Ambil satu pegawai berdasarkan ID (opsional)
    public function get_by_id($id)
    {
        return $this->db->get_where('nilai_karyawan', ['id' => $id])->row();
    }

    public function hapusNilai($id)
    {
        return $this->db->delete('nilai_karyawan', ['id' => $id]);
    }

    public function get_pegawai()
    {
        return $this->db->get('pegawai2')->result();
    }

    public function get_kriteria()
    {
        return $this->db->get('kriteria')->result();
    }

    public function get_pegawai_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('pegawai2');
        $this->db->where('kode_nip', $id);
        return $this->db->get()->row();
    }
    public function get_kriteria_by_id($id)
    {
        return $this->db->get_where('kriteria', ['id' => $id])->row();
    }

    public function save_analisa_data($namaPegawai, $total)
    {
        date_default_timezone_set('Asia/Jakarta');
        $existing = $this->db->get_where('hasil_analisa', ['nama_pegawai' => $namaPegawai])->row();

        if ($existing) {
            $this->db->where('nama_pegawai', $namaPegawai);
            $this->db->update('hasil_analisa', ['total_nilai' => $total, 'update_at' => date('Y-m-d H:i:s')]);
            return 'update';  // tandai ini update
        } else {
            $this->db->insert('hasil_analisa', [
                'nama_pegawai' => $namaPegawai,
                'total_nilai' => $total,
                'tanggal_input' => date('Y-m-d H:i:s')
            ]);
            if ($this->db->affected_rows() > 0) {
                return 'insert';  // tandai ini insert
            } else {
                return false;
            }
        }
    }

    public function get_cluster()
    {
        $this->db->select('*');
        $this->db->from('hasil_cluster');
        return $this->db->get()->result();
    }

    public function getPeringkatKaryawan()
    {
        $this->db->select('*');  // Urutkan berdasarkan total_nilai, DESC (tertinggi ke terendah)
        // $this->db->limit(5);
        $query = $this->db->get('hasil_analisa');  // Ganti 'nama_tabel' dengan nama tabel Anda
        return $query->result();
    }

    public function hasil_analisa()
    {
        $this->db->select('*');
        $this->db->from('hasil_analisa');
        return $this->db->get()->result();
    }
}
