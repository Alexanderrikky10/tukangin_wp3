<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function Transaksi()
    {

        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[10]', [
            'required' => 'Email harus diisi',
            'min_length' => 'Email terlalu pendek'
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[10]', [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama terlalu pendek'
        ]);

        $this->form_validation->set_rules('metode', 'Metode Bayar', 'required', [
            'required' => 'Metode harus dipilih'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]', [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat terlalu pendek'
        ]);

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|min_length[8]', [
            'required' => 'Nomor harus diisi',
            'min_length' => 'Nomor terlalu pendek'
        ]);

        $config['upload_path'] = './assets/img/transaksi/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            redirect('tukangin/services');
        } else {
            // Cek apakah ada transaksi yang belum dikonfirmasi
            $existingTransaction = $this->Model_transaksi->cekTransaksiBelumDipindah($data['user']['email']);

            if ($existingTransaction) {
                // Tampilkan pesan error jika masih ada transaksi belum dikonfirmasi
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-message" role="alert">Pesanan sebelumnya belum dikonfirmasi. Harap selesaikan terlebih dahulu!</div>'
                );
                redirect('tukangin/services');
            } else {
                // Proses upload gambar
                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data();
                    $gambar = $image['file_name'];
                } else {
                    $gambar = '';
                }

                $data = [
                    'id' => $this->Model_transaksi->kodeOtomatis('transaksi', 'id'),
                    'name' => $this->input->post('name'),
                    'nama_jasa' => $this->input->post('nama_jasa'),
                    'jam' => $this->input->post('jam'),
                    'pekerja' => $this->input->post('pekerja'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'email' => $this->input->post('email'),
                    'metode' => $this->input->post('metode'),
                    'alamat' => $this->input->post('alamat'),
                    'nomor' => $this->input->post('nomor'),
                    'image' => $gambar,
                    'tgl' => time()
                ];
                $this->Model_users->simpanTransaksi($data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-message" role="alert">Jasa yang Anda pesan sedang diproses</div>'
                );
                redirect('tukangin/services');
            }
        }
    }
}

/* End of file: Services.php */
