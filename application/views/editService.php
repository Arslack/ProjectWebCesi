<?php

$serviceId = '';
$name = '';
$desc = '';

if(!empty($data))
{
    foreach ($data as $d)
    {
        $serviceId = $d->id;
        $name = $d->nom;
        $desc = $d->description;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Services
        <small>Ajout Edition Service</small>
      </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modifier Service</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="<?php echo base_url() ?>editService" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nom</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Nom du Service" name="fname" value="<?php echo $name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $serviceId; ?>" name="userId" id="userId" />
                                    </div>

                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname">Description</label>
                                      <input type="text" class="form-control" id="desc" placeholder="Description" name="desc" value="<?php echo $desc; ?>" maxlength="128">
                                      <input type="hidden" value="<?php echo $serviceId; ?>" name="serviceId" id="serviceId" />
                                  </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="Enregistrer" class="btn btn-primary" value="Submit" />
                            <input type="Annuler" class="btn btn-default" value="Reset" />
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

<script src="<?php echo base_url(); ?>assets/js/editService.js" type="text/javascript"></script>
