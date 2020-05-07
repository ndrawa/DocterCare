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

    <title>Hapus Jadwal Temu</title>

    <style type="text/css">
        #del{
            position: relative;
            top: 100px;
            margin: auto;
            width: 1200px;
            height: 600px;
        }
    </style>
</head>
<body>
    <div id="del">
        <h1 class="text-center"> Hapus Jadwal Temu </h1>  
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">Pasien</th>
                    <th class="text-center" scope="col">Dokter</th>
                    <th class="text-center" scope="col">Jam</th>
                    <th class="text-center" scope="col">Tanggal</th>
                    <th class="text-center" scope="col">Penyakit</th>
                    <th class="text-center" scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr><?php foreach ($jadwaltemu as $jt) {
                          if ($this->session->userdata('session_username') == $jt['Username_Pasien']) {
                    ?>

                    <?php 
                        $url = site_url()."/C_Pasien/doDelete/".$jt['id']; 
                    ?>
                    <?php
                    foreach ($pasien as $Pasien) {
                        if ($Pasien->username == $jt['Username_Pasien']) {
                    ?>
                    <td class="text-center"><?php echo $Pasien->nama ;?></td>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    foreach ($dokter as $Dokter) {
                          if ($Dokter->username == $jt['Username_Dokter']) {
                    ?>
                    <td class="text-center"><?php echo $Dokter->nama ;?></td>
                    <?php
                        }
                    }
                    ?>

                    <td class="text-center"><?= $jt['jam']; ?></td>
                    <td class="text-center"><?= $jt['Tanggal']; ?></td>
                    <td class="text-center"><?= $jt['Penyakit']; ?></td>
                    <td class="text-center">
                        <a href="<?= $url ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus jadwal ini?')">
                            <i class="fa fa-trash"></i>
                        </a>
                        
                        <!--del('Apakah anda yakin menghapus data ini?');-->
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php 
        $this->load->view('template/navbar');
        $this->load->view('template/back'); 
        $this->load->view('template/footer');?>
</body>
</html>
