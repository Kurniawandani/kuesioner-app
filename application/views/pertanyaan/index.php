<!-- area content -->
<div class="main-content container-fluid">
  <div class="page-title">
    <h3>Daftar Pertanyaan</h3>
  </div>
  <section class="section">
    <div class="row my-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-end align-items-center">
            <a href="<?= base_url('pertanyaan/tambah'); ?>" class="btn icon icon-left btn-primary"><i data-feather="plus"></i> Tambah Pertanyaan</a>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="table mb-0" id="table1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Pertanyaan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($pertanyaan as $p) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $p['pertanyaan']; ?></td>
                      <td>
                        <a href="<?= base_url('pertanyaan/hapus/') . $p['id_pertanyaan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                        <a href="<?= base_url('pertanyaan/ubah/') . $p['id_pertanyaan']; ?>" class="btn btn-primary">Ubah</a>
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