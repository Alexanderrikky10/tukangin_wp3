<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukangin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_users');
        $this->load->model('Model_services');
        $this->load->model('Model_project');
    }

    public function index()
    {
        redirect('tukangin/home');
    }

    public function home()
    {
        $data['title'] = 'Home';
        $data['services'] = $this->Model_services->getServices()->result_array();
        $data['project'] = $this->Model_project->getProject()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-hiro', $data);
        $this->load->view('template/v-footer');
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-about');
        $this->load->view('template/v-footer');
    }

    public function services()
    {
        $data['title'] = 'Services';
        $data['services'] = $this->Model_services->getServices()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-services');
        $this->load->view('template/v-footer');
    }

    public function project()
    {
        $data['title'] = 'Project';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['project'] = $this->Model_project->getProject()->result_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-project', $data);
        $this->load->view('template/v-footer');
    }
    public function blog()
    {
        $data['title'] = 'Blog';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-blog');
        $this->load->view('template/v-footer');
    }

    public function contact()
    {
        $data['title'] = 'Contact';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-contact');
        $this->load->view('template/v-footer');
    }
}
