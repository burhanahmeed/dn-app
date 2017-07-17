<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

	<title>Please login</title>
	<!-- bootstrap/library css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>aset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>aset/font-awesome/css/font-awesome.min.css">
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>aset/css/dn-app.css">
</head>
<body>
	<section>
	<!-- navbar -->
		<div class="nav">
			<a class="btn dn-btn-std" style="border: none;padding:10px; " href="#"><i class="fa fa-angle-left"></i> Back</a>
			<a class="register" href="#" data-toggle="modal" data-target="#myModal"><h4>Register</h4></a>
		</div>
		<!-- form -->
	<?php
	if ($this->session->userdata('errRegis')) {
		echo '<div class="alert alert-danger position alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  '.$this->session->userdata('errRegis').'
				</div>';
	}elseif ($this->session->userdata('sucRegis')) {
		echo '<div class="alert alert-success position alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  '.$this->session->userdata('sucRegis').'
			</div>';
	}
	?>
		<div class="section">
			<div class="col-md-6 col-sm-6 onhidden">
				<div class="angin" style="border-right: 1px grey solid">
					<img src="<?= base_url()?>aset/img/dnlogo.png">
					<h3>Diesnatalis Kopma ITS 35</h3>
					<h5>All Event in One Account</h5>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="angin">
					<h3>Login to DN35</h3>
					<span class="border"></span>
					<div class="form-outter">
						<form action="<?= base_url()?>Auth/do_login" method="POST">

						<?php if ($this->session->userdata('errLogin')) { ?>
						<div class="notify">
							<?= $this->session->userdata('errLogin');?>
							<span class="close">&times;</span>
						</div>

						<?php }?>
							<div class="form-group">
								<input class="form-control dn-form-control" type="email" name="email" placeholder="email">
							</div>
							<div class="form-group">
								<input class="form-control dn-form-control" type="password" name="pass" placeholder="password">
							</div>
							<div class="form-group" style="float: right;">
								<input style="width: 70px" class="btn dn-btn-def" type="submit" name="submit" value="Login">
							</div>
							Don't have account?<a href="#" data-toggle="modal" data-target="#myModal"> Register</a>
						</form>
					</div>
					<a href="#" data-toggle="modal" data-target="#forgot" style="text-align: center; margin: auto; display: block;">Forget Password?</a>
				</div>
			</div>
		</div>
	</section>
		<div style="padding: 10px ; bottom: 10px;right: 10px">
			Developed by ITDEV Kopma ITS	
		</div>
</body>

<!-- bootstrap js / ;ibrary -->
<script type="text/javascript" src="<?= BASE_URL()?>aset/js/jquery.js"></script>
<script type="text/javascript" src="<?= BASE_URL()?>aset/js/bootstrap.min.js"></script>

</html>

<!-- register Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: green; color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register to DN35</h4>
      </div>
      <div class="modal-body row">
        <form action="<?= base_url()?>Auth/do_register" method="POST" style="width: 280px; margin: auto;">
			<div class="form-group">
				<input class="form-control dn-form-control" type="email" name="emails" placeholder="Email">
			</div>
			<div class="form-group">
				<input class="form-control dn-form-control" type="password" name="pass" placeholder="Password">
			</div>
			<div class="form-group">
				<input class="form-control dn-form-control" type="password" name="cpass" placeholder="Confirm password">
			</div>
			<div class="form-group" style="float: right;">
				<input style="width: 70px" class="btn dn-btn-def" type="submit" name="" value="Signup">
			</div>
		</form>
      </div>
    </div>

  </div>
</div>

<!-- forgot pass Modal -->
<div id="forgot" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: green; color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forget Password</h4>
      </div>
      <div class="modal-body row">

        <form action="<?= base_url()?>Auth/forgot" method="POST" style="width: 280px; margin: auto;">
        <label>Input Your Login Email</label>
			<div class="form-group">
				<input class="form-control dn-form-control" type="email" name="emails" placeholder="Email">
			</div>
			<div class="form-group" style="float: right;">
				<input style="width: 70px" class="btn dn-btn-def" type="submit" name="" value="Reset">
			</div>
		</form>
      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){
	$('span.close').click(function(){
		$('div.notify').remove();
	})
});
</script>