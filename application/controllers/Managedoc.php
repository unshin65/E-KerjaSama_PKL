
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managedoc extends CI_Controller
{

    // constructor
    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_main');
    }

    // fungsi untuk ke view upload dokumen publik
    public function dokumen()
    {
        $data['title'] = 'Dokumen';

        // @dwinuray : tidak direkomendasikan mengelola query di controller scr langsung
        $data['user'] = $this->db->get_where(
            'user',
            ['nip' => $this->session->userdata('nip')]
        )->row_array();



        $data['dokumen'] = $this->M_main->model_getdatadokumen();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('managedoc/dokumen', $data);
        $this->load->view('templates/footer');
    }

    // simpan perubahan
    function simpanperubahan($id_dokumen)
    {

        $this->M_main->model_prosesperubahan($id_dokumen);
    }

    // export pdf
    function exportPDF()
    {

        // header attribute
        $name_file = 'LAPORAN MITRA ' . rand(1, 999999) . '-' . date('Y-m-d');
        $pdf = $this->header_attr($name_file);

        // // add a page
        $pdf->AddPage('P', 'A4');


        // Sub header
        $html = '<table border="0">
                <tr>
                    <td align="center"><h2>LAPORAN MITRA KERJASAMA</h2></td>
                </tr>
                <tr><td align="center">Pelaporan Mitra bag-kerjasama@malangkab.go.id</td></tr>


            </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);




        // // table body
        $table_body = "";
        $dokumen = $this->M_main->model_getdatadokumen();

        $no = 1;
        foreach ($dokumen->result_array() as $row) :


            $current = strtotime(date('Y-m-d'));
            $status = "Belum ditentukan";
            $tanggal = "-";


            if ($row['tanggalmulai']) {

                $start = strtotime($row['tanggalmulai']);
                $end   = strtotime($row['tanggalakhir']);

                $tanggal = date('d-m-Y', $start) . ' - ' . date('d-m-Y', $end);

                if (($start <= $current) && ($end >= $current)) {

                    // cek apabila tinggal sedikit
                    if (strtotime('-3 day', $end) <= $current) {

                        $status = "Hampir Habis";
                    } else {

                        $status = "Berlaku";
                    }
                } else {

                    $status = "Habis";
                }
            }


            // isi tabel 
            $table_body .= '<tr>
                <td>' . $no . '</td>
                <td>' . $row['mitra'] . '</td>
                <td>' . $row['no_naskah'] . '</td>
                <td>' . $row['judul'] . '</td>
                <td>' . $tanggal . '</td>
                <td>' . $status . '</td>
            </tr>';

            $no++;
        endforeach;
        // header table
        $table = '
                <table border="1" width="100%" cellpadding="6">
                    <tr>
                        <th width="5%" align="center"><b>No</b></th>
                        <th width="23%" align="center"><b>Mitra</b></th>
                        <th width="15%" align="center"><b>Naskah</b></th>
                        <th width="20%" align="center"><b>Judul</b></th>
                        <th width="23%" align="center"><b>Tanggal</b></th>
                        <th width="14%" align="center"><b>Status</b></th>
                    </tr>
                    ' . $table_body . '
                </table>';

        $pdf->writeHTML($table, true, false, true, false, '');



        // $pdf->Ln(10, false);

        // output
        ob_end_clean();
        $pdf->Output($name_file . '.pdf', 'I');
    }




    // header attr
    function header_attr($title)
    {

        // create new PDF document
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dwi Nur Cahyo');
        $pdf->SetTitle($title);
        // $pdf->SetSubject('TCPDF Tutorial');
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // remove default header/footer
        $pdf->setPrintHeader(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 10);

        return $pdf;
    }


    // fungsi untuk ke view upload dokumen publik

}
