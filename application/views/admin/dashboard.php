
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <!-- flashdata sukses -->
            <div class='alert alert-success fade in'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <?php echo $this->session->flashdata('sukses'); ?></div>
            <!-- end flashdata sukses -->

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $this->session->userdata('username'); ?> </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
