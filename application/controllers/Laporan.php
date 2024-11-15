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
    public function cetakTransaksiById()
    {
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
        $this->pdf->stream("laporan_transaksi_selesai.pdf", ['Attachment' => 0]);
        // nama file pdf yang dihasilkan
    }

    public function cetakTransaksiProses()
    {
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
        $this->pdf->stream("laporan_transaksi_selesai.pdf", ['Attachment' => 0]);
        // nama file pdf yang dihasilkan
    }
}

/* End of file: Laporan.php */
