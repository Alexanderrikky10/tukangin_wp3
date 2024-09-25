<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Project extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    # code...
    public function getProject()
    {
        return $this->db->get('project');
    }
}

/* End of file: Model_Project.php */
