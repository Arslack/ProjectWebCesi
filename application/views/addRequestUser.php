<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Web Guyane</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
          <a href="#"><b></b><br>Web Guyane</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Sign Out</p>
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
            <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if($error)
                {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php } ?>
            <?php
                $success = $this->session->flashdata('success');
                if($success)
                {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php } ?>
                        <form role="form" id="addRequestUser" action="<?php echo base_url() ?>addNewRequestUser" method="post" role="form">
                              <div class="form-group has-feedback">
                                  <input type="text" class="form-control"  placeholder="Name" id="fname" name="fname" maxlength="128">
                                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                  <input type="text" class="form-control required email" placeholder="Email" id="email"  name="email" maxlength="128">
                                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                  <input type="password" class="form-control required" placeholder="Password" id="password"  name="password" maxlength="10">
                                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                  <input type="password" class="form-control required equalTo" placeholder="Password Confirm" id="cpassword" name="cpassword" maxlength="10">
                                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                  <input type="text" class="form-control required digits" placeholder="Phone number" id="mobile" name="mobile" maxlength="10">
                                  <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                              </div>
                            <div class="row">
                              <div class="col-xs-8">
                                  <a class="btn btn-danger" href="<?php echo base_url(); ?>" role="button">Annuler</a>
                              </div>
                              <div class="col-xs-4">
                                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Enregistrer" />
                              </div>
                            </div>
                        </form>
                    </div>

    </div>
    <script src="<?php echo base_url(); ?>assets/js/addRequestUser.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
