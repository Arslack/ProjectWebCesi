<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Demande
        <small>Ajout / Modification d'une Demande</small>
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

                        <form role="form" id="addProfil" action="<?php echo base_url() ?>addNewDemande" method="post" role="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Date création</label>
											<div class="form-group">
												<label class="col-md-2 control-label" for="Date1">Date création</label>
												<div class="col-md-10">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
														<input type="text" class="form-control" id="Date"/>
													</div>
												</div>
											</div>
                                            <input type="text" class="form-control required" id="lname" name="lname" maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Date mise à jour</label>
											<div class="form-group">
												<label class="col-md-2 control-label" for="Date2">Date mise à jour</label>
												<div class="col-md-10">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
														<input type="text" class="form-control" id="Date"/>
													</div>
												</div>
											</div>
                                            <input type="text" class="form-control required" id="lname" name="lname" maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Date fin prévue</label>
											<div class="form-group">
												<label class="col-md-2 control-label" for="Date3">Date fin prévue</label>
												<div class="col-md-10">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
														<input type="text" class="form-control" id="Date"/>
													</div>
												</div>
											</div>
                                            <input type="text" class="form-control required" id="lname" name="lname" maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="mobile">Etat</label>
                                          <input type="text" class="form-control required digits" id="etat" name="etat" maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="fixe">Description</label>
                                          <input type="text" class="form-control required digits" id="description" name="description" maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="adresse">Titre</label>
                                          <input type="text" class="form-control required" id="titre" name="titre" maxlength="256">
                                        </div>
                                    </div>
                                </div>

                               
                        </div>

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Enregistrer" />
                            <input type="ResetA" class="btn btn-default" value="Annuler" />
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
<script src="<?php echo base_url(); ?>assets/js/addDemande.js" type="text/javascript">
	</script>
<script src="<?php echo base_url(); ?>assets/js/datepicker.js" type="text/javascript">
</script>