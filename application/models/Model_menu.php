<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_menu extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }
    public function menu()
    {
        return $this->db->get('sub_menu_admin');
    }
    # code...

}

/* End of file: Model_menu.php */
