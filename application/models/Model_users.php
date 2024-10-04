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

    public function transaksi()
    {
        $this->db->select('transaksi.*, metode_bayar.m_bayar');
        $this->db->from('transaksi');
        $this->db->join('metode_bayar', 'transaksi.metode = metode_bayar.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file: Model_users.php */
