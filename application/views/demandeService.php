<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Demande
        <small>Ajouter, Modifier, Supprimer</small>
      </h1>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addDemande"><i class="fa fa-plus"></i> Ajouter</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des Demandes</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>demandeListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Recherche..."/>
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
                      <th>Titre</th>
                      <th>Description</th>
                      <th>Etat</th>
                      <th>Date mise à jour</th>
                      <th>Date création</th>
          					  <th>Date de fin prévue</th>

                      <th class="text-center">Actions</th>
                    </tr>
                    <?php

                    if(!empty($demandeRecords))
                    {
                        foreach($demandeRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->titre ?></td>
                      <td><?php echo $record->description ?></td>
                      <td><?php echo $record->Etat ?></td>
                      <td><?php echo $record->datemaj ?></td>
                      <td><?php echo $record->dateorigine ?></td>
                      <td><?php echo $record->datefinprevue ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editDemandeOld/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>

                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "demande/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
