<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $email_user = $data['user']['email'];
        $data['transaksi'] = $this->Model_users->transaksiById($email_user);
        $data['transaksiSelesai'] = $this->Model_users->transaksiselesai($email_user);
        $data['jabatan'] = $this->Model_users->getJabatan();
        $data['bintang'] = $this->Model_users->getBintang();


        $this->load->view('template/v-header', $data);
        $this->load->view('template/v-profile', $data);
        // $this->load->view('template/test', $data);
        $this->load->view('template/v-footer');
    }

    public function changeProfile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        // Validasi form
        $this->form_validation->set_rules('fullName', 'Nama Lengkap', 'required|min_length[2]', [
            'required' => 'Nama harus diisi.',
            'min_length' => 'Nama terlalu pendek.'
        ]);
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|min_length[10]', [
            'required' => 'Nomor telepon harus diisi.',
            'min_length' => 'Nomor telepon terlalu pendek.'
        ]);
        $this->form_validation->set_rules('twitter', 'Twitter', 'required|min_length[2]', [
            'required' => 'Akun Twitter harus diisi.',
            'min_length' => 'Akun Twitter terlalu pendek.'
        ]);
        $this->form_validation->set_rules('facebook', 'Facebook', 'required|min_length[2]', [
            'required' => 'Akun Facebook harus diisi.',
            'min_length' => 'Akun Facebook terlalu pendek.'
        ]);
        $this->form_validation->set_rules('instagram', 'Instagram', 'required|min_length[2]', [
            'required' => 'Akun Instagram harus diisi.',
            'min_length' => 'Akun Instagram terlalu pendek.'
        ]);
        $this->form_validation->set_rules('linkedin', 'LinkedIn', 'required|min_length[2]', [
            'required' => 'Akun LinkedIn harus diisi.',
            'min_length' => 'Akun LinkedIn terlalu pendek.'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Gagal memperbarui profil. Pastikan semua data terisi dengan benar.</div>');
            redirect('user/profile');
        } else {
            // Ambil data dari form
            $name = $this->input->post('fullName', true);
            $phone = $this->input->post('phone', true);
            $twitter = $this->input->post('twitter', true);
            $facebook = $this->input->post('facebook', true);
            $instagram = $this->input->post('instagram', true);
            $linkedin = $this->input->post('linkedin', true);

            // Proses upload gambar jika ada
            $upload_image = $_FILES['profileImage']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3000';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profileImage')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->Model_users->updateProfile($data['user']['email'], ['image' => $new_image]);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Gagal mengunggah gambar profil.</div>');
                    redirect('user/profile');
                }
            }

            // Update data user
            $update_data = [
                'name' => $name,
                'tlp' => $phone,
                'x_app' => $twitter,
                'facebook' => $facebook,
                'instagram' => $instagram,
                'linkedin' => $linkedin
            ];

            $this->Model_users->updateProfile($data['user']['email'], $update_data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Profil berhasil diperbarui</div>');
            redirect('user/profile');
        }
    }

    public function removeImage()
    {
        // Ambil data user berdasarkan email dari sesi
        $email = $this->session->userdata('email');
        $user = $this->Model_users->cekData(['email' => $email])->row_array();

        if ($user) {
            $old_image = $user['image'];

            // Cek apakah gambar lama bukan gambar default
            if ($old_image != 'default.jpg') {
                $path = FCPATH . 'assets/img/profile/' . $old_image;

                // Hapus gambar dari server jika file ada
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Update database, set image ke 'default.jpg'
            $this->Model_users->updateData(['image' => 'default.jpg'], ['email' => $email]);

            // Set pesan berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Gambar berhasil dihapus!</div>');
        } else {
            // Set pesan gagal jika user tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Gagal menghapus gambar! Data pengguna tidak ditemukan.</div>');
        }

        // Redirect kembali ke halaman profile
        redirect('user/profile');
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
                    redirect('user/profile');
                } else
                    // password benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">password berhasil di ubah</div>');
                redirect('user/profile');
            }
        }
    }

    public function validate_select($value)
    {
        if ($value == 'Pilih Jabatan' || $value == 'Pilih jumlah bintang') {
            $this->form_validation->set_message('validate_select', '{field} harus dipilih.');
            return false;
        }
        return true;
    }


    public function tambahTestimoni()
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'callback_validate_select');
        $this->form_validation->set_rules('bintang', 'Bintang', 'callback_validate_select');

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Gagal Menambahkan testimoni</div>');
            redirect('user/profile'); // Redirect jika validasi gagal
        } else {
            // Data yang akan dimasukkan ke database
            $data = [
                'name_user' => $this->input->post('name'),
                'jabatan' => $this->input->post('jabatan'),
                'bintang' => $this->input->post('bintang'),
                'komentar' => $this->input->post('deskripsi'),
                'img' => $this->input->post('img') // Pastikan ID transaksi dikirim dari form
            ];

            // Simpan data menggunakan model
            if ($this->Model_test->insertTestimoni($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Testimoni berhasil ditambahkan.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Testimoni gagal di tambahkan.</div>');
            }
            redirect('user/profile'); // Redirect ke halaman awal
        }
    }


    public function cetakPdf($id)
    {
        // Load library dan model
        $this->load->library('dompdf_gen');
        // Ambil data transaksi berdasarkan ID
        $data['transaksi'] = $this->Model_transaksi->getTransaksiById($id);

        // Jika transaksi tidak ditemukan
        if (!$data['transaksi']) {
            show_404();
        }

        // Load view untuk PDF
        $this->load->view('laporan/bukti_pembayaran', $data);

        // Atur ukuran kertas dan orientasi
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //orientasi
        $html = $this->output->get_output();

        $this->load->library('Pdf');
        $this->pdf->setPaper($paper_size, $orientation);
        //Convert to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        // Output file ke browser
        $this->pdf->stream("bukti_pembayaran_" . $id . ".pdf", array("Attachment" => 0));
    }
}

/* End of file: User.php */
