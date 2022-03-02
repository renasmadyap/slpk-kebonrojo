<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('nippos', 'Nippos', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Aplikasi';
            $this->template->load('templates/auth', 'auth/login', $data);
        } else {
            $input = $this->input->post(null, true);
			$nippos = $input['nippos'];
			$koneksi=mysqli_connect("localhost","root","", "db_slpk");
			$data = mysqli_query($koneksi, "SELECT * FROM user WHERE nippos = '$nippos'");
            $cek_nippos = $this->auth->cek_nippos($input['nippos']);
            if ($cek_nippos > 0) {
                $password = $this->auth->get_password($input['nippos']);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['nippos']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi Manajer Prostrans.', false);
                        redirect('login');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id_user'],
                            'role'  => $user_db['role'],
							'nama_petugas'  => $user_db['nama'],
                            'timestamp' => time()
                        ];
						$data_user = mysqli_fetch_assoc($data);
						$_SESSION['id_user'] = $data_user['id_user'];
						$_SESSION['nippos'] = $data_user['nippos'];
						$_SESSION['nama_petugas'] = $data_user['nama'];
						$_SESSION['role'] = $data_user['role'];
                        $_SESSION['tgl_now'] = Date('2000-1-1');
                        $_SESSION['tgl_now1'] = Date('2100-12-30');
                        $_SESSION['tgl_inp'] = Date('Y-m-d');
                        $_SESSION['tgl_inp1'] = Date('Y-m-d');
                        $_SESSION['nipp'] = '01';
                        $_SESSION['nama_pet'] = 'petugas';
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                set_pesan('nippos belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }

    public function register()
    {
        $this->form_validation->set_rules('nippos', 'Nippos', 'required|trim|is_unique[user.nippos]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun';
            $this->template->load('templates/auth', 'auth/register', $data);
        } else {
            $input = $this->input->post(null, true);
            unset($input['password2']);
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['mitra']         = 'DTU';
            $input['role']          = 'gudang';
            $input['rute']          = '0';
            $input['id_petugas']    = '0';
            $input['is_active']     = 0;
            $input['created_at']    = time();

            $query = $this->admin->insert('user', $input);
            if ($query) {
                set_pesan('daftar berhasil. Selanjutnya silahkan hubungi Manajer Prostrans untuk mengaktifkan akun anda.');
                redirect('login');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('register');
            }
        }
    }
}
