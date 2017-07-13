<!--  page-wrapper -->
  <div id="page-wrapper">
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Lihat Pesan</h1>
        </div>
        <!--end page header -->
        <?php echo $this->session->flashdata('gagalpesan'); ?>
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
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" value="<?php echo $edit['email']?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengirim Pesan</label>
                                    <input class="form-control" value="<?php echo $edit['nama']?>">
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" value="<?php echo $edit['judul']?>">
                                </div>
                                <br>
                                <a href="<?php echo base_url()?>admin/pesan" type="button" class="btn btn-info">Kembali</a>
                        </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <textarea class="form-control" rows="15"><?php echo $edit['konten']?></textarea>
                                </div>
                          </div>
                  </div>
                </div>
            </div>
             <!-- End Form Elements -->
        </div>
    </div>
    <div class="row">
         <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Balas Pesan</h1>
        </div>
        <!--end page header -->

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
                            <form role="form" method="POST" action="<?php echo base_url()?>admin/pesan/balasPesan/<?php echo $edit['id_pesan']?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>From</label>
                                    <input required type="email" class="form-control" name="from" value="dcangkring17@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label>To</label>
                                    <input required type="email" class="form-control" name="to" value="<?php echo $edit['email']?>">
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input required type="text" class="form-control" name="judul" value="<?php echo $edit['judul']?>">
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary">Balas</button>
                                <button type="reset" class="btn btn-success">Reset Button</button>
                        </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <textarea type="text" class="form-control" name="konten" rows="15">Pelanggan Yth. <?php echo $edit['nama']?>


Terimakasih atas pesan yang anda kirim, kami dari D-Cangkring selalu menerima kritik saran apapun untuk pelayanan yang lebih baik lagi dari kami.

Regards,
D-Cangkring</textarea>
                                </div>
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
