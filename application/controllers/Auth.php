<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # code...

        $data = [
            'title' => 'Login',
            'konten' => $this->load->view('auth/v_login', [], TRUE)
        ];
        $this->load->view('auth/login_template', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'konten' => $this->load->view('auth/v_register', [], TRUE)
        ];
        $this->load->view('auth/register_template', $data);
    }
}

/* End of file: Auth.php */
