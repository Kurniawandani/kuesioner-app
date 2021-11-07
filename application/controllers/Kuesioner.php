<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner extends CI_Controller
{
  public function index()
  {
    $this->load->view('kuesioner/header');
    $this->load->view('kuesioner/index');
    $this->load->view('kuesioner/footer');
  }

  public function isiNama()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
      'required' => 'Nama tidak boleh kosong!'
    ]);

    $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim', [
      'required' => 'No Telpon tidak boleh kosong!'
    ]);
    $this->form_validation->set_rules('jenis_layanan', 'Jenis Layanan', 'required|trim', [
      'required' => 'Jenis Layanan tidak boleh kosong!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('kuesioner/header');
      $this->load->view('kuesioner/isi-nama');
      $this->load->view('kuesioner/footer');
    } else {
      $data = [
        'nama_pengisi' => htmlspecialchars($this->input->post('nama', true)),
        'no_telp' => $this->input->post('no_telp', true),
        'jenis_layanan' => $this->input->post('jenis_layanan', true)
      ];

      $res = $this->db->insert('pengisi', $data);
      if ($res) {
        $pengisi = $this->db->get_where('pengisi', ['no_telp' => $data['no_telp']])->row_array();

        $userdata = [
          'id_pengisi' => $pengisi['id_pengisi'],
          'no_telp' => $pengisi['no_telp'],
        ];
        $this->session->set_userdata($userdata);
        redirect('kuesioner/start');
      }
    }
  }

  public function start()
  {
    if (!$this->session->userdata('no_telp')) {
      redirect('kuesioner/isinama');
    }

    $data['id_pengisi'] = $this->session->userdata('id_pengisi');
    $data['total_pertanyaan'] = count($this->db->get('pertanyaan')->result_array());
    $this->load->view('kuesioner/header');
    $this->load->view('kuesioner/start-kuesioner', $data);
    $this->load->view('kuesioner/footer');
  }

  public function getPertanyaan()
  {
    $nomor = $this->input->post('nomor', true);
    $res = $this->db->get_where('pertanyaan', ['nomor' => $nomor])->row_array();

    echo json_encode($res);
  }

  public function addJawaban()
  {
    $id_pengisi = $this->input->post('id_pengisi', true);

    $data = [
      'id_pengisi' => $id_pengisi,
      'date_created' => time()
    ];
    $this->db->insert('jawaban', $data);
  }

  public function addIsiJawaban()
  {
    $id_pertanyaan = $this->input->post('id_pertanyaan', true);
    $id_pengisi = $this->input->post('id_pengisi', true);
    $jawaban = $this->input->post('jawaban', true);

    $jwb = $this->db->get_where('jawaban', ['id_pengisi' => $id_pengisi])->row_array();
    $data = [
      'id_jawaban' => $jwb['id_jawaban'],
      'id_pertanyaan' => $id_pertanyaan,
      'id_pengisi' => $id_pengisi,
      'jawaban' => $jawaban
    ];
    $this->db->insert('isi_jawaban', $data);
  }

  public function selesai()
  {
    $this->session->unset_userdata('id_pengisi');
    $this->session->unset_userdata('no_telp');
    redirect('kuesioner');
  }
}
