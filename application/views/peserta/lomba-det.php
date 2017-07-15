<div class="dett">
	<div class="col-md-12 col-sm-12">
		<div class="container">
			<div class="comp-b bisplan-d padd row">
				<h4>BUSINESS PLAN COMPETITION</h4>
				<div class="col-md-6 col-sm-6">
					<div class="row">
						<h3>Team : <?= $bisplan->nama_tim ?></h3>
						<h4>Team Code : <?= $bisplan->id ?></h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="row">
						<h4>Team Status : <?= $bisplan->status ?></h4>
						<small>*Please upload your identity card and payment to get your status verified</small>
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="table-responsive res">
						<table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>#</th>
						        <th>Nama Anggota</th>
						        <th>NIM</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>1</td>
						        <td><?= $bisplan->ketua ?></td>
						        <td><?= $bisplan->nim_ketua ?></td>
						      </tr>
						      <tr>
						        <td>2</td>
						        <td><?= $bisplan->anggota1 ?></td>
						        <td><?= $bisplan->nim_a1 ?></td>
						      </tr>
						      <?php if ($bisplan->anggota2==null) { ?>
						      	
						      <?php }else{ ?>
						      	<tr>
							        <td>3</td>
							        <td><?= $bisplan->anggota2 ?></td>
							        <td><?= $bisplan->nim_a2 ?></td>
							      </tr>
						      
						      	<?php } ?>						
						    </tbody>
						  </table>
					</div>
					<div class="asal">
						<h4><?= $bisplan->asal_univ ?></h4>
						<h4><?= $bisplan->kontak ?></h4>
						<small>Please contact administrator if you wish to update your data.</small>
					</div>
				</div>
			</div>
			<div class="ann" style="margin: 20px 0">
				<h3>Announcement (Busineess Plan)</h3>
				
					    <?php if (empty($announce)) { ?>
					    	<p>We don't have announcement for Business Plan Competition. Stay tuned coz anything will be here</p>
					    <?php }else{ ?>
				<div class="table-responsive res">
					<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Date</th>
					        <th>Detail</th>
					        <th>Link</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php foreach ($announce as $a) { ?>
					    	
						    <tr>
						        <td><?= date('F jS, Y H:i',strtotime($a->date)) ?></td>
						        <td><?= $a->desk ?></td>
						        <td><?php if ($a->link == null) {
						        	
						        }else{ ?>
						        	<a href="<?= $a->link?>">Here</a>
						        <?php } ?></td>
						    </tr>

					    	<?php } ?>
					    </tbody>
					</table>
				</div>
					    	<?php }?>
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

			<div class="upload-b">
			<h4>Verify Your Team</h4>
			<p>Upload data diri (KTM) masing anggota tim dan bukti transfer</p>
			<p>Format : </p>
			<p>DATA_TEAM CODE.zip</p>
			<p>BAYAR_TEAM CODE.jpg</p>
				<div class="upp">
				<label>Upload data diri (ZIP) (max 4MB)</label>

				<?php if (empty($bisplan->verifikasi)) { ?>
					<!-- kosong -->
				<?php }else{ ?>
					<p>Your latest uploaded file. <a style="color: white" href="<?= base_url()?>uploads/bisplan/<?= $bisplan->verifikasi ?>">CLICK HERE</a></p>
					<?php } ?>

					<form method="POST" action="<?= base_url()?>Uploader/upload_data/bisplan/<?= $bisplan->id ?>" enctype="multipart/form-data">
						<div class="form-group">
							<input type="file" name="datadiri" required="">
						</div>
						<div class="form-group">
							<button class="btn dn-btn-white">Upload</button>
						</div>
					</form>
				</div>
				<div class="upp">
				<label>Upload bukti pembayaran (jpeg/jpg/png) (max 4MB)</label>
					
				<?php if (empty($bisplan->pembayaran)) { ?>
					<!-- kosong -->
				<?php }else{ ?>
					<p>Your latest uploaded file. <a style="color: white" href="<?= base_url()?>uploads/bisplan/<?= $bisplan->pembayaran ?>">CLICK HERE</a></p>
					<?php } ?>

					<form method="POST" action="<?= base_url()?>Uploader/upload_bayar/bisplan/<?= $bisplan->id ?>" enctype="multipart/form-data">
						<div class="form-group">
							<input required="" type="file" name="bayar">
						</div>
						<div class="form-group">
							<button class="btn dn-btn-white">Upload</button>
						</div>
					</form>
				</div>
			</div>
			<div class="upload-b row">
			<div class="col-md-6 col-sm-6">
				<h4><strong>Submission</strong></h4>
					<p>File format : BISPLAN_TEAM NAME_TEAM CODE.pdf</p>
					<div class="upp">
					<label>Submit Your Work (Max 20MB)</label>

						<?php
						 if (empty($submission->path)) { ?>
						<!-- kosong -->
						<?php }else{ ?>
							<p>Your latest uploaded file. <a style="color: white" href="<?= base_url()?><?= $submission->path ?>">CLICK HERE</a></p>
						<?php } ?>

						<?php if ($bisplan->st == 4) { ?>
							<form method="POST" action="<?= base_url()?>Uploader/submission/bisplan/<?= $bisplan->id ?>" enctype="multipart/form-data">
								<div class="form-group">
									<input required="" type="file" name="submission">
								</div>
								<div class="form-group">
									<button class="btn dn-btn-white">Submit</button>
								</div>
							</form>
						<?php }else{ ?>
							<h4>Please verify you identity and payment.</h4>
							<?php } ?>
					</div>
			</div>
					<?php if ($bisplan->semifinal == 1) { ?>
				<div class="col-md-6 col-sm-6">
					<h4><strong>Semi Final Submission</strong></h4>
					<p>File format : SEMIS_TEAM NAME_TEAM CODE.pdf</p>
					<div class="upp">
					<label>Submit Your Work (Max 20MB)</label>

						<?php
						 if (empty($semis->path)) { ?>
						<!-- kosong -->
						<?php }else{ ?>
							<p>Your latest uploaded file. <a style="color: white" href="<?= base_url()?><?= $semis->path ?>">CLICK HERE</a></p>
						<?php } ?>

							<form method="POST" action="<?= base_url()?>Uploader/semis/<?= $bisplan->id ?>" enctype="multipart/form-data">
								<div class="form-group">
									<input required="" type="file" name="submission">
								</div>
								<div class="form-group">
									<button class="btn dn-btn-white">Submit</button>
								</div>
							</form>
						</div>
					</div>
						<?php }else{ ?>
							<!-- kosong -->

							<?php } ?>

			</div>
		</div>
	</div>
</div>