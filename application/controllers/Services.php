<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_services');
    }

    public function cekOut()
    {
        $data['title'] = 'Cek Out';
        $data['metode'] = $this->Model_service->getServices(['id' => $this->uri->segment(3)])->result_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-services', $data);
        $this->load->view('template/v-footer');
    }
}

/* End of file: Services.php */
