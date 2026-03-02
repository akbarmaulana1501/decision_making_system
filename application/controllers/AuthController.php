<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('Auth/login');
    }

    public function login()
    {
        // Ambil data dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek username dan password di database
        $user = $this->M_user->get_user($username, $password);

        if ($user->password === $password) {
            // Jika login berhasil, buat session
            $this->session->set_userdata([
                'user_id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'logged_in' => true
            ]);

            // Simpan session_id ke database
            // $this->M_user->update_session($user->id, $session_id);

            // Kirim respon sukses
            echo json_encode(['status' => 'success', 'message' => 'Login berhasil', 'role' => $user->role]);
        } else {
            // Kirim respon error jika login gagal
            echo json_encode(['status' => 'error', 'message' => 'Username atau password salah']);
        }
    }

    public function update_password()
    {
        $old = $this->input->post('old_password');
        $new = $this->input->post('new_password');
        $confirm = $this->input->post('confirm_password');
        $user_id = $this->session->userdata('user_id');

        $user = $this->M_user->get_user_by_id($user_id);

        if (!$user || $user->password !== $old) {
            echo json_encode(['status' => 'error', 'message' => 'Password lama salah']);
            return;
        }

        if ($new !== $confirm) {
            echo json_encode(['status' => 'error', 'message' => 'Konfirmasi password tidak cocok']);
            return;
        }

        $this->M_user->update_password($user_id, $new);

        echo json_encode(['status' => 'success', 'message' => 'Password berhasil diubah']);
    }


    public function logout()
    {
        // Hapus semua data session
        $this->session->sess_destroy();

        // Redirect ke halaman login
        redirect('AuthController'); // Ganti 'auth/login' sesuai dengan route login kamu
    }
}
