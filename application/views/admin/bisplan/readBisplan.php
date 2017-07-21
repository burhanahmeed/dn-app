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
                          <a href="<?php echo base_url('admin/bisplan/export_excel') ?>" class="btn btn btn-primary btn-sm button-gray"> Download EXCEL </a>
                        </div> <br> <br>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Tim</th>
                                            <th>Asal Instansi</th>
                                            <th>Nama Ketua</th>
                                            <th>Status</th>
                                            <th>Semifinal</th>
                                            <th>Kontak</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bisplan as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['uid'] ?></td>
                                            <td><?php echo $row['nama_tim'] ?></td>
                                            <td><?php echo $row['asal_univ'] ?></td>
                                            <td><?php echo $row['ketua'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td><?php echo $row['semifinal'] ?></td>
                                            <td><?php echo $row['kontak'] ?></td>
                                            <td><?php echo '<a href="'.base_url().'admin/bisplan/editView/'.$row['uid'].'"
                                            role="button" class="btn btn-warning">Edit</a>'; ?></td>
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
