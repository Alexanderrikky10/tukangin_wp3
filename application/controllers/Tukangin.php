<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukangin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_users');
        $this->load->model('Model_services');
        $this->load->model('Model_project');
        $this->load->model('Model_test');
        $this->load->model('Model_transaksi');
    }

    public function index()
    {
        redirect('tukangin/home');
    }

    public function home()
    {
        $data['title'] = 'Home';
        $data['services'] = $this->Model_services->getServices()->result_array();
        $data['project'] = $this->Model_project->getProject()->result_array();
        $data['test'] = $this->Model_test->getTest()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-hiro', $data);
        $this->load->view('template/v-footer');
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-about');
        $this->load->view('template/v-footer');
    }

    public function services()
    {
        $data['title'] = 'Services';
        $data['metode'] = $this->Model_services->metodeBayar()->result_array();
        $data['services'] = $this->Model_services->getServices()->result_array();
        $data['test'] = $this->Model_test->getTest()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('email', 'Email', 'required|min_length[10]', [
            'required' => 'email harus di isi',
            'min_length' => 'email terlalu pendek'
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[10]', [
            'required' => 'nama harus di isi',
            'min_length' => 'nama terlalu pendek'
        ]);

        $this->form_validation->set_rules('metode', 'Metode Bayar', 'required', [
            'required' => 'metode harus di pilih',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]', [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat terlalu pendek'
        ]);

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|min_length[12]', [
            'required' => 'Nomor harus diisi',
            'min_length' => 'nomor terlalu pendek'
        ]);

        $config['upload_path'] = './assets/img/transaksi/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v-header', $data);
            $this->load->view('template/v-services', $data);
            $this->load->view('template/v-footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            // $tgl = date('Y-m-d');

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
                'tgl' => date('Y-m-d H:m:s')

            ];
            $this->Model_users->simpanTransaksi($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Jasa yang Anda pesan sedang di proses</div>');
            redirect('tukangin/services');
        }
    }

    public function project()
    {
        $data['title'] = 'Project';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['project'] = $this->Model_project->getProject()->result_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-project', $data);
        $this->load->view('template/v-footer');
    }
    public function blog()
    {
        $data['title'] = 'Blog';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-blog');
        $this->load->view('template/v-footer');
    }

    public function contact()
    {
        $data['title'] = 'Contact';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-contact');
        $this->load->view('template/v-footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $email_user = $data['user']['email'];
        $data['transaksi'] = $this->Model_users->transaksiById($email_user);
        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-profile', $data);
        $this->load->view('template/v-footer');
    }

    public function changepassword()
    {
        $data['title'] = 'Change password';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/v-header', $data);
            $this->load->view('template/v-profile', $data);
            $this->load->view('template/v-footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Password yang anda masukan salah </div>');
                redirect('tukangin/profile');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Password tidak boleh sama dengan password lama</div>');
                    redirect('tukangin/profile');
                } else
                    // password benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">password berhasil di ubah</div>');
                redirect('tukangin/profile');
            }
        }
    }
}
