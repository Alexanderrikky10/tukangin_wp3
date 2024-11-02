<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_users');
        $this->load->model('Model_menu');
        $this->load->model('Model_project');
    }

    public function index()
    {
        # code...

    }
}

/* End of file: Transaksi.php */
