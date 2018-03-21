<?php

$demandeId = '';
$filename= '';
$datefin = '';
$titre = '';
$desc = '';
$file='';
$idEtat='';
$titre='';
$idEtat='';
$auteur='';
$email='';
$mobile='';
if(!empty($demande))
{
    foreach ($demande as $d)
    {
    $demandeId = $d->id;

    $idEtat=$d->idEtat;
    $desc=$d->description;
    $titre=$d->titre;
    $serviceId = $d->idService;
    $titre=$d->titre;
    }
}

if(!empty($dossier))
{
    foreach ($dossier as $d)
    {
      $filename = $d->nomfichier;
    }
}

if(!empty($user))
{
    foreach ($user as $d)
    {
      $auteur = $d->name;
      $email = $d->email;
      $mobile = $d->mobile;
    }
}


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Demandes
        <small>Avancement de la demande</small>
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
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="title">Sujet de la demande</label>
                                              <input type="text" class="form-control required" value="<?php echo $titre; ?>" id="title" name="title" maxlength="128" readonly>
                                              <input type="hidden" value="<?php echo $demandeId; ?>" name="demandeId" id="demandeId" />
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="desc">Description de la demande</label>
                                              <input type="text" class="form-control required" value="<?php echo $desc; ?>"id="desc" name="desc" maxlength="256" readonly>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="file">Fichier au format pdf ou zip</label>
                                              <a href="<?php echo base_url(); ?>files/<?php echo $filename; ?>"><?php echo $filename; ?></a>

                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="title">Auteur de la demande</label>
                                              <input type="text" class="form-control required" value="<?php echo $auteur; ?>" id="title" name="title" maxlength="128" readonly>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="title">Email de l'auteur</label>
                                              <input type="text" class="form-control required" value="<?php echo $email; ?>" id="title" name="title" maxlength="128" readonly>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="role">Etat de la demande</label>
                                              <select class="form-control required" id="etat" name="etat">
                                                  <option value="<?php echo $idEtat ?>">Choisisser un Etat</option>
                                                  <?php
                                                  if(!empty($etat))
                                                  {
                                                      foreach ($etat as $rl)
                                                      {
                                                          ?>
                                                          <option value="<?php echo $rl->id ?>"><?php echo $rl->titre ?></option>
                                                          <?php
                                                      }
                                                  }
                                                  ?>
                                              </select>
                                          </div>
                                      </div>
                                    </div>
                                </div><!-- /.box-body -->


                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Enregistrer" />
                            <input type="reset" class="btn btn-default" value="Annuler" />
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
