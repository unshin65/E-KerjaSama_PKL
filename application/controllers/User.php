<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // fungsi kontrol untuk ke view submenu MY Profile ="profile"
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where(
            'user',
            ['nip' => $this->session->userdata('nip')]
        )->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    // fungsi kontrol untuk ke view submenu EDIT PROFILE ="edit profile"
    public function editprofile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nip' =>
        $this->session->userdata('nip')])->row_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editprofile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $nip = $this->input->post('nip');
            $alamat = $this->input->post('alamat');


            // CEK GAMBAR YANG AKAN DI UPLOAD
            $upload_image = $_FILES['image'];
            if ($upload_image) {
                $config['upload_path']          = './assets/img/profile/';
                $config['allowed_types']        = 'jpg|png|jpeg|JPG';
                $config['max_width']            = '2048';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            //$this->db->set('image', $upload_image);
            $this->db->where('nip', $nip);
            $this->db->set('alamat', $alamat);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile sudah diubah !</div>');
            redirect('user/profile');
        }
    }
}
