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

    <title>Edit Jadwal Temu</title>

    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> </script> 
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card" style="position: relative; top: 90px;">
                    <div class="card-header text-center">
                        Form Edit Jadwal Temu
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Dokter</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Penyakit</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody id="here">
                                    
                                </tbody>
                            </table>
                            <div class="form-group">
                                <input type="text" class="form-control" id="id" name="id" hidden="">
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
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Edit Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script type="text/javascript">
        loadData();
        
        $(document).on("click",".select",function(){
            var id=$(this).attr("id");
            
            $.ajax({
                type    : "POST",
                data    : "id="+id,
                url     : "http://localhost/Pemrograman-Web/DoctorCare/index.php/C_Pasien/fetchJadwalTemu",
                success: function(result){
                    var resultObj = JSON.parse(result);
                    $("[name='id']").val(resultObj.id);
                    $("[name='nama']").val(resultObj.nama);
                    $("[name='username']").val(resultObj.Username_Dokter);
                    $("[name='jam']").val(resultObj.jam);
                    $("[name='Tanggal']").val(resultObj.Tanggal);
                    $("[name='Penyakit").val(resultObj.Penyakit);
                }
            });    
        }); 

        function loadData(){
            var dataHandler = $("#here");
            var username    = $(this).attr("Username_Pasien");
            dataHandler.html("");
            $.ajax({
            type    : "GET",
            data    : "username="+username,
            url     : "http://localhost/Pemrograman-Web/DoctorCare/index.php/C_Pasien/getJadwalTemu",
            success: function(result){
                var resultObj = JSON.parse(result);
                var dataHandler = $("#here");

                $.each(resultObj,function(key,val){

                    var newRow= $("<tr>");
                    newRow.html("<td>"+val.nama+"</td><td>"+val.jam+"</td><td>"+val.Tanggal+"</td><td>"+val.Penyakit+"</td><td><button class='select' type = 'button' id='"+val.id+"'>Select</button></td>");
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