<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Stan</h1>
        </div>
        <!--end page header -->
        <?php echo $this->session->flashdata('gagalstan'); ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/stan/createStan" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Stan</label>
                                    <input style="width:100px" class="form-control" name="id_stan" required>
                                    <p class="help-block">ID Stan tidak boleh ada yang sama</p>
                                    <p class="help-block">Kode Stan: S-xxx</p>
                                </div>
                                <div class="form-group">
                                    <label>Nama Stan</label>
                                    <input class="form-control" name="nama_stan" required placeholder="Nama Produk">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Stan</label>
                                    <input class="form-control" name="gmap" required placeholder="Lokasi Stan GMAP">
                                </div>
                                <div class="form-group">
                                    <label>Gambar1</label>
                                    <input type="file" required name="gambar1">
                                </div>
                                <div class="form-group">
                                    <label>Gambar2</label>
                                    <input type="file" name="gambar2">
                                </div>
                                <div class="form-group">
                                    <label>Gambar3</label>
                                    <input type="file" name="gambar3">
                                </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <textarea required class="form-control" name="konten" rows="18"></textarea>
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
