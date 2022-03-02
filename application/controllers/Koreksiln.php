<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koreksiln extends CI_Controller
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
        $data['title'] = "Koreksi Data Luar Negeri";
        $data['mandor_koreksiln'] = $this->admin->getKoreksiln();
        $this->template->load('templates/dashboard', 'koreksi_mandorln/data', $data);
    }

    private function _validasi()
    {
	$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
    $this->form_validation->set_rules('nippos', 'Nippos', 'required');
    }

    
    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Koreksi Data Luar Negeri";
            $data['mandor_koreksiln'] = $this->admin->get('mandor_koreksiln', ['id_koreksiln' => $id]);
            $this->template->load('templates/dashboard', 'koreksi_mandorln/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('mandor_koreksiln', 'id_koreksiln', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('Koreksiln');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('koreksi_mandorln/edit/' . $id);
            }
        }
    }
	public function koreksiln($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Luar Negeri";
            $data['pu_ln'] = $this->admin->get('pu_ln', ['id_pu_ln' => $id]);
            $this->template->load('templates/dashboard', 'koreksi_mandorln/koreksi', $data);
        } else {
            $koreksi = $this->input->post(null, true);
			$insert = $this->db->insert('mandor_koreksiln', $koreksi);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('Koreksiln');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('koreksiln/koreksi/' . $id);
            }
        }
    }
	public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Luar Negeri";
            $data['mandor_koreksiln'] = $this->admin->get('mandor_koreksiln', ['id_koreksiln' => $id]);
            $this->template->load('templates/dashboard', 'koreksi_mandorln/detail', $data);
        } else {
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('mandor_koreksiln', 'id_koreksiln', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('Koreksiln');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
