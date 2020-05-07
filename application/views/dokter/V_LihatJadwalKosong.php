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

    <style type="text/css">
        #view {
            margin: auto;
            width: 80%;
            height: 500px; 
            padding:20px;
        }
    </style>

    <title>Jadwal Kosong</title>
</head>
<body>
    <div class="container"  style="margin-top: 80px; margin-bottom: 330px;">
    <div id="view">
        <?php 
            //untuk mengecek apakah dokter punya jadwal kosong
            if(!array_filter($jadwal_kosong)) { ?>
                <div style="height: 65vh">
                    <div class="flex-center flex-column">
                        <img style="width: 20%;" src='http://localhost/Pemrograman-Web/DoctorCare/assets/pic/kosong.png'>
                        <h5 class="animated fadeIn mb-3">Anda belum mengatur jadwal kosong. Silahkan menambahkan jadwal kosong dari halaman utama</h5>
                    </div>
                </div>
            <?php 
            } else { ?>
                <h1 class="text-center" style="margin: 10px;"> Lihat Jadwal Kosong </h1>
                <table class="table mt-5">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Nama Dokter</th>
                            <th class="text-center" scope="col">Jam</th>
                            <th class="text-center" scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><?php foreach ($jadwal_kosong as $jk) {
                            if ($jk['Username_Dokter'] == $this->session->userdata('session_username')) { ?>
                                <td class="text-center"><?= $jk['nama']; ?></td>
                                <td class="text-center"><?= $jk['jam']; ?></td>
                                <td class="text-center"><?= $jk['Tanggal']; ?></td>
                        </tr>
                        <?php
                                } // endif
                            }    //endforeach
                        ?> 
                    </tbody>
                </table>
            <?php  
            } //endif
            ?>
    </div>
    </div>
    <?php 
        $this->load->view('template/navbar'); 
        $this->load->view('template/back');
        $this->load->view('template/footer');
    ?>
</body>
</html>