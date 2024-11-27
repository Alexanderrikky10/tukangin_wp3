<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_test extends CI_Model
{

    protected $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    // tampilan untuk admin 
    public function getTest()
    {
        // Menentukan tabel dan join
        $this->db->select('testimoni.*,jabatan.jabatan');
        $this->db->from('testimoni');
        $this->db->join('jabatan', 'testimoni.jabatan = jabatan.id_jabatan', 'lift');
        $query = $this->db->get();
        return $query->result_array();
    }

    // tampilan untuk admin 
    public function insertTestimoni($data)
    {
        return $this->db->insert('testimoni', $data); // Pastikan $data sesuai dengan kolom tabel Anda
    }


    // tampilan untuk user
    public function getTestimoni()
    {
        // Menentukan tabel dan join
        $this->db->select('
            t.id_testimoni, 
            t.name_user, 
            j.jabatan AS jabatan_user, 
            t.img, 
            b.jumlah_bintang AS jumlah_bintang, 
            t.komentar
        ');
        $this->db->from('testimoni t');
        $this->db->join('jabatan j', 't.jabatan = j.id_jabatan', 'inner'); // Join dengan tabel jabatan
        $this->db->join('bintang b', 't.bintang = b.id_bintang', 'inner'); // Join dengan tabel bintang
        $query = $this->db->get(); // Mengembalikan hasil query
        return $query->result_array();
    }
}

/* End of file: Model_test.php */
