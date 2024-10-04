<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_users');
        $this->load->model('Model_menu');
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
        $this->load->view('admin/v_admin', $data);
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
}

/* End of file: Admin.php */
