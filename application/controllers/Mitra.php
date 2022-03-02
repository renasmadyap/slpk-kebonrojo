<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        
        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Mitra Management";
        $data['mitra'] = $this->admin->getMitra();
        // $data['title'] = 'Import Excel'; 
        // $data['mitra'] = $this->db->get('mitra')->result();
        // $this->load->view('import/index', $data);
        $this->template->load('templates/dashboard', 'mitra/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_mitra', 'Nama Mitra', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Mitra";
            $this->template->load('templates/dashboard', 'mitra/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('mitra', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('mitra');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('mitra/add');
            }
        }
    }

    public function create()
    {
            $data['title'] = "Upload File Excel";
            $this->template->load('templates/dashboard', 'mitra/create', $data);
    }

    public function excel()
    {
            if(isset($_FILES["file"]["name"])){
                  // upload
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_type=$_FILES['file']['type'];
                // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
                
                $object = PHPExcel_IOFactory::load($file_tmp);
        
                foreach($object->getWorksheetIterator() as $worksheet){
        
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
        
                    for($row=2; $row<=$highestRow; $row++){
        
                        $id_mitra = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $nama_mitra = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $wilayah = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $alamat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                        $data[] = array(
                            'id_mitra'          => $id_mitra,
                            'nama_mitra'          =>$nama_mitra,
                            'wilayah'          => $wilayah,
                            'alamat'          => $alamat,
                        );
        
                    } 
        
                }
        
                $this->db->insert_batch('mitra', $data);
        
                $message = array(
                    'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('mitra');
            }
            else
            {
                 $message = array(
                    'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('mitra');
            }
        }

    /* End of file Import.php */
    /* Location: ./application/controllers/Import.php */
    
    public function edit($getId)
    {
		$id = encode_php_tags($getId);
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Mitra";
			$data['mitra'] = $this->admin->get('mitra', ['id_mitra' => $id]);
            $this->template->load('templates/dashboard', 'mitra/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('mitra', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('mitra');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('mitra/edit');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('mitra', 'id_mitra', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('mitra');
    }

}
