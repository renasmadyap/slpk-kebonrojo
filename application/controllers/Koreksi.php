<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koreksi extends CI_Controller
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
        $data['title'] = "Koreksi Data";
        $data['mandor_koreksi'] = $this->admin->getKoreksi();
        $this->template->load('templates/dashboard', 'koreksi_mandor/data', $data);
    }

    private function _validasi()
    {
	$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
    }

    
    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Koreksi Data";
            $data['mandor_koreksi'] = $this->admin->get('mandor_koreksi', ['id_koreksi' => $id]);
            $this->template->load('templates/dashboard', 'koreksi_mandor/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('mandor_koreksi', 'id_koreksi', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('Koreksi');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('koreksi_mandor/edit/' . $id);
            }
        }
    }
	public function koreksi($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Dalam Negeri";
            $data['pu_dn'] = $this->admin->get('pu_dn', ['id_pu_dn' => $id]);
            $this->template->load('templates/dashboard', 'koreksi_mandor/koreksi', $data);
        } else {
            $koreksi = $this->input->post(null, true);
			$insert = $this->db->insert('mandor_koreksi', $koreksi);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('Koreksi');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('koreksi/koreksi/' . $id);
            }
        }
    }

	public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "PU Dalam Negeri";
            $data['mandor_koreksi'] = $this->admin->get('mandor_koreksi', ['id_koreksi' => $id]);
            $this->template->load('templates/dashboard', 'koreksi_mandor/detail', $data);
        } else {
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('mandor_koreksi', 'id_koreksi', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('Koreksi');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
