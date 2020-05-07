 <!DOCTYPE html>
 <html> 
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">

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

    <title>Lihat Jadwal Temu</title>

    <style type="text/css">
        #view {
            position: relative;
            top: 90px;
            margin: auto;
            width: 80%;
            height: 600px; 
            padding:20px;
        }
    </style>
</head>
<body>
    <div id="view">
        <?php 
            //untuk mengecek apakah pasien punya jadwal temu
            if(!array_filter($jadwaltemu)) { ?>
                <div style="height: 65vh">
                    <div class="flex-center flex-column">
                        <img style="width: 20%;" src='http://localhost/Pemrograman-Web/DoctorCare/assets/pic/kosong.png'>
                        <h5 class="animated fadeIn mb-3">Anda belum mengatur jadwal temu. Silahkan menambahkan jadwal temu dari halaman utama</h5>
                    </div>
                </div>
            <?php 
            } else { ?>
                <?php 
                if ('pasien' == $this->session->userdata('session_login')) { ?>
                        
                <h1 class="text-center" style="margin: 10px;"> Lihat Jadwal Temu </h1>
                    <table class="table mt-5">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" scope="col">Nama Dokter</th>
                                <th class="text-center" scope="col">Jam</th>
                                <th class="text-center" scope="col">Tanggal</th>
                                <th class="text-center" scope="col">Penyakit</th>
                                <th class="text-center" scope="col">No. Telepon</th>
                                <th class="text-center" scope="col">Alamat Email</th>
                            </tr>
                <?php
                } elseif ('dokter' == $this->session->userdata('session_login')) { ?>
                            
                <h1 class="text-center" style="margin: 10px;"> Lihat Jadwal Temu </h1>
                    <table class="table mt-5">
                        <thead class="thead-dark">
                            <tr>        
                                <th class="text-center" scope="col">Nama Pasien</th>
                                <th class="text-center" scope="col">Jam</th>
                                <th class="text-center" scope="col">Tanggal</th>
                                <th class="text-center" scope="col">Penyakit</th>
                                <th class="text-center" scope="col">No. Telepon</th>
                                <th class="text-center" scope="col">Alamat Email</th>
                            </tr>
                <?php    
                } else { ?>
                    <div style="height: 65vh">
                        <div class="flex-center flex-column">
                            <img style="width: 20%;" src='http://localhost/Pemrograman-Web/DoctorCare/assets/pic/kosong.png'>
                            <h5 class="animated fadeIn mb-3">Anda belum mengatur jadwal temu. Silahkan menambahkan jadwal temu dari halaman utama</h5>
                        </div>
                    </div>
                <?php 
                } 
                ?>  
                        </thead>
                    <tbody>
                <?php
                foreach ($jadwaltemu as $jt) { 
                    if ($jt['Username_Pasien'] == $this->session->userdata('session_username')) { ?>
                        <tr>
                            <td class="text-center"><?= $jt['namadokter']; ?></td>
                            <td class="text-center"><?= $jt['jam']; ?></td>
                            <td class="text-center"><?= $jt['Tanggal']; ?></td>
                            <td class="text-center"><?= $jt['Penyakit']; ?></td>
                            <td class="text-center"><?= $jt['telpdokter']; ?></td>
                            <td class="text-center"><?= $jt['emaildokter']; ?></td>
                    <?php
                    } elseif ($jt['Username_Dokter'] == $this->session->userdata('session_username')) { ?>
                        <tr>    
                            <td class="text-center"><?= $jt['namapasien']; ?></td>
                            <td class="text-center"><?= $jt['jam']; ?></td>
                            <td class="text-center"><?= $jt['Tanggal']; ?></td>
                            <td class="text-center"><?= $jt['Penyakit']; ?></td>
                            <td class="text-center"><?= $jt['telppasien']; ?></td>
                            <td class="text-center"><?= $jt['emailpasien']; ?></td>
                    <?php    
                    }
                    ?> 

                </tr>
                <?php
                } 
                ?>
                    </tbody>
                </table>
     <?php  } ?> <!--//endif-->
    </div>
    <?php 
        $this->load->view('template/navbar'); 
        $this->load->view('template/back');
        $this->load->view('template/footer');?>
</body>
</html>