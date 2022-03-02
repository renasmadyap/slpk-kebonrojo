<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkoreksi extends CI_Controller
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
        $data['mandor_koreksi'] = $this->admin->getMKoreksi();
        $this->template->load('templates/dashboard', 'm_koreksi/data', $data);
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
            $data['title'] = "PU Dalam Negeri";
            $data['mandor_koreksi'] = $this->admin->get('mandor_koreksi', ['id_koreksi' => $id]);
            $this->template->load('templates/dashboard', 'm_koreksi/detail', $data);
        } else {
        }
    }
}
