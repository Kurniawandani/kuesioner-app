<div class=" w-4/5 h-full wrapper flex flex-col justify-around items-center">
  <div class="logoHeader h-1/5 sm:w-3/5 w-4/5 bg-baseColor rounded-md shadow-lg flex flex-col md:flex-row justify-center md:justify-evenly items-center p-4 md:p-0">
    <img class="h-3/5 md:h-3/4" src="<?= base_url('assets'); ?>/images/Logo-kemensos.png" alt="" />
    <p class="font-logo text-sm font-bold md:text-lg text-center">Kuesioner Pelayanan Masyarakat</p>
  </div>
  <form class="questionBox h-2/3 sm:h-1/2 sm:w-3/5 w-4/5 bg-baseColor flex justify-center items-center rounded-md shadow-lg font-typograph font-semibold" action="#" method="POST">
    <div class="h-full w-4/5  flex flex-col justify-around items-center container">
      <div class="questionText w-full h-2/4 sm:h-1/4 flex flex-col justify-center items-start flex-grow-0">
        <div class="questionFill">
          <span id="textQuestion" class="text-justify md:text-base text-sm"></span>
          <input type="hidden" name="id_pertanyaan" id="id_pertanyaan">
          <input type="hidden" name="id_pengisi" id="id_pengisi" value="<?= $id_pengisi; ?>">
          <input type="hidden" name="pertanyaan" id="pertanyaan">
        </div>
      </div>
      <div class="answerText w-full h-1/6 sm:h-2/5 flex justify-center items-center flex-grow-0">
        <textarea id="textAnswer" class="font-logo text-sm p-3 break-all border border-gray-700 rounded-md h-full md:h-4/5 w-full md:w-4/5" type="text" name="jawaban"></textarea>
      </div>
      <div class="nextQuestion w-full h-1/6 flex justify-between items-center flex-grow-0 ">
        <div class="infoCount">
          <div class="text-sm">
            <span id="nomor"></span> dari <span id="total_pertanyaan"><?= $total_pertanyaan; ?></span>
          </div>
        </div>
        <button type="submit" class="nextButton bg-green-800 hover:bg-green-900 transition duration-100 ease-in-out md:w-1/4 w-1/2 h-1/2 rounded-lg text-sm text-baseColor tracking-wide">
          <span id="textButton">Selanjutnya</span>
        </button>
      </div>
    </div>
  </form>
</div>