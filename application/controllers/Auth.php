<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('username')) {
      redirect('petugas');
    }

    $data['judul'] = "Login Petugas";

    $this->form_validation->set_rules('username', 'Username', 'required|trim', [
      "required" => "Username tidak boleh kosong!"
    ]);
    $this->form_validation->set_rules('password', 'password', 'required|trim', [
      "required" => "Password tidak boleh kosong!"
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/index', $data);
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username', true);
    $password = htmlspecialchars($this->input->post('password', true));

    $user = $this->db->get_where('petugas', ['username' => $username])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $userdata = [
          'username' => $user['username']
        ];
        if ($user['username'] == 'admin') {
          $this->session->set_userdata($userdata);
          redirect('petugas');
        } else {
          redirect('auth');
        }
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tidak ada petugas dengan username : <strong> ' . $username . '</strong></div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    session_destroy();
    $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Sampai jumpa dilain waktu :)</strong></div>');
    redirect('auth');
  }
}
