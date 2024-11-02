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

    // public function get_transaksi_by_jasa($jasa)
    // {
    //     $this->db->select('*');
    //     $this->db->from('transaksi');
    //     $this->db->where('nama_jasa', $jasa);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    public function get_transaksi_by_jasa($jasa)
    {
        $this->db->select('transaksi.*,  metode_bayar.m_bayar');
        $this->db->from('transaksi');
        $this->db->join('metode_bayar', 'transaksi.metode = metode_bayar.id',  'left');
        $this->db->where('nama_jasa', $jasa);
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file: Model_Project.php */
