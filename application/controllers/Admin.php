<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_users');
        $this->load->model('Model_menu');
        $this->load->model('Model_project');
        $this->load->model('Model_transaksi');
    }

    // public function index()
    // {
    //     # code...
    //     $data['menu'] = $this->Model_menu->menu()->result_array();
    //     $data['title'] = 'Dashboard';
    //     $data['transaksi'] = $this->Model_users->transaksi();
    //     $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     $this->load->view('admin/header_admin', $data);
    //     $this->load->view('admin/sidebar', $data);
    //     // $this->load->view('admin/v_admin', $data);
    //     $this->load->view('admin/main', $data);
    //     $this->load->view('admin/footer_admin');
    // }
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

        $data['construction'] = $this->Model_project->get_transaksi_by_jasa('Construction');
        $data['remodeling'] = $this->Model_project->get_transaksi_by_jasa('Remodeling');
        $data['design'] = $this->Model_project->get_transaksi_by_jasa('Design');
        $data['painting'] = $this->Model_project->get_transaksi_by_jasa('Painting & Finishing');
        $data['repairs'] = $this->Model_project->get_transaksi_by_jasa('Repairs');
        $data['decluttering'] = $this->Model_project->get_transaksi_by_jasa('Decluttering');

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


    public function metode()
    {
        $data['title'] = 'Metode Bayar';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['metode'] = $this->Model_transaksi->getmetode()->result_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/metode1', $data);
        $this->load->view('admin/footer_admin');
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
            'pekerja' => $this->input->post('pekerja'),
            'ttl_bayar' => $this->input->post('total_bayar'),
            'email' => $this->input->post('email'),
            'metode_bayar' => $this->input->post('m_bayar'),
            'nomor' => $this->input->post('nomor'),
            'img' => $this->input->post('image'),
            'tgl_transaksi' => $this->input->post('tgl'),
            'status' => 'dalam proses'
        ];

        // Simpan data transaksi ke tabel transaksi_selesai
        $this->Model_transaksi->simpanTransaksi($dataTransaksi);

        // Hapus data dari tabel transaksi
        $this->Model_transaksi->deleteData('transaksi', ['id' => $id_transaksi]);
        redirect(base_url() . 'admin');
    }
}

/* End of file: Admin.php */
