<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">
		<title>Register</title>
	</head>
	<?php $this->session->sess_destroy(); ?>
	<body class="body">
		<form action="<?= site_url('register/register') ?>" method="post" id="LoginForm">
			<h2>Register</h2>
			<?php if($this->session->flashdata('message')) { ?>
			<div class="alert alert-danger" role="alert">
	            <?= $this->session->flashdata('message')?>
			</div>
			<?php } ?>

			<?php if(isset($error_message)) { ?>
			<div class="alert alert-danger" role="alert">
				<?= $error_message ?>
			</div>
			<?php } ?>
			<div class="form-group">
				<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" required>
			</div>
			<div class="form-group">
				<input type="text" id="username" class="form-control" name="username" placeholder="Username" required>
			</div>
			<div class="form-group">
				<input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
			</div>
			<div class="form-group">
				<input type="password" id="re-password" class="form-control" name="re-password" placeholder="Re-Enter Password" required>
			</div>
			<div class="form-group">
                <select class="form-control" id="kategori" name="kategori">
                    <option value="Dokter">Dokter</option>
                    <option value="Pasien">Pasien</option>
                </select>
            </div>
			<button type="submit" class="btn btn-primary">Register</button>
			<p>Already have an account? Login <a href="<?= site_url('login/index') ?>">here</a></p>
		</form>
		<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
	</body>
</html>