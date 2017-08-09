<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo base_url()?>assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/social-buttons/social-buttons.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/timeline/timeline.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/dataTables.bootstrap.css">

   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img width="250px" height="50px" src="<?php echo base_url()?>assets/gambar/logoo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url()?>admin/dashboard/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo base_url()?>assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $this->session->userdata('username'); ?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="selected">
                        <a href="<?php echo base_url()?>admin/dashboard/beranda"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()?>admin/user"><i class="fa fa-files-o fa-fw"></i> List user</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> List Pendaftar<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url()?>admin/Bisplan">Bisplan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/Debat">Debat</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/Cercer">Cerdas Cermat</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/Kofid">KOFID</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Announcer<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url()?>admin/announcer">List Announcer</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/announcer/createView">Tambah Announcer</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>admin/Submission"><i class="fa fa-files-o fa-fw"></i> Submission</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#chgpass"><i class="fa fa-files-o fa-fw"></i> Change Password</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse --> <!-- <?= var_dump($this->session->userdata('admLogin')) ?> -->
        </nav>
        <!-- end navbar side -->

    <!--start change password -->
    <!-- forgot pass Modal -->
<div id="chgpass" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 104px;
z-index: 9999;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: green; color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body row">

        <form action="<?= base_url()?>admin/dashboard/changePassword" method="POST" style="width: 280px; margin: auto;">
            <div class="form-group">
                <input class="form-control dn-form-control" type="password" name="pass" placeholder="New Password">
            </div>
            <div class="form-group">
                <input class="form-control dn-form-control" type="password" name="cpass" placeholder="Comfirm Password">
            </div>
            <div class="form-group" style="float: right;">
                <input style="width: 70px" class="btn dn-btn-def" type="submit" name="" value="Save">
            </div>
        </form>
      </div>
    </div>

  </div>
</div>

    <!-- end here -->

<!-- change pass notification -->
<?php
            if ($this->session->flashdata('errchg')) {
                echo '<div class="alert alert-danger position alert-dismissable" style="position:fixed">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          '.$this->session->flashdata('errchg').'
                        </div>';
            }elseif ($this->session->flashdata('succhg')) {
                echo '<div class="alert alert-success position alert-dismissable" style="position:fixed">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      '.$this->session->flashdata('succhg').'
                    </div>';
            }
            ?>