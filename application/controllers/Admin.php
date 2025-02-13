<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_admin();
    }

    public function index()
    {
        # code...
        $data['title'] = 'Dashboard';
        $data['total_selesai'] = $this->Model_transaksi->getTotalPesananSelesai();
        $data['total_revenue'] = $this->Model_transaksi->getTotalRevenue();
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['transaksi'] = $this->Model_users->transaksi();
        $data['total_customers'] = $this->Model_users->getCustomerCount();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/main', $data);
        $this->load->view('admin/footer_admin');
    }

    public function hapusTransaksi($id)
    {
        // Pastikan ID diterima
        if (!$id) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">ID Transaksi tidak valid.</div>');
            redirect('admin');
        }
        // Hapus data melalui model
        if ($this->Model_transaksi->deleteTransaksi($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-message" role="alert">Transaksi berhasil dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-message" role="alert">Gagal menghapus Transaksi. Silakan coba lagi.</div>');
        }

        // Kembali ke halaman admin
        redirect('admin');
    }

    public function profile()
    {
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile';
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer_admin');
    }

    public function Jasa()
    {
        $data['title'] = 'Jasa';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['jasa'] = $this->Model_users->getJasa();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/jasa', $data);
        $this->load->view('admin/footer_admin');
    }

    public function tambahJasa()
    {
        $config['upload_path']          = './assets/img/jasa/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error upload (misal, tampilkan pesan error)
            $this->session->set_flashdata('error', $error['error']);
            redirect('admin/tambahJasa');
        } else {
            $data = array(
                'icon' => $this->input->post('icon'),
                'title' => $this->input->post('title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'img' => $this->upload->data('file_name')
            );

            $this->Model_transaksi->tambah_jasa($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Data jasa berhasil ditambahkan.</div>');
            redirect('admin/jasa');
        }
    }

    public function editJasa($id)
    {
        $jasa = $this->Model_transaksi->getById($id);

        if ($jasa) {
            $data = [
                'icon' => $this->input->post('icon'),
                'title' => $this->input->post('title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
            ];

            // Handle file upload
            if (!empty($_FILES['img']['name'])) {
                $config['upload_path'] = './assets/img/jasa/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = time() . '_' . $_FILES['img']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('img')) {
                    $data['img'] = $this->upload->data('file_name');

                    // Hapus gambar lama jika ada
                    if ($jasa['img'] && file_exists('./assets/img/jasa/' . $jasa['img'])) {
                        unlink('./assets/img/jasa/' . $jasa['img']);
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin');
                }
            }

            $this->Model_transaksi->updateJasa($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Data jasa berhasil diperbarui.</div>');
        } else {
            $this->session->set_flashdata('error', '.');
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Jasa tidak ditemukan.</div>');
        }

        redirect('admin/jasa');
    }


    public function jasaHapus($id)
    {
        $jasa = $this->Model_transaksi->getById($id);

        if ($jasa) {
            // Hapus file gambar jika ada
            if ($jasa['img'] && file_exists('./assets/img/jasa/' . $jasa['img'])) {
                unlink('./assets/img/jasa/' . $jasa['img']);
            }

            // Hapus data dari database
            $this->Model_transaksi->deleteJasa($id);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Data jasa berhasil dihapus.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Data jasa tidak ditemukan.</div>');
        }

        redirect('admin/jasa'); // Redirect kembali ke halaman admin
    }

    public function project()
    {
        $data['title'] = 'Project';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['projects'] = $this->Model_project->getProject()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/project', $data);
        $this->load->view('admin/footer_admin');
    }

    public function updateProject()
    {
        // Ambil data dari form
        $id_project = $this->input->post('id_project');
        $data = [
            'kategori_project' => $this->input->post('kategori_project'),
            'title_project' => $this->input->post('title_project'),
            'desk_project' => $this->input->post('desk_project'),
        ];

        // Proses upload gambar jika ada
        if (!empty($_FILES['img']['name'])) {
            $config['upload_path'] = './assets/img/projects/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // Maksimal 2MB
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img')) {
                $data['img'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('project');
            }
        }

        // Update data ke database
        $this->Model_project->update_project($id_project, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Data proyek berhasil diperbarui.</div>');
        redirect('admin/project');
    }

    public function tambahProject()
    {
        $data['title'] = 'Tambah Proyek Baru';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/project-tambah', $data);
        $this->load->view('admin/footer_admin');
    }

    public function saveProject()
    {
        $config['upload_path'] = './assets/img/projects/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img')) {
            $img = $this->upload->data('file_name');
            $data = [
                'kategori_project' => $this->input->post('kategori_project'),
                'title_project' => $this->input->post('title_project'),
                'desk_project' => $this->input->post('desk_project'),
                'img' => $img
            ];
            $this->Model_project->saveProject($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Proyek berhasil ditambahkan!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Gagal mengunggah gambar!</div>');
        }

        redirect('admin/project');
    }

    public function deleteProject($id_project)
    {
        // Pastikan ID diterima
        if (!$id_project) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">ID proyek tidak valid.</div>');
            redirect('admin');
        }

        // Hapus data melalui model
        if ($this->Model_project->deleteProject($id_project)) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-message" role="alert">Proyek berhasil dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-message" role="alert">Gagal menghapus proyek. Silakan coba lagi.</div>');
        }

        // Kembali ke halaman admin
        redirect('admin/project');
    }



    public function testimoni()
    {
        $data['title'] = 'Testimoni';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['testimoni'] = $this->Model_test->getTest();


        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/testimoni', $data);
        $this->load->view('admin/footer_admin');
    }



    public function metode()
    {
        $data['title'] = 'Metode Bayar';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['metode'] = $this->Model_transaksi->getmetode()->result_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/metode', $data);
        $this->load->view('admin/footer_admin');
    }

    public function metodebayar()
    {
        $data = [
            'm_bayar' =>  $this->input->post('m_bayar'),
            'rekening' => $this->input->post('rekening')
        ];

        $this->Model_transaksi->TambahMetode($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Metode pembayaran berhasil di tambahkan </div>');
        redirect('admin/metode');
    }

    public function editMetode()
    {

        $data = [
            'm_bayar' =>  $this->input->post('m_bayar'),
            'rekening' => $this->input->post('rekening')
        ];

        $this->Model_transaksi->updatePembayaran(['id' => $this->input->post('id')], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Metode pembayaran berhasil di ubah </div>');
        redirect('admin/metode');
    }

    public function hapuspembayaran()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->Model_transaksi->hapuspembayaran($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"> Metode Pembayaran Berhasil di hapus</div>');
        redirect('admin/metode');
    }



    public function transaksiAct()
    {
        $id_transaksi = $this->uri->segment(3);
        $tr = $this->db->query("SELECT * FROM transaksi WHERE id='$id_transaksi'")->row();

        $dataTransaksi = [
            'no_transaksi' => $id_transaksi,
            'nama_jasa' => $this->input->post('nama_jasa'),
            'ttl_jam' => $this->input->post('jam'),
            'name' => $this->input->post('name'),
            'pekerja' => $this->input->post('pekerja'),
            'ttl_bayar' => $this->input->post('total_bayar'),
            'email' => $this->input->post('email'),
            'metode_bayar' => $this->input->post('m_bayar'),
            'alamat' => $this->input->post('alamat'),
            'nomor' => $this->input->post('nomor'),
            'img' => $this->input->post('image'),
            'tgl_transaksi' => $this->input->post('tgl'),
            'status' => 'selesai'
        ];

        // Simpan data transaksi ke tabel transaksi_selesai
        $this->Model_transaksi->simpanTransaksi($dataTransaksi);

        // Hapus data dari tabel transaksi
        $this->Model_transaksi->deleteData('transaksi', ['id' => $id_transaksi]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">pesanan telah di konfirmasi.</div>');
        redirect(base_url() . 'admin');
    }

    public function detailPesanan()
    {
        $id_pesanan = $this->uri->segment(3);
        $data['title'] = 'Detail Pesana';
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_menu->menu()->result_array();

        $data['agt_transaksi'] = $this->Model_users->agtTransaksi($id_pesanan);

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/transaksi_detail', $data);
        $this->load->view('admin/footer_admin');
    }

    public function TransaksiSelesai()
    {
        $data['title'] = 'Transaksi selesai';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['construction'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Construction');
        $data['remodeling'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Remodeling');
        $data['design'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Design');
        $data['painting'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Painting & Finishing');
        $data['repairs'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Repairs');
        $data['decluttering'] = $this->Model_transaksi->get_transaksi_by_TransaksiSelesai('Decluttering');

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/transaksiselesai', $data);
        $this->load->view('admin/footer_admin');
    }

    public function dataUser()
    {
        $data['title'] = 'Data User';
        $data['menu'] = $this->Model_menu->menu()->result_array();
        $data['user'] = $this->Model_users->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['user_list'] = $this->db->get('user')->result_array();

        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/data-user', $data);
        $this->load->view('admin/footer_admin');
    }

    public function updateStatus()
    {
        $id = $this->input->post('id');
        $is_active = $this->input->post('is_active') ? 1 : 0; // Jika checkbox tidak dicentang, nilai tidak akan dikirimkan oleh form

        $this->db->where('id', $id);
        $this->db->update('user', ['is_active' => $is_active]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Status berhasil diperbarui</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Terjadi kesalahan, silakan coba lagi.</div>');
        }

        redirect('admin/dataUser'); // Kembali ke halaman daftar user
    }

    public function editProfile()
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
            redirect('admin/profile');
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
        redirect('admin/profile');
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
                redirect('admin/profile');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Password tidak boleh sama dengan password lama</div>');
                    redirect('admin/profile');
                } else
                    // password benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">password berhasil di ubah</div>');
                redirect('admin/profile');
            }
        }
    }
}

/* End of file: Admin.php */
