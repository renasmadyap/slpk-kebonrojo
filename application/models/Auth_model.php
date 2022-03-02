<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_nippos($nippos)
    {
        $query = $this->db->get_where('user', ['nippos' => $nippos]);
        return $query->num_rows();
    }

    public function get_password($nippos)
    {
        $data = $this->db->get_where('user', ['nippos' => $nippos])->row_array();
        return $data['password'];
    }

    public function userdata($nippos)
    {
        return $this->db->get_where('user', ['nippos' => $nippos])->row_array();
    }
}
