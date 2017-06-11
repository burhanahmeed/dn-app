<div class="intro col-md-12 col-sm-12">
	<div class="container">
		<div class="ileft">
			<h3>Userlogin : <?= $this->session->userdata('login')['email'];?></h3>
			<h4>Date register : <?= date('F jS, Y H:i',strtotime($this->session->userdata('login')['date']));?></h4>
		</div>
		<div class="iright">
			<h3 id="qwe"></h3>
		</div>
	</div>
</div>
<div class="ann col-md-12 col-sm-12">
	<div class="container">
		<h3>Announcements</h3>
		<div class="table-responsive">
			<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Date</th>
			        <th>Information</th>
			        <th>Link</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>22 jun 2013</td>
			        <td>Rulebook Business Plan v1.0</td>
			        <td><a href="">Download</a></td>
			      </tr>
			    </tbody>
			  </table>
		</div>
	</div>
</div>
<div class="isi col-sm-12 col-md-12">
	<div class="container">
		<div class="content-b">
			<h3>Your Competition</h3>
 
			<?php if ($bp==0 && $db==0 && $cc==1) { ?>
				<div class="comp-b cercer">
				<p>Cerdas Cermat Competition</p>
					<h4>Team : <?= $cercer->nama_tim ; ?></h4>
					<h5>Status : <?= $cercer->status?></h5>
				</div>
			<?php }elseif ($bp==1 && $db==0) { ?>
				<div class="comp-b bisplan">
				<p>Business Plan</p>
					<h4>Team : <?= $bisplan->nama_tim ; ?></h4>
					<h5>Status : <?= $bisplan->status?></h5>
				</div>
			<?php }elseif ($bp==0 && $db==1) { ?>
				<div class="comp-b debat">
				<p>Debate Competition</p>
					<h4>Team : <?= $debat->nama_tim ; ?></h4>
					<h5>Status : <?= $debat->status?></h5>
				</div>
			<?php }elseif ($bp==1 && $db==1) { ?>
				<div class="comp-b bisplan">
				<p>Business Plan</p>
					<h4>Team : <?= $bisplan->nama_tim ; ?></h4>
					<h5>Status : <?= $bisplan->status?></h5>
				</div>
				<div class="comp-b debat">
				<p>Debate Competition</p>
					<h4>Team : <?= $debat->nama_tim ; ?></h4>
					<h5>Status : <?= $debat->status?></h5>
				</div>
			<?php } ?>
		</div>
	</div>
</div>