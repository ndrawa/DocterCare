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

    <title>Tambah Jadwal Temu</title>

    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> </script> 
</head>
<body>
    
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card" style="position: relative; top: 90px;">
                    <div class="card-header text-center">
                        Form Tambah Jadwal Temu
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Nama Dokter</th>
                                        <th class="text-center">Jam</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody id="here">
                                    
                                </tbody>
                            </table>
                            <div class="form-group" hidden>
                                <label for="text">ID</label>
                                <input type="text" class="form-control" id="idjadwal" name="idjadwal">
                                <small class="form-text text-danger"><?= form_error('idjadwal') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="nama"> Nama Pasien </label>
                                <input type="text" class="form-control" id="Username_Pasien" name="Username_Pasien" disabled value= "<?php echo $this->session->userdata('session_nama');?>">
                            </div>
                            <div class="form-group">
                                <label for="nama"> Nama Dokter </label>
                                <input type="text" class="form-control" id="nama" name="nama" disabled="">
                                <input type="text" class="form-control" id="Username_Dokter" name="Username_Dokter" hidden="">
                            </div>
                            <div class="form-group">
                                <label for="nama"> Jam </label>
                                <input type="time" class="form-control" id="jam" name="jam" readonly>
                            </div>
                            <div class="form-group">
                                <label for="text"> Tanggal </label>
                                <input type="date" class="form-control" id="Tanggal" name="Tanggal" readonly>
                            </div>

                            <div class="form-group">
                                <label for="text">Penyakit</label>
                                <input type="text" class="form-control" id="Penyakit" name="Penyakit">
                                <small class="form-text text-danger"><?= form_error('Penyakit') ?>.</small>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script type="text/javascript">
        loadData();
        
        $(document).on("click",".select",function(){
            var idjadwal=$(this).attr("id");
            
            $.ajax({
                type    : "POST",
                data    : "idjadwal="+idjadwal,
                url     : "http://localhost/Pemrograman-Web/DoctorCare/index.php/C_Pasien/fetchJadwalKosong",
                success: function(result){
                    var resultObj = JSON.parse(result);
                    $("[name='idjadwal']").val(resultObj.idjadwal);
                    $("[name='nama']").val(resultObj.nama);
                    $("[name='Username_Dokter']").val(resultObj.Username_Dokter);
                    $("[name='jam']").val(resultObj.jam);
                    $("[name='Tanggal']").val(resultObj.tanggal);
                }
            });    
        });
        
        function loadData(){
            var dataHandler = $("#here");
            dataHandler.html("");
            $.ajax({
            type    : "GET",
            data    : "",
            url     : "http://localhost/Pemrograman-Web/DoctorCare/index.php/C_Pasien/getJadwalKosong",
            success: function(result){
                var resultObj = JSON.parse(result);
                var dataHandler = $("#here");

                $.each(resultObj,function(key,val){

                    var newRow= $("<tr>");
                    newRow.html("<td class=\"text-center\">"+val.nama+"</td>"+
                                "<td class=\"text-center\">"+val.jam+"</td>"+
                                "<td class=\"text-center\">"+val.tanggal+"</td>"+
                                "<td class=\"text-center\"><button class='select' type = 'button' id='"+val.idjadwal+"'>Select</button></td>");
                    dataHandler.append(newRow);
                })
            }
            });
        }
    </script>

    <?php 
        $this->load->view('template/navbar');
        $this->load->view('template/back'); 
        $this->load->view('template/footer');?>
</body>
</html>