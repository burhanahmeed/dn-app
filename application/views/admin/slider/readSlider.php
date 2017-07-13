<!--  page-wrapper -->
        <div id="page-wrapper">


            <div class="row">

                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Slider</h1>
                </div>
                 <!-- end  page header -->
                 <?php echo $this->session->flashdata('suksesslider'); ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kitchen Sink
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>id_slider</th>
                                            <th>Header 1</th>
                                            <th>Header 2</th>
                                            <th>Link</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($slider as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['id_slider'] ?></td>
                                            <td><?php echo $row['header1'] ?></td>
                                            <td><?php echo $row['header2'] ?></td>
                                            <td><?php echo $row['link'] ?></td>
                                            <td><?php echo '<img src="'.base_url().$row['gambar'].'" width="100px">'; ?></td>
                                            <td> <?php echo '<a href="'.base_url().'admin/slider/editView/'.$row['id_slider'].'"
                                            role="button" class="btn btn-warning">Edit</a>
                                            <a href="'.base_url().'admin/slider/hapusSlider/'.$row['id_slider'].'"
                                            role="button" class="btn btn-danger">Hapus</a>'; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>
        <!-- end page-wrapper -->
