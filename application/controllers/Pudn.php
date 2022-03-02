<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pudn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		cek_login();
        if (!is_pickup() and !is_superuser()) {
            redirect('dashboard');
        }

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "PU Dalam Negeri";
        $data['pu_dn'] = $this->admin->getPudn();
        $this->template->load('templates/dashboard', 'dalam_negri/data', $data);
    }

    private function _validasi()
    {
	$this->form_validation->set_rules('nippos', 'Nippos', 'required');	
	$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
	$this->form_validation->set_rules('mitra_id', 'Mitra', 'required');
    $this->form_validation->set_rules('no_po', 'No_po', 'required');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Dalam Negeri";
            $data['pu_dn'] = $this->admin->get('pu_dn');
			$data['mitra'] = $this->admin->getMitra();
            $this->template->load('templates/dashboard', 'dalam_negri/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('pu_dn', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('pudn');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('dalam_negri/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Dalam Negeri";
            $data['pu_dn'] = $this->admin->get('pu_dn', ['id_pu_dn' => $id]);
			$data['mitra'] = $this->admin->get('mitra');
            $this->template->load('templates/dashboard', 'dalam_negri/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('pu_dn', 'id_pu_dn', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('pudn');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('dalam_negri/edit/' . $id);
            }
        }
    }
	public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Dalam Negeri";
            $data['pu_dn'] = $this->admin->get('pu_dn', ['id_pu_dn' => $id]);
			$data['mitra'] = $this->admin->get('mitra');
            $this->template->load('templates/dashboard', 'dalam_negri/detail', $data);
        } else {
        }
        
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('pu_dn', 'id_pu_dn', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('pudn');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
