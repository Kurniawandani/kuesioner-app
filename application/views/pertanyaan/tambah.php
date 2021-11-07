<!-- area content -->
<div class="main-content container-fluid">
  <div class="page-title">
    <h3>Tambah Pertanyaan</h3>
  </div>
  <section class="section">
    <div class="row my-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-end align-items-center">
            <a href="<?= base_url('pertanyaan'); ?>" class="btn icon icon-left btn-primary"><i data-feather="arrow-left"></i> Kembali</a>
          </div>
          <div class="card-body">
            <form class="form form-vertical" method="POST" action="<?= base_url('pertanyaan/tambah'); ?>">
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="nomor_soal">Nomor Soal</label>
                      <input type="text" id="nomor_soal" class="form-control" name="nomor_soal" placeholder="Nomor Soal" value="<?= $nomor_akhir; ?>" readonly />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="pertanyaan">Pertanyaan</label>
                      <textarea name="pertanyaan" id="pertanyaan" rows="3" class="form-control"></textarea>
                      <?= form_error('pertanyaan', '<span class="text-danger text-sm">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Tambah</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>