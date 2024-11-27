<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukangin extends CI_Controller
{
    private $user_data;

    public function __construct()
    {
        parent::__construct();
        // Memeriksa apakah user sudah login
        if ($this->session->userdata('email')) {
            $this->user_data = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        } else {
            $this->user_data = null;
        }
    }

    public function index()
    {
        redirect('tukangin/home');
    }

    private function load_template($view, $data = [])
    {
        // Menambahkan data user ke setiap halaman
        $data['user'] = $this->user_data;
        $this->load->view('template/v-header', $data);
        $this->load->view($view, $data);
        $this->load->view('template/v-footer');
    }

    public function home()
    {
        $data['title'] = 'Home';
        $data['services'] = $this->Model_services->getServices()->result_array();
        $data['project'] = $this->Model_project->getProject()->result_array();
        $data['test'] = $this->Model_test->getTestimoni();
        $this->load_template('template/v-hiro', $data);
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['test'] = $this->Model_test->getTestimoni();
        $this->load_template('template/v-about', $data);
    }

    public function services()
    {
        $data['title'] = 'Services';
        $data['metode'] = $this->Model_services->metodeBayar()->result_array();
        $data['services'] = $this->Model_services->getServices()->result_array();
        $data['test'] = $this->Model_test->getTestimoni();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load_template('template/v-services', $data);
    }

    public function project()
    {
        $data['title'] = 'Project';
        $data['project'] = $this->Model_project->getProject()->result_array();
        $this->load_template('template/v-project', $data);
    }

    public function blog()
    {
        $data['title'] = 'Blog';
        $this->load_template('template/v-blog', $data);
    }

    public function contact()
    {
        $data['title'] = 'Contact';
        $this->load_template('template/v-contact', $data);
    }
}
