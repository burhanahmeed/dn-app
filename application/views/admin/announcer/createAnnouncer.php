<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Announcer</h1>
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
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/announcer/createAnnouncer" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="jenis">Jenis:</label>
                                <select name="jenis" class="form-control" id="jenis">
                                  <option value="umum">Umum</option>
                                  <option value="debat">Debat</option>
                                  <option value="bisplan">Bisplan</option>
                                  <option value="cercer">Cercer</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input class="form-control" name="link" placeholder="Isinya pake http://">
                                </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" rows="5"></textarea>
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
