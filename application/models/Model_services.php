<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_services extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    # code...

    public function getServices()
    {
        return $this->db->get('jasa');
    }
}

/* End of file: Model_services.php */
