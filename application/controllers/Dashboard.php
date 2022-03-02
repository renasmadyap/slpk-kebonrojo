<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl_awal', 'Tgl_awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tgl_akhir', 'required');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['pu_dn'] = $this->admin->count('Pu_dn');
        $data['pu_ln'] = $this->admin->count('Pu_ln');
        $data['mandor_koreksi'] = $this->admin->count('Mandor_koreksi');
        $data['mandor_koreksiln'] = $this->admin->count('Mandor_koreksiln');
		$data['user'] = $this->admin->count('user');
        $data['transaksi'] = [
            'Pu_ln' => $this->admin->getPuln(5),
			'Pu_dn' => $this->admin->getPudn(5),
			'Mandordn' => $this->admin->getMandordn(5),
			'Mandorln' => $this->admin->getMandorln(5)
		];
		// Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        $data['cbk'] = [];
        
        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
    public function dashboard_lihat()
    {
        $data['title'] = "Dashboard";
        $tanggal = $this->input->post('tanggal');
        $pecah = explode(' - ', $tanggal);
        $mulai = date('Y-m-d', strtotime($pecah[0]));
        $akhir = date('Y-m-d', strtotime(end($pecah)));
        $_SESSION['tgl'] = $mulai;
        $_SESSION['tgl1'] = $akhir;
        $data['pu_dn'] = $this->admin->count('Pu_dn');
        $data['pu_ln'] = $this->admin->count('Pu_ln');
        $data['mandor_koreksi'] = $this->db->count_all("Mandor_koreksi where tgl_masuk BETWEEN '$mulai' AND '$akhir'");
        $data['mandor_koreksiln'] = $this->db->count_all("Mandor_koreksiln where tgl_masuk BETWEEN '$mulai' AND '$akhir'");
		// Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        $data['cbk'] = [];
        
        $this->template->load('templates/dashboard_lihat', 'dashboard_lihat', $data);
    }
}
