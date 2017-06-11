<div class="daff">
	<div class="container">
		<h3><?= $judul ?></h3>
		<span class="border"></span>
		<div class="input-frm">
			<form id="daftar" method="POST" action="<?= $url ?>">
				<div class="form-group">
				<label>Nama Tim</label>
					<input class="form-control dn-form-control" type="text" name="tim">
				</div>
				<div class="form-group">
				<label>Nama Anggota 1 (Ketua Tim)</label>
					<input class="form-control dn-form-control" type="text" name="nama1">
				</div>
				<div class="form-group">
				<label><?= $no?> Anggota 1 (Ketua Tim)</label>
					<input class="form-control dn-form-control" type="text" name="nim1">
				</div>
				<div class="form-group">
				<label>Nama Anggota 2</label>
					<input class="form-control dn-form-control" type="text" name="nama2">
				</div>
				<div class="form-group">
				<label><?= $no?> Anggota 2</label>
					<input class="form-control dn-form-control" type="text" name="nim2">
				</div>
				<div class="form-group">
				<label>Nama Anggota 3</label>
					<input class="form-control dn-form-control" type="text" name="nama3">
				</div>
				<div class="form-group">
				<label><?= $no?> Anggota 3</label>
					<input class="form-control dn-form-control" type="text" name="nim3">
				</div>
				<div class="form-group">
				<label>Asal <?= $sekolah?></label>
					<input class="form-control dn-form-control" type="text" name="asal">
				</div>
				<div class="form-group">
				<label>Kontak Ketua (No HP/LINE/WA)</label>
					<input class="form-control dn-form-control" type="text" name="kontak">
				</div>
				<div id="notifi"></div>
				<div class="form-group" style="text-align: center;">
					<button id="smt" type="submit" class="btn dn-btn-std">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>