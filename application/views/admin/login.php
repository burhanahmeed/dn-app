<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Diesnat</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img width="300px" height="50px" src="<?php echo base_url()?>assets/gambar/logoo.png" alt=""/>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">LOGIN ADMIN</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo site_url('admin/dashboard/login');?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button name="login" type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                        <br>
                        <?php echo $notif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script>

</body>

</html>
