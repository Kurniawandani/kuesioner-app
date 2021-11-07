<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda Tidak di ijinkan masuk!</div>');
      redirect('auth');
    }
  }
  public function index()
  {
    $data = [
      'judul'   => "Dashboard",
      'halaman' => "dashboard",
      'user'    => $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array(),
      'pengisi' => $this->db->get('pengisi')->result_array()
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('petugas/index', $data);
    $this->load->view('templates/footer', $data);
  }

  public function reportKuesioner()
  {
    $data = [
      'judul'   => "Dashboard",
      'halaman' => "report",
      'user'    => $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array(),
      'jawaban' => $this->db->get('jawaban')->result_array()
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('petugas/report-kuesioner', $data);
    $this->load->view('templates/footer', $data);
  }

  public function cetakReport()
  {
    $data = [
      'judul'   => "Dashboard",
      'halaman' => "report",
      'user'    => $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array(),
      'jawaban' => $this->db->get('jawaban')->result_array()
    ];

    $this->load->view('petugas/cetak-report', $data);
  }
}
