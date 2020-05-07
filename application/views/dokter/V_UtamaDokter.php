<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/style.css">

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="<?= base_url(); ?>assets/MDBootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?= base_url(); ?>assets/MDBootstrap/css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="<?= base_url(); ?>assets/MDBootstrap/css/style.css" rel="stylesheet">

	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/mdb.min.js"></script> 

	<script src="<?php echo base_url('assets/jquery/jquery-3.5.0.min.js') ;?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>

	<style type="text/css">
		h4{
			text-align: center;
			position: relative;
			margin: 10px auto;
			color: white;
		}	

		img{
			filter: brightness(60%);
		}	

		li{
			padding: 1px;
			margin-right: 15px;
		}

		#desc{
			text-align: center;
			color: white;
		}

		#group{
			position: relative;
			top: 150px;
			margin: auto;
			width: 90%;
		}

		#viewjd{
            position: fixed;
            right: 320px;
            top:23px;
        }

	</style>

	<title> Selamat Datang di Doctor Care </title>
</head>
<body>
	<div style="height: 120vh;">
		
		<div style="position: relative; top: 89px;"> 
		<?php 
			$data['person'] = "dokter";
			$this->load->view('template/slider',$data); 
			$this->load->view('template/navbar');
		?>
		</div>

		<div id="viewjd">
            <!--<button type="button" class="btn btn-outline-info waves-effect btn-sm" onclick="window.location.href='<?= site_url('C_Pasien/V_LihatJadwalTemu/'); ?>'"> Lihat Jadwal Temu Anda </button>-->
            <button type="button" class="btn btn-outline-info waves-effect btn-sm" onclick="showjadwal()"> Lihat Jadwal Temu Anda </button>
        </div>

		<div class="card-deck" id="group">
			<a href="<?= site_url('C_Dokter/V_Tambah/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-buat.jpg" class="card-img" alt="..." >
				<div class="card-img-overlay" >
					<h4 class="card-title">Buat jadwal kosong</h4>
					<p class="card-text" id="desc"> Buat jadwal kosong sendiri untuk menyesuaikan dengan jadwal anda </p>
				</div>
			</div> </a>

			<a href="<?= site_url('C_Dokter/V_Ubah/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-edit.jpg" class="card-img" alt="..." >
				<div class="card-img-overlay">
					<h4 class="card-title"> Edit jadwal kosong </h4>
					<p class="card-text" id="desc"> Edit jadwal kosong anda yang telah dibuat </p>
				</div>
			</div> </a>

			<a href="<?= site_url('C_Dokter/V_LihatJadwalKosong/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-lihat.jpeg" class="card-img" alt="..." >
				<div class="card-img-overlay">
					<h4 class="card-title">Lihat jadwal kosong </h4>
					<p class="card-text" id="desc"> Melihat jadwal kosong yang telah anda buat </p>
				</div>
            </div> </a>

            <a href="<?= site_url('C_Dokter/V_hapus/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-delete.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Hapus jadwal dokter</h4>
                    <p class="card-text" id="desc"> Menghapus jadwal kosong dokter yang telah dibuat </p>
                </div>
			</div> </a>
		</div>
	</div>
	<?php $this->load->view('template/footer'); ?>

	<!--------------------------------ngatur Modals-------------------------------->
     
    <script type="text/javascript">
        function showjadwal() {
            $('#ListJadwal').modal('show');
        }
    </script>

    <style type="text/css">
        .modal-dialog.modal-dialog-scrollable {
            width: 700px;
        }
    </style>

    <!-----------------------Full Height Modal Right ----------------------------------->

    <div class="modal fade top" id="ListJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable mw-100 w-75" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #f6fdde;">
                <h4 class="modal-title w-100" id="myModalLabel" style="color: black; text-align: center;">Daftar Jadwal Temu Anda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                    $this->load->model('M_Pasien');
                    $jadwalList = $this->M_Pasien->JadwalTemu_List();
                ?>
                <table class="table mt-6" style="width: 100%;">
                    <colgroup>
                       <col span="1" style="width: 20%;">
                       <col span="1" style="width: 10%;">
                       <col span="1" style="width: 15%;">
                       <col span="1" style="width: 16.6%;">
                       <col span="1" style="width: 12%;">
                    </colgroup>
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Nama Pasien</th>
                            <th class="text-center" scope="col">Jam</th>
                            <th class="text-center" scope="col">Tanggal</th>
                            <th class="text-center" scope="col">Penyakit</th>
                            <th class="text-center" scope="col">No. Telepon</th>
                            <th class="text-center" scope="col">Alamat Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwalList as $jl) { ?>
                            <tr>
                                <td class="text-center"><?= $jl['namapasien']; ?></td>
                                <td class="text-center"><?= $jl['jam']; ?></td>
                                <td class="text-center"><?= $jl['Tanggal']; ?></td>
                                <td class="text-center"><?= $jl['Penyakit']; ?></td>
                                <td class="text-center"><?= $jl['telppasien']; ?></td>
                                <td class="text-center"><?= $jl['emailpasien']; ?></td>
                            </tr>
                        <?php
                            }    //endforeach
                        ?> 
                    </tbody>
                </table>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-indigo" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
	<!-- Full Height Modal Right -->
</body>
</html>