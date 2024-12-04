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

    public function simpanTransaksi($data = null)
    {
        $this->db->insert('transaksi', $data);
    }


    public function transaksiById($email)
    {
        // Melakukan JOIN antara tabel transaksi dan metode_bayar
        $this->db->select('transaksi.*, metode_bayar.m_bayar'); // Memilih kolom dari transaksi dan mengganti metode dengan m_bayar
        $this->db->from('transaksi');
        $this->db->join('metode_bayar', 'transaksi.metode = metode_bayar.id', 'left'); // Join dengan tabel metode_bayar berdasarkan id metode
        $this->db->where('transaksi.email', $email); // Mengambil transaksi berdasarkan email
        $query = $this->db->get(); // Menjalankan query
        return $query->result_array(); // Mengembalikan data dalam bentuk array
    }

    public function transaksiselesai($email)
    {
        // Melakukan JOIN antara tabel transaksi dan metode_bayar
        $this->db->select('transaksi_selesai.*, metode_bayar.m_bayar'); // Memilih kolom dari transaksi dan mengganti metode dengan m_bayar
        $this->db->from('transaksi_selesai');
        $this->db->join('metode_bayar', 'transaksi_selesai.metode_bayar = metode_bayar.id', 'left'); // Join dengan tabel metode_bayar berdasarkan id metode
        $this->db->where('transaksi_selesai.email', $email); // Mengambil transaksi berdasarkan email
        $query = $this->db->get(); // Menjalankan query
        return $query->result_array(); // Mengembalikan data dalam bentuk array
    }

    public function agtTransaksi($id_pesanan)
    {
        $this->db->select('transaksi.*, metode_bayar.m_bayar'); // Memilih kolom dari transaksi dan mengganti metode dengan m_bayar
        $this->db->from('transaksi');
        $this->db->join('metode_bayar', 'transaksi.metode = metode_bayar.id', 'left'); // Join dengan tabel metode_bayar berdasarkan id metode
        $this->db->where('transaksi.id', $id_pesanan); // Mengambil transaksi berdasarkan email
        $query = $this->db->get(); // Menjalankan query
        return $query->result_array();
    }

    public function updateProfile($email, $data)
    {
        $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }

    public function updateData($data, $where)
    {
        $this->db->update('user', $data, $where);
    }

    public function getJabatan()
    {
        return $this->db->get('jabatan')->result_array();
    }

    public function getBintang()
    {
        return $this->db->get('bintang')->result_array();
    }

    public function getJasa()
    {
        return $this->db->get('jasa')->result_array();
    }

    public function getTestimoni()
    {
        $this->db->select('testimoni.*,jabatan.jabatan');
        $this->db->from('testimoni');
        $this->db->join('jabatan', 'testimoni.jabatan = jabatan.id_jabatan', 'lift');
        $query = $query = $this->db->get('');
        return $query->result_array();
    }
    public function getAllUsers()
    {
        return $this->db->get('user')->result_array();
    }

    public function getCustomerCount()
    {
        $this->db->where('role_id', 2); // Role ID untuk customer
        $this->db->from('user');
        return $this->db->count_all_results(); // Mengembalikan jumlah baris
    }
}

/* End of file: Model_users.php */
