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
    
    <title> Hapus Jadwal Temu </title>
</head>
<body>
    <div class="container" style="position: relative; top: 100px;">
        <h2 class="text-center" style="margin: 10px;"> Hapus Jadwal Kosong</h2>
        <div class="container"  style="margin-top: 60px; margin-bottom: 330px;">
            <table class="table mt-5">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Username Dokter</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="here">
                    
                </tbody>
            </table>
            <table>
                 <tr>
                    <td><input type="text" name="idjadwal" hidden></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td id="error"></td>
                </tr>
            </table>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>

        <script type="text/javascript">
            
            loadData();
            $(document).on("click",".hapus",function(){
                var idjadwal=$(this).attr("id");
                $.ajax({
                    type : "POST",
                    data : "idjadwal="+idjadwal,
                    url : "http://localhost/Pemrograman-Web/DoctorCare/index.php/C_Dokter/deleteData",
                    success: function(result){
                        var resultObj = JSON.parse(result);
                        $("#error").html(resultObj.message);
                        loadData();
                    }
                });
            });

            function loadData(){
                var dataHandler = $("#here");
                dataHandler.html("");
                $.ajax({
                type : "GET",
                data : "",
                url : "http://localhost/Pemrograman-Web/DoctorCare/index.php/C_Dokter/getData",
                success: function(result){
                    var resultObj = JSON.parse(result);
                    var dataHandler = $("#here");

                    $.each(resultObj,function(key,val){

                        var newRow= $("<tr>");
                        newRow.html("<td class=\"text-center\">"+val.Username_Dokter+"</td><td class=\"text-center\">"+val.jam+"</td><td class=\"text-center\">"+val.Tanggal+"</td><td class=\"text-center\"><button class='hapus' id='"+val.idjadwal+"'>Hapus Data</button></td>");

                        dataHandler.append(newRow);
                    })
                }
                });
            }
        </script>
    <?php 
        $this->load->view('template/navbar');
        $this->load->view('template/back');
        $this->load->view('template/footer'); ?>
</body>
</html>