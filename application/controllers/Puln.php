<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Puln extends CI_Controller
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
        $data['title'] = "PU Luar Negeri";
        $data['pu_ln'] = $this->admin->getPuln();
        $this->template->load('templates/dashboard', 'luar_negri/data', $data);
    }

    private function _validasi()
    {
	$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
    $this->form_validation->set_rules('mitra_id', 'Mitra', 'required');
    $this->form_validation->set_rules('no_po', 'No_po', 'required');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Luar Negeri";
            $data['pu_ln'] = $this->admin->get('pu_ln');
			$data['mitra'] = $this->admin->getMitra();
            $this->template->load('templates/dashboard', 'luar_negri/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('pu_ln', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('puln');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('luar_negri/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Luar Negeri";
            $data['pu_ln'] = $this->admin->get('pu_ln', ['id_pu_ln' => $id]);
			$data['mitra'] = $this->admin->get('mitra');
            $this->template->load('templates/dashboard', 'luar_negri/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('pu_ln', 'id_pu_ln', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('puln');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('luar_negri/edit/' . $id);
            }
        }
    }
	public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Luar Negeri";
            $data['pu_ln'] = $this->admin->get('pu_ln', ['id_pu_ln' => $id]);
            $this->template->load('templates/dashboard', 'luar_negri/detail', $data);
        } else {
        }
        
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('pu_ln', 'id_pu_ln', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('puln');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
