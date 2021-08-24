<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {

        parent::__construct();

        // load model
        $this->load->model('M_main');
    }

    public function index()
    {

        $this->load->view('templates/header_main');
        $this->load->view('main/V_halaman_utama');
        $this->load->view('templates/footer_main');
    }

    // awal kerjasama
    function awalkerjasama()
    {

        $this->M_main->model_prosestambah();
    }






    // tampil daftar kerjasama
    function daftarkerjasama()
    {

        $data['dokumen'] = $this->M_main->model_getdatadokumen();

        $this->load->view('templates/header_main');
        $this->load->view('main/V_halaman_kerjasama', $data);
        $this->load->view('templates/footer_main');
    }
}
    
    /* End of file Main.php */
