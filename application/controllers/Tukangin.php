<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukangin extends CI_Controller
{

    public function index()
    {
        redirect('tukangin/home');
    }

    public function home()
    {
        $data['title'] = 'Home';
        $this->load->view('template/v-header');
        $this->load->view('template/v-hiro');
        $this->load->view('template/v-footer');
    }

    public function about()
    {
        $data['title'] = 'About';
        $this->load->view('template/v-header');
        $this->load->view('template/v-about');
        $this->load->view('template/v-footer');
    }

    public function services()
    {
        $this->load->view('template/v-header');
        $this->load->view('template/v-services');
        $this->load->view('template/v-footer');
    }

    public function project()
    {
        $this->load->view('template/v-header');
        $this->load->view('template/v-project');
        $this->load->view('template/v-footer');
    }
    public function blog()
    {
        $this->load->view('template/v-header');
        $this->load->view('template/v-blog');
        $this->load->view('template/v-footer');
    }

    public function contact()
    {
        $this->load->view('template/v-header');
        $this->load->view('template/v-contact');
        $this->load->view('template/v-footer');
    }
}
