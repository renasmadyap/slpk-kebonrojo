<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mandordn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		cek_login();
        if (!is_mandor() and !is_superuser()) {
            redirect('dashboard');
        }

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "PU Dalam Negeri";
        $data['pu_dn'] = $this->admin->getMandordn();
        $this->template->load('templates/dashboard', 'mandor_dn/data', $data);
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
            $data['title'] = "PU Dalam Negeri";
            $data['pu_dn'] = $this->admin->get('pu_dn', ['id_pu_dn' => $id]);
            $this->template->load('templates/dashboard', 'mandor_dn/detail', $data);
        } else {
        }
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}