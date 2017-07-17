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
                             Tabel Announcer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Jenis</th>
                                            <th>Deskripsi</th>
                                            <th>Link</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($announcer as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['jenis'] ?></td>
                                            <td><?php echo $row['desk'] ?></td>
                                            <td><?php echo $row['link'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo '<a href="'.base_url().'admin/announcer/hapusAnnouncer/'.$row['id'].'"
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
