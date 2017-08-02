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
                            <div class="form-group">
                            <label>Sortir berdasarkan</label>
                                <a class="btn <?= (strcmp($sort, 'bisplan')==0)?'btn-default':'btn-primary'; ?>" href="<?= base_url().'admin/Submission/index/bisplan'?>">Bisplan</a>
                                <a class="btn <?= (strcmp($sort, 'debat')==0)?'btn-default':'btn-primary'; ?>" href="<?= base_url().'admin/Submission/index/debat'?>">Debat</a>
                                <a class="btn <?= (strcmp($sort, 'semua')==0)?'btn-default':'btn-primary'; ?>" href="<?= base_url().'admin/Submission'?>">Semua</a>
                            </div>
                        </div> <br> <br>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Waktu submit</th>
                                            <th>Jenis</th>
                                            <th>Kode Tim</th>
                                            <th>Path</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0;foreach ($bisplan as $row) { $i++;?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?= date('F jS, Y H:i',strtotime($row['timestamp']))?></td>
                                            <td><?= $row['jenis_event']?></td>
                                            <td><?php echo $row['kode']?></td>
                                            <td><a target="blank" href="<?php echo base_url().$row['path']?>">Download</a></td>
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
