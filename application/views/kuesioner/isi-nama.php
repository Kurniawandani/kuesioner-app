<div class="w-4/5 h-full wrapper flex flex-col justify-around items-center">
  <div class="logoHeader h-1/5 w-4/5 sm:w-3/5 bg-baseColor rounded-md shadow-lg flex flex-col md:flex-row justify-center md:justify-evenly items-center p-4 md:p-0">
    <img class="h-3/5 md:h-3/4" src="<?= base_url('assets/'); ?>images/Logo-kemensos.png" alt="" />
    <p class="font-logo text-sm font-bold md:text-lg text-center">Kuesioner Pelayanan Masyarakat</p>
  </div>
  <div class="questionBox h-2/3 sm:h-4/6 w-4/5 sm:w-3/5 bg-baseColor flex flex-col justify-center items-center rounded-md shadow-lg font-typograph font-semibold p-10">
    <h1 class="text-sm sm:text-lg font-bold mb-3">Beritahu kami siapa anda..</h1>
    <form class="w-full" method="POST" action="<?= base_url('kuesioner/isinama'); ?>" autocomplete="off">
      <div class="w-full">
        <label for="nama" class="text-sm">Nama</label>
        <input type="text" name="nama" id="nama" class="w-full rounded-md p-3 outline-none focus:ring-2 mt-3" />
        <?= form_error('nama', '<small style="color:red">', '</small>'); ?>
      </div>

      <div class="w-full mt-3">
        <label for="no_telp" class="text-sm">No Telpon </label>
        <input type="tel" name="no_telp" id="no_telp" class="w-full rounded-md p-3 outline-none focus:ring-2 mt-3" />
        <?= form_error('no_telp', '<small style="color:red">', '</small>'); ?>
      </div>
      <div class="w-full mt-3">
        <label for="Jenis Layanan" class="text-sm">Jenis Layanan</label>
        <input type="tel" name="jenis_layanan" id="jenis_layanan" placeholder="Jenis Layanan - Tahun" class="w-full rounded-md p-3 outline-none focus:ring-2 mt-3" />
        <?= form_error('jenis_layanan', '<small style="color:red">', '</small>'); ?>
      </div>

      <div class="w-full flex justify-center sm:justify-end items-center mt-5">
        <button type="submit" class="bg-green-800 hover:bg-green-900 transition duration-100 ease-in-out px-6 py-3 rounded-lg text-sm text-baseColor tracking-wide">Selanjutnya</button>
      </div>
    </form>
  </div>
</div>