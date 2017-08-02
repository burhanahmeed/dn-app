<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

	<title><?= $title ?></title>
	
	<link rel="icon" href="<?php echo base_url()?>aset/img/dnlogo.png" type="image/gif">

	<!-- bootstrap/library css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>aset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>aset/font-awesome/css/font-awesome.min.css">
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>aset/css/dn-app.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Questrial" />
</head>
<body>
	<nav>
		<div class="toggleNav">
			<a style="cursor: pointer;">MENU</a>
		</div>
		<div class="nav-app resposive">
			<ul>
				<li class="gbr"><img src="<?= base_url()?>aset/img/dnlogo.png"></li>
				<li><a href="<?= base_url()?>dashboard">Dashboard</a></li>
				<li><a href="<?= base_url()?>competition">My Competition</a></li>
			</ul>
		</div>
		<div class="nav-app right">
			<ul>
				<li><a class="1234 a234" href="#" toggle="drop"><?= $this->session->userdata('login')['email'];?></a><a class="1234 a321" href="#" toggle="drop"><span class=" 	glyphicon glyphicon-user"></span></a></li>
			</ul>
			<div class="dropdwn" id="123">
				<li><a href="#" data-toggle="modal" data-target="#chgpass">Change Password</a></li>
				<li><a href="<?= base_url()?>Auth/logout">Logout</a></li>
			</div>
		</div>
	</nav>
	<!-- Separate -->
	<div class="content-dalam row">


	<!--start change password -->
	<!-- forgot pass Modal -->
<div id="chgpass" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 104px;
z-index: 9999;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: green; color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body row">

        <form action="<?= base_url()?>Auth/changePassword" method="POST" style="width: 280px; margin: auto;">
			<div class="form-group">
				<input class="form-control dn-form-control" type="password" name="pass" placeholder="New Password">
			</div>
			<div class="form-group">
				<input class="form-control dn-form-control" type="password" name="cpass" placeholder="Comfirm Password">
			</div>
			<div class="form-group" style="float: right;">
				<input style="width: 70px" class="btn dn-btn-def" type="submit" name="" value="Save">
			</div>
		</form>
      </div>
    </div>

  </div>
</div>

	<!-- end here -->

<!-- change pass notification -->
<?php
			if ($this->session->flashdata('errchg')) {
				echo '<div class="alert alert-danger position alert-dismissable" style="position:fixed">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  '.$this->session->flashdata('errchg').'
						</div>';
			}elseif ($this->session->flashdata('succhg')) {
				echo '<div class="alert alert-success position alert-dismissable" style="position:fixed">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  '.$this->session->flashdata('succhg').'
					</div>';
			}
			?>