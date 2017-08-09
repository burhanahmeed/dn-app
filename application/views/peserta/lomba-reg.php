<div class="comp">
<h3>MY COMPETITIONS</h3>
	<div class="container">

	<?php if ($bp==0 && $db==0 && $cc==1) {?>
		<h4>Siswa SMA/SMK/MA/Sederajat</h4><span class="border"></span>
		<div class="sep row">
			<div class="col-md-6 col-sm-6">
				<div class="comp-b cercer-d hg">
					<h4>Economy and Cooperative Competition</h4>
					<img src="http://pestarakyatfisika.com/assets/img/logo/co-sd-lcc.png">
					<div class="join">
					<div class="form-group">
						<a target="blank" href="http://kusia.ga/RULEBOOKCERCER" class="btn dn-btn-white">Download Rulebook</a>
					</div>
						<a href="competition/cercer" class="btn dn-btn-white">Open</a>
					</div>
				</div>
			</div>
		</div>

	<?php }else if(($bp==1 || $db==1) && $cc==0) {?>

		<h4>Mahasiswa S1/D3/D4/Sederajat</h4><span class="border"></span>
		<div class="sep row">
			<div class="col-md-6 col-sm-6">
				<div class="comp-b bisplan-d hg">
					<h4>Business Plan Competition</h4>
					<img src="<?= base_url()?>aset/img/bplogo.png"">
					<div class="join">
					<div class="form-group">
						<a target="blank" href="http://kusia.ga/RULEBOOKBISPLAN" class="btn dn-btn-white">Download Rulebook</a>
					</div>
					<?php if ($bp==1) {?>
						<a href="competition/bisplan" class="btn dn-btn-white">Open</a>
					<?php }elseif ($bp==0) {?>
						<?php if (strtotime(date('Y-m-d H:i:s'))<strtotime(date('2017-08-20 23:59:00'))){echo "Sorry, Registration haven't opened";}else if (strtotime(date('Y-m-d H:i:s'))>strtotime(date('2017-10-20 23:59:00'))) {?>
							<p>Registration has been closed</p>
						<?php }else{?>
							<a href="<?= base_url()?>register/bisplan" class="btn dn-btn-white">Register</a>
						<?php }?>
					<?php } ?>
						
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="comp-b debat-d hg">
					<h4>Economy and Cooperation (EnC) Debate Competition</h4>
					<img src="<?= base_url()?>aset/img/enclogo.png"">
					<div class="join">
					<div class="form-group">
						<a target="blank" href="http://kusia.ga/RULEBOOKDEBAT" class="btn dn-btn-white">Download Rulebook</a>
					</div>
					<?php if ($db==1) {?>
						<a href="competition/debat" class="btn dn-btn-white">Open</a>
					<?php }elseif ($db==0) {?>
						<?php if (strtotime(date('Y-m-d H:i:s'))>strtotime(date('2017-10-20 23:59:00'))) {?>
							<p>Registration has been closed</p>
						<?php }else{?>
							<a href="<?= base_url()?>register/debat" class="btn dn-btn-white">Register</a>
						<?php }?>
					<?php } ?>

					</div>
				</div>
			</div>
		</div>
	<?php } elseif ($bp==0 && $db==0 && $cc==0 && $kof==1) {?>

		<h4>Mahasiswa S1/D3/D4/Sederajat</h4><span class="border"></span>
		<div class="sep row">
			<div class="col-md-6 col-sm-6">
				<div class="comp-b bisplan-d hg">
					<h4>Business Plan Competition</h4>
					<img src="<?= base_url()?>aset/img/bplogo.png"">
					<div class="join">
					<div class="form-group">
						<a target="blank" href="http://kusia.ga/RULEBOOKBISPLAN" class="btn dn-btn-white">Download Rulebook</a>
					</div>
					<?php if ($bp==1) {?>
						<a href="competition/bisplan" class="btn dn-btn-white">Open</a>
					<?php }elseif ($bp==0) {?>
						<?php if (strtotime(date('Y-m-d H:i:s'))<strtotime(date('2017-08-20 23:59:00'))){echo "Sorry, Registration haven't opened";}else if (strtotime(date('Y-m-d H:i:s'))>strtotime(date('2017-10-20 23:59:00'))) {?>
							<p>Registration has been closed</p>
						<?php }else{?>
							<a href="<?= base_url()?>register/bisplan" class="btn dn-btn-white">Register</a>
						<?php }?>
					<?php } ?>
						
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="comp-b debat-d hg">
					<h4>Economy and Cooperation (EnC) Debate Competition</h4>
					<img src="<?= base_url()?>aset/img/enclogo.png"">
					<div class="join">
					<div class="form-group">
						<a target="blank" href="http://kusia.ga/RULEBOOKDEBAT" class="btn dn-btn-white">Download Rulebook</a>
					</div>
					<?php if ($db==1) {?>
						<a href="competition/debat" class="btn dn-btn-white">Open</a>
					<?php }elseif ($db==0) {?>
						<?php if (strtotime(date('Y-m-d H:i:s'))>strtotime(date('2017-10-20 23:59:00'))) {?>
							<p>Registration has been closed</p>
						<?php }else{?>
							<a href="<?= base_url()?>register/debat" class="btn dn-btn-white">Register</a>
						<?php }?>
					<?php } ?>

					</div>
				</div>
			</div>
		</div>

		<h4>Siswa SMA/SMK/MA/Sederajat</h4><span class="border"></span>
		<div class="sep row">
			<div class="col-md-6 col-sm-6">
				<div class="comp-b cercer-d hg">
					<h4>Economy and Cooperative Competition</h4>
					<img src="http://pestarakyatfisika.com/assets/img/logo/co-sd-lcc.png">
					<div class="join">
					<div class="form-group">
						<a target="blank" href="http://kusia.ga/RULEBOOKCERCER" class="btn dn-btn-white">Download Rulebook</a>
					</div>
					<?php if ($cc==1) {?>
						<a href="competition/cercer" class="btn dn-btn-white">Open</a>
					<?php }elseif ($cc==0) {?>
						<?php if (strtotime(date('Y-m-d H:i:s'))>strtotime(date('2017-10-05 23:59:00'))) {?>
							<p>Registration has been closed</p>
						<?php }else{?>
							<a href="<?= base_url()?>register/cercer" class="btn dn-btn-white">Register</a>
						<?php }?>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>

<?php	} ?>

<h4>Umum</h4><span class="border"></span>
		<div class="sep row">
			<div class="col-md-6 col-sm-6">
				<div class="comp-b cercer-d hg">
					<h4>Kompetisi Film Dokumenter</h4>
					<img src="http://www.pngpix.com/wp-content/uploads/2016/10/PNGPIX-COM-Film-Reel-PNG-Transparent-Image-2.png">
					<div class="join">
					<div class="form-group">
						<a target="blank" href="http://kusia.ga/RULEBOOKKOFID" class="btn dn-btn-white">Download Rulebook</a>
					</div>
					<?php if ($kof==1) {?>
						<a href="competition/kofid" class="btn dn-btn-white">Open</a>
					<?php }elseif ($kof==0) {?>
						<?php if (strtotime(date('Y-m-d H:i:s'))>strtotime(date('2017-10-05 23:59:00'))) {?>
							<p>Registration has been closed</p>
						<?php }else{?>
							<a href="<?= base_url()?>register/kofid" class="btn dn-btn-white">Register</a>
						<?php }?>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>