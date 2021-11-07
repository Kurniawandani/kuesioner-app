<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><strong>Anda Tidak di ijinkan masuk!</strong></div>');
      redirect('auth');
    }
  }
  public function index()
  {
    $data = [
      'judul'      => "Daftar Pertanyaan",
      'halaman'    => "daftar_pertanyaan",
      'user'       => $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array(),
      'pertanyaan' => $this->db->get('pertanyaan')->result_array(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pertanyaan/index', $data);
    $this->load->view('templates/footer', $data);
  }

  public function tambah()
  {
    $nomor = $this->db->query("SELECT nomor FROM pertanyaan ORDER BY nomor DESC LIMIT 1")->row_array();
    if ($nomor == null) {
      $nomor = 0;
    } else {
      $nomor = $nomor['nomor'];
    }
    $data = [
      'judul'      => "Daftar Pertanyaan",
      'halaman'    => "daftar_pertanyaan",
      'user'       => $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array(),
      'nomor_akhir' => $nomor + 1
    ];

    $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim', [
      'required' => 'Pertanyaan tidak boleh kosong!'
    ]);


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('pertanyaan/tambah', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $data = [
        'nomor' => $this->input->post('nomor_soal', true),
        'pertanyaan' => htmlspecialchars($this->input->post('pertanyaan', true)),
      ];

      $res = $this->db->insert('pertanyaan', $data);
      if ($res) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Pertanyaan baru berhasil ditambahkan!</div>');
        redirect('pertanyaan');
      }
    }
  }

  public function ubah($id)
  {
    $data = [
      'judul'      => "Daftar Pertanyaan",
      'halaman'    => "daftar_pertanyaan",
      'user'       => $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array(),
      'pertanyaan' => $this->db->get_where('pertanyaan', ['id_pertanyaan' => $id])->row_array()

    ];

    $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim', [
      'required' => 'Pertanyaan tidak boleh kosong!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('pertanyaan/ubah', $data);
      $this->load->view('templates/footer', $data);
    } else {

      $data = [
        'pertanyaan' => $this->input->post('pertanyaan', true)
      ];

      $res = $this->db->update('pertanyaan', $data, ['id_pertanyaan' => $id]);
      if ($res) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pertanyaan berhasil di Ubah!</div>');
        redirect('pertanyaan');
      }
    }
  }

  public function hapus($id)
  {
    $res = $this->db->delete('pertanyaan', ['id_pertanyaan' => $id]);
    if ($res) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Pertanyaan berhasil dihapus!</div>');
      redirect('pertanyaan');
    }
  }
}
