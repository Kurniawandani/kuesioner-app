<!-- area content -->
<div class="main-content container-fluid">
  <div class="page-title">
    <h3>Report Kuesioner</h3>
  </div>
  <section class="section">
    <div class="row my-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <a href="<?= base_url('petugas/cetakreport'); ?>" class="btn btn-primary">
                <i data-feather="printer" width="20"></i>
              </a>
            </div>
            <div class="table-responsive">
              <table class="table mb-0" id="table1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Pengisi</th>
                    <th>Kuesioner</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($jawaban as $jwb) : ?>
                    <?php
                    $pengisi = $this->db->get_where('pengisi', ['id_pengisi' => $jwb['id_pengisi']])->row_array();
                    $isiJawaban = $this->db->get_where('isi_jawaban', ['id_jawaban' => $jwb['id_jawaban'], 'id_pengisi' => $jwb['id_pengisi']])->result_array();
                    ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td>
                        <b> <?= $pengisi['nama_pengisi']; ?></b>
                        <br>
                        <span class="btn btn-sm btn-primary mt-2"><?= $pengisi['no_telp']; ?></span>
                        <br>
                        <span class="btn btn-sm btn-success mt-2"><?= $pengisi['jenis_layanan']; ?></span>
                      </td>
                      <td>
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th>Pertanyaan</th>
                              <th>Jawaban</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php foreach ($isiJawaban as $isi) : ?>

                              <?php
                              $pertanyaan = $this->db->get_where('pertanyaan', ['id_pertanyaan' => $isi['id_pertanyaan']])->row_array(); ?>
                              <tr>
                                <td><?= $pertanyaan['pertanyaan']; ?></td>
                                <td><?= $isi['jawaban']; ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>