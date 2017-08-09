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
                        <label>Sort By</label>
                        <div class="form-group">
                            <a href="<?php echo base_url('admin/bisplan/sortby/verified') ?>" class="btn btn btn-primary btn-sm button-gray">Terverifikasi</a>
                            <a href="<?php echo base_url('admin/bisplan/sortby/unverified') ?>" class="btn btn btn-primary btn-sm button-gray">Belum Terverifikasi</a>
                        </div>
                        <span>Keterangan status</span>
                        <ol>
                            <li>Belum bayar dan belum terverivikasi = 1</li>
                            <li>Belum bayar dan sudah terverivikasi = 2</li>
                            <li>Sudah bayar dan belum terverivikasi = 3</li>
                            <li>Sudah bayar dan sudah terverivikasi = 4</li>
                        </ol>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>ID User</th>
                                            <th>Kode Tim</th>
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
                                        <?php $i=0; foreach ($bisplan as $row) { $i++;?>
                                        <?= ($row['status']!='4' && ($row['verifikasi']!=null || $row['pembayaran']!=null))? $css='style="background-color: #04b173;"': $css=''; ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td <?=$css?> ><?php echo $row['uid'] ?></td>
                                            <td <?=$css?> ><?php echo $row['id'] ?></td>
                                            <td <?=$css?> ><?php echo $row['nama_tim'] ?></td>
                                            <td><?php echo $row['asal_univ'] ?></td>
                                            <td><?php echo $row['ketua'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td><?php if ($row['semifinal']=='1') {
                                                echo 'Ya';
                                            }else{echo 'Tidak'; }?></td>
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
