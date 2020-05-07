<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">
		
		<title>Login</title>
	</head>
	<?php $this->session->sess_destroy(); ?>
	<body class ="body">
		<form action="<?= site_url('login/auth') ?>" method="post" id="LoginForm">
			<h2>Login</h2>
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
				<input type="text" id="username" class="form-control" name="username" placeholder="Username" required>
			</div>
			<div class="form-group">
				<input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
			<p>Don't have an account? Register <a href="<?= site_url('register/index') ?>">here</a></p>
		</form>
		<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
	</body>
</html>