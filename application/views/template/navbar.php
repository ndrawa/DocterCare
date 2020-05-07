<style type="text/css">
	#Fixednavbar{		/*fixed navbar yang ada di atas*/
		position: fixed;
		top: 0px;
		background-color: #f6fdde;
		margin: auto;
		width: 100%;
	}

	#logodc{			/*logo docter care yang di kiri atas */
		
		filter: brightness(100%);
		margin-left: 40px;
	}
</style>

<nav class="navbar navbar-expand-lg" id="Fixednavbar">
  	<a href="<?= site_url('login/auth');?>"> <img src="<?= base_url(); ?>/assets/pic/logodc.png" id="logodc" width="105px"> </a>
  	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav" style="position: absolute; right: 25px;">
			<li> <button onclick="window.location.href='<?php 
				if($this->session->userdata('session_status')=='dokter') {
					echo site_url('dokter/index/');
				} else if($this->session->userdata('session_status')=='pasien') {
					echo site_url('pasien/index/');
				}; ?>'" type="button" class="btn btn-primary btn-sm"> Kelola akun </button> </li>
			<li> <button onclick="window.location.href='<?php echo base_url().'index.php/login/logout'?>'" class="btn btn-dark btn-sm"> Logout </button> </li>
		</ul>
	</div>
</nav>