<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Slider</h1>
        </div>
        <!--end page header -->
        <?php echo $this->session->flashdata('gagalslider'); ?>
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
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/slider/createSlider" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Slider</label>
                                    <input style="width:60px" class="form-control" name="id_slider" required>
                                    <p class="help-block">ID Slider tidak boleh ada yang sama</p>
                                </div>
                                <div class="form-group">
                                    <label>Header 1</label>
                                    <input class="form-control" name="header1" required placeholder="Tulisan Besar">
                                </div>
                                <div class="form-group">
                                    <label>Header 2</label>
                                    <input class="form-control" name="header2" placeholder="Tulisan Kecil">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input class="form-control" name="link" placeholder="Hyperlink">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" required name="gambar">
                                </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <textarea class="form-control" name="konten" rows="15"></textarea>
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
