<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function index()
    {
        # code...
        if ($this->session->userdata('email'))
            redirect('tukangin');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data = [
                'title' => 'Login',
                'konten' => $this->load->view('auth/v_login', [], TRUE)
            ];
            $this->load->view('auth/login_template', $data);
        } else {
            // validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // mengambil user dari dalam db
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // user ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('tukangin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('tukangin');
                    } elseif ($user['users'] == 3) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">anda berhasil login</div>');
                        redirect('users');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"> Wrong Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"> This Email is not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Email is not registered</div>');
            redirect('auth');
        }
    }


    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('tukangin');
        }
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');

        if ($this->form_validation->run() == false) {

            $data = [
                'title' => 'Register',
                'konten' => $this->load->view('auth/v_register', [], TRUE)
            ];
            $this->load->view('auth/register_template', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            // tidak mengunakan model dan langsung ke dalam database
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">congratulation! your account has been created. please login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-message" role="alert">You have been logged out! </div>'
        );
        redirect('auth');
    }
}
/* End of file: Auth.php */
