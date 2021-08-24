<?php
defined('BASEPATH') or exit('No direct script access allowed');


class hapus_user extends CI_Controller
{
    public function hapus($data_dari_URL)
    {
        $this->db->where('nip', $data_dari_URL);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" > Pengguna dihapus!
</div>');
        redirect('tambah/pengguna');
    }
}
