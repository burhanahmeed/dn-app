<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit Stan</h1>
        </div>
        <!--end page header -->
        <?php echo $this->session->flashdata('gagalstan'); ?>
        <?php echo $this->session->flashdata('suksesstan'); ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="row" style="padding-left: 20px; padding-top:20px; padding-right: 20px">
                     <!--Default Pannel, Primary Panel And Success Panel   -->
                    <div class="col-lg-4">
                        <form role="form" method="POST" action="<?php echo base_url()?>admin/stan/gambar1/<?php echo $edit['id_stan']?>" enctype="multipart/form-data">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Gambar 1
                            </div>
                            <div class="panel-body">
                                <img src="<?php echo base_url().$edit['gambar1']?>" width="255px" height="255px">
                            </div>
                            <div class="form-group">
                                <label>Gambar1</label>
                                <input required type="file" name="gambar1">
                            </div>
                            <div class="panel-footer">
                              <button type="submit" name="submit" class="btn btn-primary">Ganti</button>
                              </form>
                              <a style="float:right" href="<?php echo base_url()?>admin/stan/hapusgambar1/<?php echo $edit['id_stan']?>" type="button" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <form role="form" method="POST" action="<?php echo base_url()?>admin/stan/gambar2/<?php echo $edit['id_stan']?>" enctype="multipart/form-data">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Gambar 2
                            </div>
                            <div class="panel-body">
                                <img src="<?php echo base_url().$edit['gambar2']?>" width="255px" height="255px">
                            </div>
                            <div class="form-group">
                                <label>Gambar2</label>
                                <input required type="file" name="gambar2">
                            </div>
                            <div class="panel-footer">
                              <button type="submit" name="submit" class="btn btn-primary">Ganti</button>
                              </form>
                              <a style="float:right" href="<?php echo base_url()?>admin/stan/hapusgambar2/<?php echo $edit['id_stan']?>" type="button" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <form role="form" method="POST" action="<?php echo base_url()?>admin/stan/gambar3/<?php echo $edit['id_stan']?>" enctype="multipart/form-data">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Gambar 3
                            </div>
                            <div class="panel-body">
                                <img src="<?php echo base_url().$edit['gambar3']?>" width="255px" height="255px">
                            </div>
                            <div class="form-group">
                                <label>Gambar3</label>
                                <input required type="file" name="gambar3">
                            </div>
                            <div class="panel-footer">
                              <button type="submit" name="submit" class="btn btn-primary">Ganti</button>
                              </form>
                              <a style="float:right" href="<?php echo base_url()?>admin/stan/hapusgambar3/<?php echo $edit['id_stan']?>" type="button" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                      <!--End Default Pannel, Primary Panel And Success Panel   -->
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/stan/editStan/<?php echo $edit['id_stan']?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Stan</label>
                                    <input style="width:100px" class="form-control" value="<?php echo $edit['id_stan']?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Nama Stan</label>
                                    <input class="form-control" name="nama_stan" value="<?php echo $edit['nama_stan']?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Konten</label>
                                    <textarea required class="form-control" name="konten" rows="18"><?php echo $edit['konten']?></textarea>
                                </div>
                        </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                  <label>Lokasi Stan</label>
                                  <input class="form-control" name="gmap" required value="<?php echo $edit['gmap']?>">
                              </div>
                                <iframe src="<?php echo $edit['gmap']?>" width="450" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
