<div class="comp">
<h3>MY COMPETITIONS</h3>
	<div class="container">

	<?php if ($bp==0 && $db==0 && $cc==1) {?>
		<h4>Siswa SMA/SMK/MA/Sederajat</h4><span class="border"></span>
		<div class="sep row">
			<div class="col-md-6 col-sm-6">
				<div class="comp-b cercer-d hg">
					<h4>Cerdas Cermat Competition</h4>
					<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/381701-200.png">
					<div class="join">
						<a href="competition/cercer" class="btn dn-btn-white">Open</a>
					</div>
				</div>
			</div>
		</div>

	<?php }else {?>

		<h4>Mahasiswa S1/D3/D4/Sederajat</h4><span class="border"></span>
		<div class="sep row">
			<div class="col-md-6 col-sm-6">
				<div class="comp-b bisplan-d hg">
					<h4>Business Plan Competition</h4>
					<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/381701-200.png">
					<div class="join">
					<?php if ($bp==1) {?>
						<a href="competition/bisplan" class="btn dn-btn-white">Open</a>
					<?php }elseif ($bp==0) {?>
						<a href="<?= base_url()?>register/bisplan" class="btn dn-btn-white">Register</a>
					<?php } ?>
						
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="comp-b debat-d hg">
					<h4>Debate Competition</h4>
					<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/381701-200.png">
					<div class="join">
					<?php if ($db==1) {?>
						<a href="competition/debat" class="btn dn-btn-white">Open</a>
					<?php }elseif ($db==0) {?>
						<a href="<?= base_url()?>register/debat" class="btn dn-btn-white">Register</a>
					<?php } ?>

					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	</div>
</div>