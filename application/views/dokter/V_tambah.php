 <!DOCTYPE html>
 <html> 
 <head>
    <link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- MY CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">

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

    <title>Tambah Jadwal Temu</title>
</head>
<body>

    <div style="position: relative; top: 110px;"> 
        <?php 
            $this->load->view('template/navbar');
        ?>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card" style="position: relative; top: 90px;">
                    <div class="card-header text-center">
                        Form Tambah Jadwal Kosong
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nim">Nama Dokter</label>
                                <input type="text" class="form-control" id="Username_Dokter" name="Username_Dokter" disabled value="<?php echo $this->session->userdata('session_nama');?>">
                                <small class="form-text text-danger"><?= form_error('Username_Dokter') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Jam</label>
                                <div class="form-group">
                                    <input type="time" class="form-control" id="jam" name="jam">
                                </div>
                                <small class="form-text text-danger"><?= form_error('jam') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Tanggal</label>
                                <div class="form-group">
                                <input type="date" class="form-control" id="Tanggal"name="Tanggal">
                                </div>
                                <small class="form-text text-danger"><?= form_error('Tanggal') ?>.</small>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <?php 
        $this->load->view('template/back'); 
        $this->load->view('template/footer');
    ?>
</body>
</html>