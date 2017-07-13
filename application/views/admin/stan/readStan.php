<!--  page-wrapper -->
       <div id="page-wrapper">

            <div class="row">
                 <!--page header-->
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Stan</h1>
                </div>
                 <!--end page header-->
                 <?php echo $this->session->flashdata('suksesstan'); ?>
            </div>
            <div class="row">
                 <!--Default Pannel, Primary Panel And Success Panel   -->
                 <?php foreach($stan as $row) { ?>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo $row['nama_stan'] ?>
                        </div>
                        <div class="panel-body">
                            <!-- <?php echo base_url().$row['gmap']?> -->
                            <iframe src="<?php echo $row['gmap']?>" width="275" height="275" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="panel-footer">
                          <a href="<?php echo base_url().'admin/stan/editView/'.$row['id_stan']?>">Edit</a>
                          <a style="float:right" href="<?php echo base_url().'admin/stan/hapusStan/'.$row['id_stan']?>">Hapus</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                  <!--End Default Pannel, Primary Panel And Success Panel   -->
            </div>

        </div>
        <!-- end page-wrapper -->
