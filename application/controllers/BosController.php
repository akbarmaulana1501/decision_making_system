<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BosController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
        $this->load->model('M_kriteria');
        $this->load->model('M_nilai');
        $this->load->model('M_user');
    }

    public function dashboardBos()
    {
        $data['peringkat'] = $this->M_nilai->getPeringkatKaryawan();
        $this->load->view('bos/bos_dash',$data);
    }

    public function nilaiKaryawan()
    {
        $data['nilai_karyawan'] = $this->M_nilai->get_all_nilai();
        $this->load->view('bos/nilai_karyawan/data_nilai_karyawan',$data);
    }

    public function dataKaryawan(){
        $data['pegawai'] = $this->M_pegawai->get_all_pegawai();
        $this->load->view('bos/data_pegawai/data_pegawai',$data);
    }
}
