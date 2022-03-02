<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkoreksiln extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		cek_login();
        if (!is_admin() and !is_superuser()) {
            redirect('dashboard');
        }

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Koreksi Data";
        $data['mandor_koreksiln'] = $this->admin->getMKoreksiln();
        $this->template->load('templates/dashboard', 'm_koreksiln/data', $data);
    }

    private function _validasi()
    {
	$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
    $this->form_validation->set_rules('mitra', 'Mitra', 'required');
    }

    public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Luar Negeri";
            $data['mandor_koreksiln'] = $this->admin->get('mandor_koreksiln', ['id_koreksiln' => $id]);
            $this->template->load('templates/dashboard', 'm_koreksiln/detail', $data);
        } else {
        }
    }
}
