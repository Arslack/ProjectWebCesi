<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Services
        <small>Ajout / Modification d'un service'</small>
      </h1>
    </section>
        <section class="content">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-8">
                    <!-- general form elements -->



                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Description</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" id="addService" action="<?php echo base_url() ?>createService" method="post" role="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nom</label>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desc">description</label>
                                            <input type="text" class="form-control required" id="desc" name="desc" maxlength="256">
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Enregistrer" />
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>service" role="button">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
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

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addService.js" type="text/javascript"></script>
