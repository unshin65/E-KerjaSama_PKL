<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('tambah/pengguna');
        }
        //login pegawai
        if ($this->session->userdata('role_id') == 2) {
            redirect('user/profile');
        }
        $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $nip = $this->input->post('nip', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['nip' => $nip])->row_array();

        // jika user ada
        if ($user) {
            if ($user['is_active'] == 1) {
                //cek pass
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nip' => $user['nip'],
                        'role_id' => $user['role_id']
                    ];
                    //login untuk admin
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('tambah/pengguna');
                    }
                    //login pegawai
                    else {
                        redirect('user/profile');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">sandi yang anda masukan salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nip gk aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar!</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" > Terima kasih!
</div>');
        redirect('main');
    }
}
