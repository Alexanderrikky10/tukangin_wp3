<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    # code...
    public function kodeOtomatis($table, $key)
    {
        $this->db->select('right(' . $key . ', 3) as kode', false);
        $this->db->order_by($key, 'desc');
        $this->db->limit(1);
        $query = $this->db->get($table);
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodeMax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodeJadi = date('dmY') . $kodeMax;

        return $kodeJadi;
    }

    public function simpanTransaksi($data)
    {
        $this->db->insert('transaksi_selesai', $data);
    }

    public function deleteData($table, $where)
    {
        $this->db->delete($table, $where);
    }

    public function getmetode()
    {
        return $this->db->get('metode_bayar');
    }
    public function updatePembayaran($where = null, $data = null)
    {
        $this->db->update('metode_bayar', $data, $where);
    }

    public function hapuspembayaran($where = null)
    {
        $this->db->delete('metode_bayar', $where);
    }
}

/* End of file: Model_transaksi.php */
