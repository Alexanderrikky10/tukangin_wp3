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
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-hiro');
        $this->load->view('template/v-footer');
    }

    public function about()
    {
        $data['title'] = 'About';
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-about');
        $this->load->view('template/v-footer');
    }

    public function services()
    {
        $data['title'] = 'Services';
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-services');
        $this->load->view('template/v-footer');
    }

    public function project()
    {
        $data['title'] = 'Project';
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-project');
        $this->load->view('template/v-footer');
    }
    public function blog()
    {
        $data['title'] = 'Blog';
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-blog');
        $this->load->view('template/v-footer');
    }

    public function contact()
    {
        $data['title'] = 'Contact';
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-contact');
        $this->load->view('template/v-footer');
    }
}
