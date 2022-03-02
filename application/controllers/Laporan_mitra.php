<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_mitra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		cek_login();
        if (!is_mandor() and !is_admin() and !is_superuser()) {
            redirect('dashboard');
        }
   
        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[pu_dn,pu_ln,mandor_koreksi,mandor_koreksiln]');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Laporan mitra";
            $this->template->load('templates/dashboard', 'laporan_mitra/form', $data);
        } else {
            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $query = '';
            if ($table == 'mandor_koreksi') {
                $query = $this->admin->getKoreksi(null, null);
			} elseif ($table == 'mandor_koreksiln') {
                $query = $this->admin->getKoreksiln(null, null);
			} elseif ($table == 'pu_dn') {
                $query = $this->admin->getMandordn(null, null);
            } else {
				$query = $this->admin->getMandorln(null, null);
            }

            $this->_cetak($query, $table);
        }
    }

    private function _cetak($data, $table_)
    {
        $this->load->library('CustomPDF');
        /*$table = $table_ == 'pu_dn' ? 'pu_ln' ? 'KOREKSI' : 'PICKUP' : 'PICKUP';
        
        $pdf = new FPDF();
        $pdf->AddPage('L', 'a4');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(250, 7, 'REKAP DATA ' . $table, 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(250, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        */ 
        // memanggil database
        if ($table_ == 'mandor_koreksi') :
            $data['title'] = "Laporan mitra";
            $this->template->load('templates/dashboard', 'laporan_mitra/rekap_koreksipudn', $data);
            /*$pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Tgl Input', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Nama Petugas', 1, 0, 'C');
            $pdf->Cell(50, 7, 'Mitra', 1, 0, 'C');
			$pdf->Cell(25, 7, 'Jadwal PU', 1, 0, 'C');
            $pdf->Cell(15, 7, 'INSTAN', 1, 0, 'C');
			$pdf->Cell(15, 7, 'POSEX', 1, 0, 'C');
			$pdf->Cell(15, 7, 'PKH', 1, 0, 'C');
			$pdf->Cell(20, 7, 'PERLAKSUS', 1, 0, 'C');
			$pdf->Cell(20, 7, 'LOGISTIK', 1, 0, 'C');
			$pdf->Cell(20, 7, 'LAINNYA', 1, 0, 'C');
			$pdf->Cell(15, 7, 'TOTAL', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($query as $d) {
				$pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(20, 7, $d['tgl_masuk'], 1, 0, 'C');
                $pdf->Cell(45, 7, $d['nama_petugas'], 1, 0, 'C');
				$pdf->Cell(50, 7, $d['nama_mitra'], 1, 0, 'C');
				$pdf->Cell(25, 7, $d['jadwal_pu'], 1, 0, 'C');
				$pdf->Cell(15, 7, $d['instan_jml'], 1, 0, 'C');
                $pdf->Cell(15, 7, $d['pos_exp_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['pkh_jml'],1, 0, 'C');
				$pdf->Cell(20, 7, $d['perlaksus_jml'],1, 0, 'C');
				$pdf->Cell(20, 7, $d['log_jml'],1, 0, 'C');
				$pdf->Cell(20, 7, $d['lain_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['total'],1, 0, 'C');
                $pdf->Ln();*/

            elseif ($table_ == 'mandor_koreksiln') :
            $data['title'] = "Laporan mitra";
            $this->template->load('templates/dashboard', 'laporan_mitra/rekap_koreksipuln', $data);
			/*$pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Tgl Input', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Nama Petugas', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Mitra', 1, 0, 'C');
			$pdf->Cell(25, 7, 'Jadwal PU', 1, 0, 'C');
			$pdf->Cell(30, 7, 'Tujan Pengiriman', 1, 0, 'C');
            $pdf->Cell(10, 7, 'EMS', 1, 0, 'C');
			$pdf->Cell(20, 7, 'Pos Export', 1, 0, 'C');
			$pdf->Cell(15, 7, 'PP Cepat', 1, 0, 'C');
			$pdf->Cell(15, 7, 'PP Laut', 1, 0, 'C');
			$pdf->Cell(15, 7, 'R-LN', 1, 0, 'C');
			$pdf->Cell(15, 7, 'E-Packet', 1, 0, 'C');
			$pdf->Cell(15, 7, 'Lainnya', 1, 0, 'C');
			$pdf->Cell(15, 7, 'Total P.U', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($query as $d) {
				$pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(20, 7, $d['tgl_masuk'], 1, 0, 'C');
                $pdf->Cell(40, 7, $d['nama_petugas'], 1, 0, 'C');
				$pdf->Cell(40, 7, $d['nama_mitra'], 1, 0, 'C');
				$pdf->Cell(25, 7, $d['jadwal_pu'], 1, 0, 'C');
                $pdf->Cell(30, 7, $d['tujuan_krm'], 1, 0, 'C');
				$pdf->Cell(10, 7, $d['ems_jml'], 1, 0, 'C');
                $pdf->Cell(20, 7, $d['pos_expt_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['pp_cpt_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['pp_laut_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['r_ln_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['e_pack_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['lain_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['total'],1, 0, 'C');
                $pdf->Ln();*/

            elseif ($table_ == 'pu_dn') :
            $data['title'] = "Laporan mitra";
            $this->template->load('templates/dashboard', 'laporan_mitra/rekap_pudn', $data);
			/*$pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Tgl Input', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Nama Petugas', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Mitra', 1, 0, 'C');
			$pdf->Cell(25, 7, 'Jadwal PU', 1, 0, 'C');
			$pdf->Cell(30, 7, 'Tujan Pengiriman', 1, 0, 'C');
            $pdf->Cell(15, 7, 'INSTAN', 1, 0, 'C');
			$pdf->Cell(15, 7, 'POSEX', 1, 0, 'C');
			$pdf->Cell(15, 7, 'PKH', 1, 0, 'C');
			$pdf->Cell(20, 7, 'PERLAKSUS', 1, 0, 'C');
			$pdf->Cell(20, 7, 'LOGISTIK', 1, 0, 'C');
			$pdf->Cell(20, 7, 'LAINNYA', 1, 0, 'C');
			$pdf->Cell(15, 7, 'TOTAL', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($query as $d) {
				$pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(20, 7, $d['tgl_masuk'], 1, 0, 'C');
                $pdf->Cell(40, 7, $d['nama_petugas'], 1, 0, 'C');
				$pdf->Cell(40, 7, $d['nama_mitra'], 1, 0, 'C');
				$pdf->Cell(25, 7, $d['jadwal_pu'], 1, 0, 'C');
                $pdf->Cell(30, 7, $d['tujuan_krm'], 1, 0, 'C');
				$pdf->Cell(15, 7, $d['instan_jml'], 1, 0, 'C');
                $pdf->Cell(15, 7, $d['pos_exp_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['pkh_jml'],1, 0, 'C');
				$pdf->Cell(20, 7, $d['perlaksus_jml'],1, 0, 'C');
				$pdf->Cell(20, 7, $d['log_jml'],1, 0, 'C');
				$pdf->Cell(20, 7, $d['lain_jml'],1, 0, 'C');
				$pdf->Cell(15, 7, $d['total'],1, 0, 'C');
                $pdf->Ln();
            }
            */

            else :
                $data['title'] = "Laporan mitra";
                $this->template->load('templates/dashboard', 'laporan_mitra/rekap_puln', $data);
        endif;

        //$file_name = $table . ' ' . $tanggal;
        //$pdf->Output('I', $file_name);
        
    }
}
