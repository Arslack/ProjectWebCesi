<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Profil
        <small>Ajout / Modification du profil de l'utilisateur</small>
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

                        <form role="form" id="addProfil" action="<?php echo base_url() ?>addProfil" method="post" role="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Nom</label>
                                            <input type="text" class="form-control required" id="lname" name="lname" maxlength="128">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">Prenom</label>
                                            <input type="text" class="form-control required" id="fname" name="fname" maxlength="128">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control required" id="email" name="email" maxlength="128">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="mobile">Téléphone Portable</label>
                                          <input type="text" class="form-control required digits" id="mobile" name="mobile" maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="fixe">Téléphone Fixe</label>
                                          <input type="text" class="form-control required digits" id="fixe" name="fixe" maxlength="10">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="adresse">Adresse</label>
                                          <input type="text" class="form-control required" id="adresse" name="adresse" maxlength="256">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="cpostal">Code Postal</label>
                                          <input type="text" class="form-control required digits" id="cpostal" name="cpostal" maxlength="5">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="city">Ville </label>
                                          <input type="text" class="form-control required" id="city" name="city" maxlength="128">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="country">Pays </label>
                                          <input type="text" class="form-control required" id="country" name="country" maxlength="128">
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
<script src="<?php echo base_url(); ?>assets/js/addProfil.js" type="text/javascript"></script>
