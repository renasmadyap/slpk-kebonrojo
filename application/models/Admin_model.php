<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('role != "Super user" AND id_user !=',$id);
        return $this->db->get('user')->result_array();
    }
	public function getMitra($limit = null, $id_mitra = null)
	{
		$this->db->select('*');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_mitra != null) {
            $this->db->where('id_mitra', $id_mitra);
        }
        $this->db->order_by('wilayah, nama_mitra');
        return $this->db->get('mitra m')->result_array();
    }

    public function getPudn($limit = null, $id_pu_dn = null)
	{
		$this->db->join('mitra m', 'dn.mitra_id = m.id_mitra');
		$nama = $_SESSION['nama_petugas'];
		$this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk')->where("nama_petugas = '$nama' and tgl_masuk >= CURRENT_DATE()");
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_pu_dn != null) {
            $this->db->where('id_pu_dn', $id_pu_dn);
        }
        $this->db->order_by('nama_mitra ASC');
        return $this->db->get('pu_dn dn')->result_array();
    }
	public function getMandordn($limit = null, $id_pu_dn = null)
	{
		$this->db->join('mitra m', 'dn.mitra_id = m.id_mitra');
		$this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_pu_dn != null) {
            $this->db->where('id_pu_dn', $id_pu_dn);
        }
        $this->db->order_by('tgl_masuk desc');
        return $this->db->get('pu_dn dn')->result_array();
    }
	
    public function getPuln($limit = null, $id_pu_ln = null)
    {
		$this->db->join('mitra m', 'ln.mitra_id = m.id_mitra');
        $nama = $_SESSION['nama_petugas'];
		$this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk')->where("nama_petugas = '$nama' and tgl_masuk >= CURRENT_DATE()");
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_pu_ln != null) {
            $this->db->where('id_pu_ln', $id_pu_ln);
        }
        
        $this->db->order_by('id_pu_ln');
        return $this->db->get('pu_ln ln')->result_array();
    }
	public function getMandorln($limit = null, $id_pu_ln = null)
    {
		$this->db->join('mitra m', 'ln.mitra_id = m.id_mitra');
        $this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_pu_ln != null) {
            $this->db->where('id_pu_ln', $id_pu_ln);
        }
        
        $this->db->order_by('id_pu_ln desc');
        return $this->db->get('pu_ln ln')->result_array();
    }
	
	public function getKoreksi($limit = null, $id_koreksi = null)
	{
		$this->db->join('mitra m', 'mandor_koreksi.mitra_id = m.id_mitra');
		$this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_koreksi != null) {
            $this->db->where('id_koreksi', $id_koreksi);
        }
        $this->db->order_by('id_koreksi desc');
        return $this->db->get('mandor_koreksi')->result_array();
    }
	public function getKoreksiln($limit = null, $id_koreksiln = null)
	{
		$this->db->join('mitra m', 'mandor_koreksiln.mitra_id = m.id_mitra');
		$this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_koreksiln != null) {
            $this->db->where('id_koreksiln', $id_koreksiln);
        }
        $this->db->order_by('id_koreksiln desc');
        return $this->db->get('mandor_koreksiln')->result_array();
    }
	public function getMkoreksi($limit = null, $id_koreksi = null)
	{
		$this->db->join('mitra m', 'mandor_koreksi.mitra_id = m.id_mitra');
		$this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_koreksi != null) {
            $this->db->where('id_koreksi', $id_koreksi);
        }
        $this->db->order_by('id_koreksi desc');
        return $this->db->get('mandor_koreksi')->result_array();
    }
    public function getMkoreksiln($limit = null, $id_koreksiln = null)
	{
		$this->db->join('mitra m', 'mandor_koreksiln.mitra_id = m.id_mitra');
		$this->db->select('*, DATE_FORMAT(tgl_masuk, "%d/%m/%Y") AS tgl_masuk');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_koreksiln != null) {
            $this->db->where('id_koreksiln desc', $id_koreksiln);
        }
        $this->db->order_by('id_koreksiln');
        return $this->db->get('mandor_koreksiln')->result_array();
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    /*public function chartDalamNegeri($bulan)
    {
        $like = date('m') . $bulan;
        $this->db->like('id_pu_dn', $like, 'after');
        return count($this->db->get('pu_dn')->result_array());
    }

    public function chartLuarNegeri($bulan)
    {
        $like = date('m') . $bulan;
        $this->db->like('id_pu_ln', $like, 'after');
        return count($this->db->get('pu_ln')->result_array());
    }*/

    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'pu_dn' ? 'pu_ln' ? 'KOREKSI' : 'PICKUP' : 'PICKUP';
        $this->db->where($tgl . ' =', $mulai);
        $this->db->where($tgl . ' =', $akhir);
        return $this->db->get($table)->result_array();
    }
}
