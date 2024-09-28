<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_test extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    # code...
    public function getTest()
    {
        return $this->db->get('testimoni');
    }
}

/* End of file: Model_test.php */
