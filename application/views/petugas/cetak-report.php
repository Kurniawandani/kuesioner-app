<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Report Kuesioner</title>
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.css" />
</head>

<body>
  <h1 class="text-center mb-3">Report Jawaban Kuesioner</h1>
  <div class="table-responsive text-xs">
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
              <?= $pengisi['nama_pengisi']; ?>
              <br />
              <span class="text-primary mt-2"><?= $pengisi['no_telp']; ?></span>
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
                    <?php $pertanyaan = $this->db->get_where('pertanyaan', ['id_pertanyaan' => $isi['id_pertanyaan']])->row_array(); ?>
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
  <script>
    window.print();
    window.onafterprint = function(event) {
      document.location.href = "<?= base_url('petugas/reportKuesioner'); ?>";
    };
  </script>
</body>

</html>