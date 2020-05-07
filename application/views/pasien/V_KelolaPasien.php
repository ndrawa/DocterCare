<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DoctorCare</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatables/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatables/css/dataTables.bootstrap4.css'?>">

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
	  
    <link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">

</head>
<body>

  	<div class="container" style="height: 120vh; position: relative; margin-top: 110px;">
    		<center><h1> Kelola Akun Pasien</h1></center>
    		<br> <br>
    		<img src="<?= base_url(); ?>/assets/datatables/images/pasien1.jpg">
    		<br> <br>
    		<h3>Akun Pasien</h3>

    		<button class="btn btn-success" onclick="show_edit()"><i class="glyphicon glyphicon-plus"></i>Edit Data</button>
    		<br>
    		<br> 

    		<table id="table_id" class="table table-bordered table table-hover">

      			<tbody>
          			<?php
          			foreach ($pasien as $Pasien) {
          				  if ($Pasien->username == $this->session->userdata('session_username')) {
          			?>
          			<tr>
            				<th width="600px">Nama</th>
            				<th><?php echo $Pasien->nama ;?></th>
          			</tr>
          			<tr>
            				<th>Jenis Kelamin</th>
            				<th><?php echo $Pasien->jeniskelamin ;?></th>
          			</tr>
          			<tr>
            				<th>Alamat</th>
            				<th><?php echo $Pasien->alamat ;?></th>
          			</tr>
          			<tr>
            				<th>Email</th>
            				<th><?php echo $Pasien->email ;?></th> 
          			</tr>
          			<tr>
            				<th>Telepon</th>
            				<th><?php echo $Pasien->telp ;?></th>
          			</tr>
          			
      		  </tbody>
  		  </table>
   	<center> 
        <button type="button" class="btn btn-danger" onclick="show_delete()">  HAPUS AKUN ANDA </button>
    </center>
  	</div>
  	<?php 
    		$this->load->view('template/navbar');
    		$this->load->view('template/back');
    		$this->load->view('template/footer');
  	?>

    <!-- MODAL EDIT -->
    <form>
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-100 w-75" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Nama</label>
                          <div class="col-md-10">
                              <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="Nama Lengkap" value="<?php echo $this->session->userdata('session_nama'); ?>">
                          </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                        <?php 
                        if ($Pasien->jeniskelamin == 'Laki-laki'){ ?>
                            <input type="radio" id="jeniskelamin_edit" name="jeniskelamin_edit" <?php echo 'checked="checked"' ?> value="Laki-laki"/>Laki-Laki<br>
                            <input type="radio" id="jeniskelamin_edit" name="jeniskelamin_edit" value="Perempuan"/>Perempuan<br>
                        <?php 
                        } else if ($Pasien->jeniskelamin == 'Perempuan'){ ?>
                            <input type="radio" id="jeniskelamin_edit" name="jeniskelamin_edit" value="Laki-laki"/>Laki-Laki<br>
                            <input type="radio" id="jeniskelamin_edit" name="jeniskelamin_edit" <?php echo 'checked="checked"' ?> value="Perempuan"/>Perempuan<br>
                        <?php 
                        } else { ?>
                            <input type="radio" id="jeniskelamin_edit" name="jeniskelamin_edit" value="Laki-laki"/>Laki-Laki<br>
                            <input type="radio" id="jeniskelamin_edit" name="jeniskelamin_edit" value="Perempuan"/>Perempuan<br>
                        <?php 
                        } ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                            <input type="text" name="alamat_edit" id="alamat_edit" class="form-control" placeholder="Alamat Lengkap" value ="<?php echo $Pasien->alamat ;?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="example@gmail.com" value ="<?php echo $Pasien->email ;?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Telepon</label>
                        <div class="col-md-10">
                            <input type="text" name="telp_edit" id="telp_edit" class="form-control" placeholder="ex: 089999999999" value ="<?php echo $Pasien->telp ;?>">
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
                <?php
                       }
                    }
                ?>
            </div>
        </div>
    </form>
    <!--END MODAL EDIT-->

    <!--MODAL DELETE-->
    <form>
        <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center> <strong>Apakah anda yakin ingin menghapus akun?</strong>
                        <p> Tindakan ini tidak akan bisa dibatalkan </br> 
                        Anda juga akan menghapus seluruh jadwal temu yang sudah anda buat </p> </center>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="username_delete" id="username_delete" class="form-control">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                        <button type="button" type="submit" id="btn_delete" class="btn btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL DELETE-->
 
<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery-3.5.0.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/js/dataTables.bootstrap4.js'?>"></script>
 
<script type="text/javascript">
    function show_edit() {
        $('#Modal_Edit').modal('show');
    }

    function show_delete() {
    	$('#Modal_Delete').modal('show');
    }

    $(document).ready(function(){ 
      
        //update record to database
         $('#btn_update').on('click',function(){
            var nama         = $('#nama_edit').val();
            var jeniskelamin = $('input:radio[name=jeniskelamin_edit]:checked').val();
            var alamat       = $('#alamat_edit').val();
            var email        = $('#email_edit').val();
            var telp         = $('#telp_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pasien/update')?>",
                dataType : "JSON",
                data : {nama:nama , jeniskelamin:jeniskelamin, alamat:alamat, email:email, telp:telp},
                success: function(data){
                    $('[name="nama_edit"]').val("");
                    $('[name="jeniskelamin_edit"]').val("");
                    $('[name="alamat_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="telp_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    location.reload();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var username = $(this).data('username');
             
            $('#Modal_Delete').modal('show');
            $('[name="username_delete"]').val(username);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pasien/delete')?>",
                dataType : "JSON",
                success: function(result){
                    $('#Modal_Delete').modal('hide');
                    location.reload();
                    location.href='<?php echo base_url().'index.php/login/logout'?>';
                }
            });
            return false;
        });
 
    });
 
</script>
</body>
</html>