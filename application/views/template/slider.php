<style type="text/css">
  #carouselExampleControls{
    height: 40%;
    width: 100%;
  }

  h2{
    color:black;
    margin: 20px auto;
    width: 90%;
  }
</style>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" id="item">
      <img class="d-block w-100" src="<?= base_url(); ?>/assets/pic/slider/slider-bg-5.png" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h3> Selamat datang, <?php echo $this->session->userdata('session_nama');?></h3>
        <p > Anda masuk sebagai <?= $person ?>
        <br> Semoga hari anda menyenangkan </p>
      </div>
    </div>
    <div class="carousel-item" id="item">
      <img class="d-block w-100" src="<?= base_url(); ?>/assets/pic/slider/slider-bg-6.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5> Dokter </h5>
        <p> Dokter adalah seseorang yang sangat sakti. Dengan ilmu dia bisa membantu menyelamatkan orang, tentunya dengan seizin Allah SWT. Tapi sebagai dokter tidaklah mudah, karena mereka berurusan dengan nyawa. Salah sedikit saja, mereka bisa membahayakan nyawa orang lain.</p>
      </div>
    </div>
    <div class="carousel-item" id="item">
      <img class="d-block w-100" src="<?= base_url(); ?>/assets/pic/slider/slider-bg-8.png" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
        <h5> Pasien </h5>
        <p>Pasien adalah seseorang yang menerima perawatan medis. Sering kali, pasien menderita penyakit atau cedera dan memerlukan bantuan dokter untuk memulihkannya.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>