<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_admin();
    }

    public function index()
    {
        # code...
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['title'] = 'Dashboard';
        $data['transaksi'] = $this->Model_users->transaksi();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/main', $data);
        $this->load->view('admin/footer_admin');
    }


    public function profile()
    {
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile';
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer_admin');
    }

    public function Jasa()
    {
        $data['title'] = 'Jasa';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/jasa', $data);
        $this->load->view('admin/footer_admin');
    }

    public function project()
    {
        $data['title'] = 'Project';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/project', $data);
        $this->load->view('admin/footer_admin');
    }


    public function testimoni()
    {
        $data['title'] = 'Testimoni';

        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/testimoni', $data);
        $this->load->view('admin/footer_admin');
    }


    public function metode()
    {
        $data['title'] = 'Metode Bayar';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['metode'] = $this->Model_transaksi->getmetode()->result_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/metode', $data);
        $this->load->view('admin/footer_admin');
    }

    public function metodebayar()
    {
        $data = [
            'm_bayar' =>  $this->input->post('m_bayar'),
            'rekening' => $this->input->post('rekening')
        ];

        $this->Model_transaksi->TambahMetode($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Metode pembayaran berhasil di tambahkan </div>');
        redirect('admin/metode');
    }

    public function editMetode()
    {

        $data = [
            'm_bayar' =>  $this->input->post('m_bayar'),
            'rekening' => $this->input->post('rekening')
        ];

        $this->Model_transaksi->updatePembayaran(['id' => $this->input->post('id')], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Metode pembayaran berhasil di ubah </div>');
        redirect('admin/metode');
    }

    public function hapuspembayaran()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->Model_transaksi->hapuspembayaran($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"> Metode Pembayaran Berhasil di hapus</div>');
        redirect('admin/metode');
    }



    public function transaksiAct()
    {
        $id_transaksi = $this->uri->segment(3);
        $tr = $this->db->query("SELECT * FROM transaksi WHERE id='$id_transaksi'")->row();

        $dataTransaksi = [
            'no_transaksi' => $id_transaksi,
            'nama_jasa' => $this->input->post('nama_jasa'),
            'ttl_jam' => $this->input->post('jam'),
            'name' => $this->input->post('name'),
            'pekerja' => $this->input->post('pekerja'),
            'ttl_bayar' => $this->input->post('total_bayar'),
            'email' => $this->input->post('email'),
            'metode_bayar' => $this->input->post('m_bayar'),
            'alamat' => $this->input->post('alamat'),
            'nomor' => $this->input->post('nomor'),
            'img' => $this->input->post('image'),
            'tgl_transaksi' => $this->input->post('tgl'),
            'status' => 'selesai'
        ];

        // Simpan data transaksi ke tabel transaksi_selesai
        $this->Model_transaksi->simpanTransaksi($dataTransaksi);

        // Hapus data dari tabel transaksi
        $this->Model_transaksi->deleteData('transaksi', ['id' => $id_transaksi]);
        redirect(base_url() . 'admin');
    }

    public function detailPesanan()
    {
        $id_pesanan = $this->uri->segment(3);
        $data['title'] = 'Detail Pesana';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_menu->menu()->result_array();

        $data['agt_transaksi'] = $this->Model_users->agtTransaksi($id_pesanan);

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/transaksi_detail', $data);
        $this->load->view('admin/footer_admin');
    }

    public function TransaksiSelesai()
    {
        $data['title'] = 'Transaksi selesai';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['construction'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Construction');
        $data['remodeling'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Remodeling');
        $data['design'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Design');
        $data['painting'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Painting & Finishing');
        $data['repairs'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Repairs');
        $data['decluttering'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Decluttering');

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/transaksiselesai', $data);
        $this->load->view('admin/footer_admin');
    }
}

/* End of file: Admin.php */
