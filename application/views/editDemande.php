<?php

$demandeId = '';
$datefin = '';
$titre = '';
$desc = '';
$file='';
$idEtat='';
$titre='';

if(!empty($serviceInfo))
{
    foreach ($serviceInfo as $sf)
    {
		$Id = $sf->Id;
		$date1 = $sf->date1;
		$date2 = $sf->date1;
		$date3 = $sf->date1;
		$etat=$sf->etat;
		$description=$sf->description;
		$titre=$sf->titre;

    }
}


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Demandes
        <small>Ajout Edition Demande</small>
      </h1>
    </section>



    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->


                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modifier Demande</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="<?php echo base_url() ?>editDemande" method="post" id="editService" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Date d'origine</label>
                                        <input type="text" class="form-control" id="name" placeholder="Date de création" name="name" value="<?php echo "test"; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $serviceId; ?>" name="serviceId" id="serviceId" />
										<input type="hidden" name="datemaj" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">

                                    </div>

                                </div>

							 <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Date de fin prévue</label>
                                        <input type="text" class="form-control" id="name" placeholder="Date de création" name="name" value="<?php echo "test"; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $serviceId; ?>" name="serviceId" id="serviceId" />
										<input type="hidden" name="datemaj" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">

                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname">Description</label>
                                      <input type="text" class="form-control" id="desc" placeholder="Description" name="desc" value="<?php echo $desc; ?>" maxlength="128">

                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname">Titre</label>
                                      <input type="text" class="form-control" id="titre" placeholder="Titre" name="titre" value="<?php echo $titre; ?>" maxlength="128">

                                  </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="Submit" class="btn btn-primary" value="Submit" />
                            <input type="Reset" class="btn btn-default" value="Reset" />
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
