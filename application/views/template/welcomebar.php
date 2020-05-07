<style type="text/css">
	#header{			/*div tulisan "selamat datang,..."*/
	background-color: #39aea9;
	/*background-image: linear-gradient(#a32c38,#c47974);*/
}
</style>

<div id="header" style="position: relative;">
	<h2 style="margin: 0px 0px 40px 90px; padding: 10px;"> Selamat datang, <?php echo $this->session->userdata('session_nama');?></h2>
	<p style="margin: 0px 0px 40px 100px;"> Anda masuk sebagai <?= $person ?>
	<br> Semoga hari anda menyenangkan </p>
</div>