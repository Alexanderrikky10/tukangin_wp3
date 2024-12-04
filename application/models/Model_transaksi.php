<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }


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

        $kodeMax = str_pad(
            $kode,
            3,
            "0",
            STR_PAD_LEFT
        );
        // Mengubah format menjadi HHMMSS + kode
        $kodeJadi = date('His') . $kodeMax;

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
    public function TambahMetode($data = null)
    {
        $this->db->insert('metode_bayar', $data);
    }

    public function cetakTransaksi()
    {

        $this->db->select('transaksi_selesai.*, metode_bayar.m_bayar');
        $this->db->from('transaksi_selesai');
        $this->db->join('metode_bayar', 'transaksi_selesai.metode_bayar = metode_bayar.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_transaksi_by_TransaksiSelesai($jasa)
    {
        $this->db->select('transaksi_selesai.*,  metode_bayar.m_bayar');
        $this->db->from('transaksi_selesai');
        $this->db->join('metode_bayar', 'transaksi_selesai.metode_bayar = metode_bayar.id',  'left');
        $this->db->where('nama_jasa', $jasa);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cekTransaksiBelumDipindah($email)
    {
        // Cek apakah ada data transaksi berdasarkan email pengguna
        $this->db->where('email', $email);
        $query = $this->db->get('transaksi'); // Tabel transaksi utama

        // Jika ada data, berarti masih ada pesanan yang belum dikonfirmasi
        return $query->row_array();
    }
    public function hapusTransaksi($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('transaksi'); // Ganti 'transaksi' dengan nama tabel Anda
    }

    public function getTransaksiById($id)
    {
        $this->db->select('transaksi.*, metode_bayar.m_bayar');
        $this->db->from('transaksi');
        $this->db->join('metode_bayar', 'transaksi.metode = metode_bayar.id', 'left'); // 'left' memastikan hasil tetap ada meskipun metode tidak cocok
        $this->db->where('transaksi.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getTransaksiselesaiId($no_transaksi)
    {
        $this->db->select('transaksi_selesai.*, metode_bayar.m_bayar');
        $this->db->from('transaksi_selesai');
        $this->db->join('metode_bayar', 'transaksi_selesai.metode_bayar = metode_bayar.id', 'left'); // 'left' memastikan hasil tetap ada meskipun metode tidak cocok
        $this->db->where('transaksi_selesai.no_transaksi', $no_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_jasa($data)
    {
        $this->db->insert('jasa', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('jasa', ['id' => $id])->row_array();
    }

    public function updateJasa($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('jasa', $data);
    }

    public function deleteJasa($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('jasa');
    }

    public function getTotalPesananSelesai()
    {
        $this->db->where('status', 'selesai');
        return $this->db->count_all_results('transaksi_selesai');
    }

    public function getTotalRevenue()
    {
        $this->db->select_sum('ttl_bayar');
        $this->db->where('status', 'selesai');
        $query = $this->db->get('transaksi_selesai');
        return $query->row()->ttl_bayar; // Mengembalikan hasil penjumlahan
    }
}

/* End of file: Model_transaksi.php */
