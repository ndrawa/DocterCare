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

        #docicon{
            width: 5%;
        }

        #viewdoc{
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
            $data['person'] = "pasien";
            $this->load->view('template/slider', $data); 
            $this->load->view('template/navbar');
        ?>
        </div>

        <!-- buat lihat daftar dokter -->
        <div id="viewdoc">
            <button type="button" class="btn btn-outline-info waves-effect btn-sm" onclick="showdoc()"> Lihat Tim dokter kami </button>
        </div>

        <div class="card-deck" id="group">
            <a href="<?= site_url('C_Pasien/V_tambah/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-buat.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Buat jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Buat jadwal temu sendiri dengan doktermu untuk memeriksakan kesehatanmu kali ini lebih mudah</p>
                </div>
            </div> </a>

            <a href="<?= site_url('C_Pasien/V_ubah/');?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-edit.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Edit jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Edit jadwal temu dengan dokter yang telah dibuat </p>
                </div>
            </div> </a>

            <a href="<?= site_url('C_Pasien/V_LihatJadwalTemu/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-lihat.jpeg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Lihat jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Lihat jadwal temu dengan dokter yang telah dibuat </p>
                </div>
            </div> </a>

            <a href="<?= site_url('C_Pasien/V_hapus/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-delete.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Hapus jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Menghapus jadwal temu dengan dokter yang telah dibuat </p>
                </div>
            </div> </a>
        </div>
    </div>  

    <?php $this->load->view('template/footer') ?>

    <!--------------------------------ngatur Modals-------------------------------->
     
    <script type="text/javascript">
        function showdoc() {
            $('#ListDokter').modal('show');
        }
    </script>

    <style type="text/css">
        .modal-dialog.modal-dialog-scrollable {
            width: 1500px;
        }
    </style>

    <!-----------------------Full Height Modal Right ----------------------------------->

    <div class="modal fade top" id="ListDokter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable mw-100 w-75" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #f6fdde;">
                <h4 class="modal-title w-100" id="myModalLabel" style="color: black; text-align: center;">Tim Dokter kami</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                    $this->load->model('dokter_model');
                    $dokterList = $this->dokter_model->get_all_dokter();
                ?>
                <table class="table mt-5" style="width: 100%;">
                    <colgroup>
                       <col span="1" style="width: 20%;">
                       <col span="1" style="width: 20%;">
                       <col span="1" style="width: 20%;">
                       <col span="1" style="width: 20%;">
                       <col span="1" style="width: 20%;">
                    </colgroup>
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Nama Dokter</th>
                            <th class="text-center" scope="col">Alamat</th>
                            <th class="text-center" scope="col">Spesialis</th>
                            <th class="text-center" scope="col">Alamat Email</th>
                            <th class="text-center" scope="col">No. Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dokterList as $dl) { ?>
                            <tr>
                                <td class="text-center"><?= $dl->nama; ?></td>
                                <td class="text-center"><?= $dl->alamat; ?></td>
                                <td class="text-center"><?= $dl->spesialis; ?></td>
                                <td class="text-center"><?= $dl->email; ?></td>
                                <td class="text-center"><?= $dl->telp; ?></td>
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