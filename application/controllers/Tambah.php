
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah extends CI_Controller
{
    // fungsi untuk ke view upload dokumen 
    public function pengguna()
    {
        $data['title'] = 'Tambah Pengguna';
        $data['user'] = $this->db->get_where(
            'user',
            ['nip' => $this->session->userdata('nip')]
        )->row_array();
        //buat di tabel all user
        $data['name'] = $this->db->get('user')->result_array();
        $data['nip'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'password berbeda!',
            //'min_lenght' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');



        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tambah/pengguna', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'status' => htmlspecialchars($this->input->post('status', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 1,


            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil terdaftar!</div>');
            redirect('Tambah/pengguna');
        }
        ///// method untuk hapus user
    }
    public function del($nip)
    {

        $nip = $this->input->post('nip');
        $this->user_m->del($nip);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil');</script>";
        }
    }
}
