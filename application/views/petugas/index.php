<!-- area content -->
<div class="main-content container-fluid">
  <div class="page-title">
    <h3><?= $judul; ?></h3>
    <p class="text-subtitle text-muted">Selamat Datang <?= $user['username']; ?></p>
  </div>
  <section class="section">
    <div class="row my-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Orang yang telah mengisi kuesioner</h4>

          </div>
          <div class="card-body  pb-0">
            <div class="table-responsive">
              <table class="table mb-0" id="table1">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>No Telpon</th>
                    <th>Jenis Layanan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pengisi as $p) : ?>
                    <tr>
                      <td><?= $p['nama_pengisi']; ?></td>
                      <td><?= $p['no_telp']; ?></td>
                      <td><?= $p['jenis_layanan']; ?></td>
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