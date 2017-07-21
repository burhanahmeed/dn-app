<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit Peserta Debat</h1>
        </div>
        <!--end page header -->
        <?php echo $this->session->flashdata('gagalbisplan'); ?>
        <?php echo $this->session->flashdata('suksesbisplan'); ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/bisplan/editBisplan/<?php echo $edit['uid']?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Tim</label>
                                    <input class="form-control" value="<?php echo $edit['nama_tim']?>" required name="nama_tim">
                                </div>
                                <div class="form-group">
                                    <label>Asal Instansi</label>
                                    <input class="form-control" value="<?php echo $edit['asal_univ']?>" required name="asal_instansi">
                                </div>
                                <div class="form-group">
                                    <label>Ketua</label>
                                    <input class="form-control" value="<?php echo $edit['ketua']?>" required name="nama_ketua">
                                </div>
                                <div class="form-group">
                                    <label>NIM Ketua</label>
                                    <input class="form-control" value="<?php echo $edit['nim_ketua']?>" required name="nim_ketua">
                                </div>
                                <div class="form-group">
                                    <label>Anggota 1</label>
                                    <input class="form-control" value="<?php echo $edit['anggota1']?>" required name="anggota1">
                                </div>
                                <div class="form-group">
                                    <label>NIM Anggota 1</label>
                                    <input class="form-control" value="<?php echo $edit['nim_a1']?>" required name="nim_a1">
                                </div>
                                <div class="form-group">
                                    <label>Anggota 2</label>
                                    <input class="form-control" value="<?php echo $edit['anggota2']?>" required name="anggota2">
                                </div>
                                <div class="form-group">
                                    <label>NIM Anggota 2</label>
                                    <input class="form-control" value="<?php echo $edit['nim_a2']?>" required name="nim_a2">
                                </div>
                        </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                  <label>Kontak</label>
                                  <input class="form-control" required value="<?php echo $edit['kontak']?>" name="kontak">
                              </div>
                              <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control" id="status">
                                  <option value="1">Belum Bayar dan Belum Terverifikasi</option>
                                  <option value="2">Belum Bayar dan Sudah Terverifikasi</option>
                                  <option value="3">Sudah Bayar dan Belum Terverifikasi</option>
                                  <option value="4">Sudah Bayar dan Sudah Terverifikasi</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="semifinal">Semifinal:</label>
                                <select name="status" class="form-control" id="status">
                                  <option value="0">Tidak</option>
                                  <option value="1">Ya</option>
                                </select>
                              </div>
                              <div class="panel panel-primary">
                                  <div class="panel-heading">
                                      Kartu Identitas
                                  </div>
                                  <div class="panel-body">
                                      <p> <?php echo $edit['verifikasi']?> </p>
                                      <!-- <img src="<?php echo base_url().$edit['verifikasi']?>" width="255px" height="255px"> -->
                                  </div>
                                  <div class="panel-footer">
                                    <button class="btn btn-primary">Download</button>
                                  </div>
                              </div>
                              <div class="panel panel-primary">
                                  <div class="panel-heading">
                                      Bukti Pembayaran
                                  </div>
                                  <div class="panel-body">
                                      <p> <?php echo $edit['pembayaran']?> </p>
                                      <!-- <img src="<?php echo base_url().$edit['pembayaran']?>" width="255px" height="255px"> -->
                                  </div>
                                  <div class="panel-footer">
                                    <button class="btn btn-primary">Download</button>
                                  </div>
                              </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn btn-success">Reset Button</button>
                              </form>
                          </div>
                  </div>
                </div>
            </div>
             <!-- End Form Elements -->
        </div>
    </div>
</div>
<!-- end page-wrapper -->
