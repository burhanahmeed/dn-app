<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit Slider</h1>
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
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/slider/editSlider/<?php echo $edit['id_slider']?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Slider</label>
                                    <input style="width:60px" class="form-control" disabled value="<?php echo $edit['id_slider']?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Header 1</label>
                                    <input class="form-control" name="header1" value="<?php echo $edit['header1']?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Header 2</label>
                                    <input class="form-control" name="header2" value="<?php echo $edit['header2']?>">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input class="form-control" name="link" value="<?php echo $edit['link']?>">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" value="<?php echo $edit['gambar']?>" name="gambar">
                                </div>

                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <textarea class="form-control" name="konten" rows="14"><?php echo $edit['konten']?></textarea>
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
