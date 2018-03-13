<?php

$serviceId = '';
$name = '';
$desc = '';

if(!empty($serviceInfo))
{
    foreach ($serviceInfo as $sf)
    {
        $serviceId = $sf->id;
        $name = $sf->nom;
        $desc = $sf->description;
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

                    <form role="form" action="<?php echo base_url() ?>editService" method="post" id="editService" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nom du Service" name="name" value="<?php echo $name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $serviceId; ?>" name="serviceId" id="serviceId" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <input type="text" class="form-control" id="desc" placeholder="Description du Service" name="desc" value="<?php echo $desc; ?>" maxlength="256">
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


        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <form role="form" action="<?php echo base_url() ?>addUserService" method="post" id="addUserService" role="form">
                      <input type="submit" class="btn btn-primary" value="Ajouter" />
                      <input type="hidden" value="<?php echo $serviceId; ?>" name="serviceId" id="serviceId" />
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des Services</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>serviceListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Recherche .."/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Nom</th>
                      <th>Description</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->email ?></td>
                      <td><?php echo $record->mobile ?></td>
                      <td class="text-center">
                        <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->userId; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>

                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
              </div><!-- /.box -->
            </div>
        </div>
      </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/commonUser.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/js/editService.js" type="text/javascript"></script>
