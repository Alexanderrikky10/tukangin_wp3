<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()

    {
        # code...
        $data['title'] = 'Error 404';
        $this->load->view('user/error');
    }
}

/* End of file: Error.php */
