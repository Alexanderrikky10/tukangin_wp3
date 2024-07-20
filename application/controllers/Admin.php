<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # code...
        $this->load->view('admin/v_admin');
    }
}

/* End of file: Admin.php */
