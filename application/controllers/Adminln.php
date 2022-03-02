<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminln extends CI_Controller
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
        $data['title'] = "PU Luar Negeri";
        $data['pu_ln'] = $this->admin->getMandorln();
        $this->template->load('templates/dashboard', 'admin_ln/data', $data);
    }

    private function _validasi()
    {
	$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
    $this->form_validation->set_rules('mitra', 'Mitra', 'required');
    $this->form_validation->set_rules('no_po', 'No_po', 'required');
    }
	public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Luar Negeri";
            $data['pu_ln'] = $this->admin->get('pu_ln', ['id_pu_ln' => $id]);
            $this->template->load('templates/dashboard', 'admin_ln/detail', $data);
        } else {
        }
    }
}
