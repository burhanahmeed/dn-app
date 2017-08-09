<!--  page-wrapper -->
        <div id="page-wrapper">


            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Peserta Lomba Bisplan
                        </div> <br>
                        <div class="col-sm-6">
                          <a href="<?php echo base_url('admin/kofid/export_excel') ?>" class="btn btn btn-primary btn-sm button-gray"> Download EXCEL </a>
                        </div> <br> <br>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>ID User</th>
                                            <th>Kode Tim</th>
                                            <th>Nama Tim</th>
                                            <th>Nama Ketua</th>
                                            <th>Link</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($kofid as $row) { $i++;?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['uid'] ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['nama_tim'] ?></td>
                                            <td><?php echo $row['ketua'] ?></td>
                                            <td><a href="<?php echo $row['submission'] ?>">CLICK</a></td>
                                            <td><a href="" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->
