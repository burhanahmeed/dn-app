<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

	<title><?= $title ?></title>
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
				<li class="gbr">Gambar</li>
				<li><a href="<?= base_url()?>dashboard">Dashboard</a></li>
				<li><a href="<?= base_url()?>competition">My Competition</a></li>
			</ul>
		</div>
		<div class="nav-app right">
			<ul>
				<li><a class="1234" href="#" toggle="drop"><?= $this->session->userdata('login')['email'];?></a></li>
			</ul>
			<div class="dropdwn" id="123">
				<li><a href="">Change Password</a></li>
				<li><a href="<?= base_url()?>Auth/logout">Logout</a></li>
			</div>
		</div>
	</nav>
	<!-- Separate -->
	<div class="content-dalam row">