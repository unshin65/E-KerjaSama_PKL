<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Model
{
    function jumlah_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 2);

        return $this->db->get()->num_rows();
    }
}
