<?php 
	$dl = date('2017-11-05 23:59:00');
	$semis = date('2017-08-28 12:20:00');
?>
<div class="dett">
	<div class="col-md-12 col-sm-12">
		<div class="container">
			<div class="comp-b cercer-d padd row">
				<h4>KOMPETISI FILM DOKUMENTER</h4>
				<div class="col-md-6 col-sm-6">
					<div class="row">
						<h3>Team : <?= $bisplan->nama_tim ?></h3>
						<h4>Team Code : <?= $bisplan->id ?></h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="row">
						<h4>Nama Ketua : <?= $bisplan->ketua ?></h4>
						<h5>Nomor Ketua : <?= $bisplan->nim_ketua ?></h5>
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="asal">
						<h4>Instansi : <?= $bisplan->asal_univ ?></h4>
						<h4>Kontak : <?= $bisplan->kontak ?></h4>
						<h4>Alamat : <?= $bisplan->alamat ?></h4>
						<small>Please contact administrator if you wish to update your data.</small>
					</div>
				</div>
			</div>

			<?php
			if ($this->session->userdata('errUp')) {
				echo '<div class="alert alert-danger position alert-dismissable" style="position:fixed">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  '.$this->session->userdata('errUp').'
						</div>';
			}elseif ($this->session->userdata('succUp')) {
				echo '<div class="alert alert-success position alert-dismissable" style="position:fixed">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  '.$this->session->userdata('succUp').'
					</div>';
			}
			?>

			<div class="col-md-12 col-sm-12">
				<div class="upload-b">
				<h4><strong>Submission</strong></h4>
					<p>Submit link video anda pada kolom dibawah ini.</p>
					<div class="upp">
					<label>Enter Your Link Submission</label>

						<?php
						 if (empty($bisplan->submission)) { ?>
						
						<?php }else{ ?>
							<p>Your latest uploaded file. <a style="color: white" href="<?= $bisplan->submission ?>"><?= $bisplan->submission ?></a></p>
						<?php } ?>
							<?php if (strtotime(date('Y-m-d H:i:s'))>strtotime('2017-11-05')) {?>
								<p style="color: red;font-weight: bold;">Batas submit sudah terlewati</p>
							<?php }else{?>
							<form method="POST" action="<?= base_url()?>Uploader/submission/kofid/<?= $bisplan->id ?>" enctype="multipart/form-data">
								<div class="form-group">
									<input class="form-control" required="" type="text" name="link" placeholder="Masukkan Link Disini">
								</div>
								<div class="form-group">
									<textarea placeholder="Masukkan Tema dan Penjelasan Disini" class="form-control" name="desk"></textarea>
								</div>
								<div class="form-group">
									<button class="btn dn-btn-white">Submit</button>
								</div>
							</form>
							<?php }?>
							<style type="text/css">
								.upp{
									width: 95%;
								}
								.upp textarea{
									max-width: 100%;
									min-width: 100%;
									min-height: 200px;
								}
							</style>

					</div> 
				</div>				
			</div>

		</div>
	</div>
</div>