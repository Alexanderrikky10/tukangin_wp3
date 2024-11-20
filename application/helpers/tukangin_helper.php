<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum <a href="' . base_url('auth') . '" class="alert-link">Login </a> </div>');
        redirect('tukangin/home');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}

function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 1) {
        redirect('tukangin/home');
    }
}
function is_user()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 2) {
        redirect('admin');
    }
}
