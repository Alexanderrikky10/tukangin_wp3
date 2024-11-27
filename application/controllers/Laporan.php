<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # code...
        $this->load->library('dompdf_gen');

        $data['transaksi'] = $this->Model_transaksi->cetakTransaksi();

        $this->load->view('Laporan/laporan_transaksi', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //orientasi
        $html = $this->output->get_output();

        $this->load->library('Pdf');
        $this->pdf->setPaper($paper_size, $orientation);
        //Convert to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_transaksi.pdf", ['Attachment' => 0]);
        // nama file pdf yang dihasilkan
    }

    // cetak di dalam jasa melalui jasa yang si inginkan
    public function cetakTransaksiById($no_transaksi)
    {
        $this->load->library('dompdf_gen');

        $data['transaksi'] = $this->Model_transaksi->getTransaksiselesaiId($no_transaksi);

        if (!$data['transaksi']) {
            show_404();
        }

        $this->load->view('Laporan/laporan_transaksi_id_selesai', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //orientasi
        $html = $this->output->get_output();

        $this->load->library('Pdf');
        $this->pdf->setPaper($paper_size, $orientation);
        //Convert to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_transaksi_selesai" . $no_transaksi . ".pdf", ['Attachment' => 0]);
        // nama file pdf yang dihasilkan
    }

    public function cetakTestimoni()
    {
        $this->load->library('dompdf_gen');

        $data['testimoni'] = $this->Model_users->getTestimoni();
        if (!$data['testimoni']) {
            show_404();
        }

        $this->load->view('Laporan/laporan_testimoni', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //orientasi
        $html = $this->output->get_output();

        $this->load->library('Pdf');
        $this->pdf->setPaper($paper_size, $orientation);
        //Convert to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_testimoni.pdf", ['Attachment' => 0]);
        // nama file pdf yang dihasilkan
    }

    public function cetakuser()
    {
        $this->load->library('dompdf_gen');

        $data['user_list'] = $this->Model_users->getAllUsers();
        if (!$data['user_list']) {
            show_404();
        }

        $this->load->view('Laporan/user-data', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //orientasi
        $html = $this->output->get_output();

        $this->load->library('Pdf');
        $this->pdf->setPaper($paper_size, $orientation);
        //Convert to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("user-data.pdf", ['Attachment' => 0]);
        // nama file pdf yang dihasilkan
    }
}

/* End of file: Laporan.php */
