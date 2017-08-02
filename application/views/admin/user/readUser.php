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
                             Tabel User
                        </div> <br>
                        <div class="col-sm-6">
                          <a href="<?php echo base_url('admin/user/export_excel') ?>" class="btn btn btn-primary btn-sm button-gray"> Download EXCEL </a>
                        </div> <br> <br>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Debat</th>
                                            <th>Bisplan</th>
                                            <th>Cercer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php if ($row['debat']=='1') {
                                                echo 'Ya';
                                            }else{echo 'Tidak'; }?></td>
                                            <td><?php if ($row['bisplan']=='1') {
                                                echo 'Ya';
                                            }else{echo 'Tidak'; }?></td>
                                            <td><?php if ($row['cercer']=='1') {
                                                echo 'Ya';
                                            }else{echo 'Tidak'; }?></td>
                                            <td><?php echo '<a href="'.base_url().'admin/user/hapusUser/'.$row['id'].'"
                                            role="button" class="btn btn-danger">Hapus</a>'; ?></td>
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
