<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_users extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    # code...
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }
}

/* End of file: Model_users.php */
