<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Produk</h1>
        </div>
        <!--end page header -->
        <?php echo $this->session->flashdata('gagalproduk'); ?>
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
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/produk/createProduk" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Produk</label>
                                    <input style="width:100px" class="form-control" name="id_produk" required>
                                    <p class="help-block">ID Produk tidak boleh ada yang sama</p>
                                    <p class="help-block">Kode Lauk: PL-xx</p>
                                    <p class="help-block">Kode Makanan: PM-xx</p>
                                    <p class="help-block">Kode Minuman: PN-xx</p>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input class="form-control" name="nama_produk" required placeholder="Nama Produk">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" required name="gambar">
                                </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <textarea required class="form-control" name="konten" rows="15"></textarea>
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
