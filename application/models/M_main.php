<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_main extends CI_Model
{


    // get data dokumen
    function model_getdatadokumen()
    {

        return $this->db->get('dokumen');
    }



    // proses tambah
    function model_prosestambah()
    {



        // file
        $file = "";

        $config['upload_path']  = './assets/files/';
        $config['allowed_types'] = 'jpeg|jpg|png|docx|doc|xls|xlsx|pdf';
        $config['max_size']     = 10000; // 10 mb 
        $config['file_name']    = 'FILE-' . uniqid(); // meruah nama file

        $this->load->library('upload', $config);


        if ($this->upload->do_upload('file')) {

            $file = $this->upload->data('file_name');
        } else {

            $html = '<div class="alert alert-danger" style="text-align: left">
                        <b>Pemberitahuan</b>
                        ' . $this->upload->display_errors() . '
                    </div>';

            // flashdata 
            $this->session->set_flashdata('pesan', $html);
            redirect(base_url('#proses'));
        }

        $data = array(

            'no_naskah' => $this->input->post('no_naskah'),
            'mitra'     => $this->input->post('mitra'),
            'judul'         => $this->input->post('judul'),
            'kepentingan'   =>  $this->input->post('kepentingan'),
            'file'  => $file
        );

        // insert
        $this->db->insert('dokumen', $data);


        $html = '<div class="alert alert-success" style="text-align: left">
                        <b>Pemberitahuan</b>
                        Pengajuan kerja sama berhasil dikirim, kami akan memproses pengajuan anda <br>
                        <small>Pembuatan ' . date('d F Y H.i A') . '</small>
                    </div>';

        // flashdata 
        $this->session->set_flashdata('pesan', $html);
        redirect(base_url('#proses'));
    }




    // perubahan
    function model_prosesperubahan($id_dokumen)
    {

        $start = $this->input->post('start');
        $end   = $this->input->post('end');


        if ($start) {

            if (strtotime($start) < strtotime($end)) {



                // file
                $file = "";

                $config['upload_path']  = './assets/files/';
                $config['allowed_types'] = 'jpeg|jpg|png|docx|doc|xls|xlsx|pdf';
                $config['max_size']     = 10000; // 10 mb 
                $config['file_name']    = 'ACC-' . uniqid(); // meruah nama file

                $this->load->library('upload', $config);


                if ($this->upload->do_upload('userfile')) {

                    $file = $this->upload->data('file_name');
                } else {

                    $html = '<div class="alert alert-danger" style="text-align: left">
                        <b>Pemberitahuan</b>
                        ' . $this->upload->display_errors() . '
                    </div>';

                    // flashdata 
                    $this->session->set_flashdata('pesan', $html);
                    redirect('managedoc/uploadpublik');
                }





                $data = array(

                    'bidang'    => $this->input->post('bidang'),
                    'dasarhukum1' => $this->input->post('hukum_1'),
                    'dasarhukum2' => $this->input->post('hukum_2'),
                    'dasarhukum3' => $this->input->post('hukum_3'),
                    'jenis'     => $this->input->post('jenis'),
                    'tanggalmulai'  => date('Y-m-d', strtotime($start)),
                    'tanggalakhir'  => date('Y-m-d', strtotime($end)),
                    'status_persetujuan'  => $this->input->post('status_pengajuan'),
                    'file_acc'  => $file
                );

                $this->db->where('id_dokumen', $id_dokumen)->update('dokumen', $data);

                $script = '<script>alert("Perubahan Berhasil")</script>';
                $this->session->set_flashdata('pesan', $script);

                redirect('managedoc/dokumen');
            } else {

                $script = '<script>alert("Masukkan tanggal akhir yang valid")</script>';
                $this->session->set_flashdata('pesan', $script);

                redirect('managedoc/dokumen');
            }
        } else {

            $script = '<script>alert("Tidak melakukan perubahan")</script>';
            $this->session->set_flashdata('pesan', $script);

            redirect('managedoc/dokumen');
        }


        // print_r($this->input->post());
    }
    function jumlah_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 2);

        return $this->db->get()->num_rows();
    }
}

    
    /* End of file M_main.php */
