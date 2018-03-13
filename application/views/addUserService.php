<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Service
        <small>Ajouter un utilisateur au service</small>
      </h1>
    </section>


    <section class="content">
      <div class="row">
          <div class="col-xs-12 text-right">
              <div class="form-group">
                <a class="btn btn-primary" href="<?php echo base_url().'editServiceOld/'.$serviceId; ?>">Retour</i></a>
              </div>
          </div>
      </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des utilisateur disponible</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>addUserService" method="POST" id="searchList">
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
                      <th>Mail</th>
                      <th>Telephone</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->userId ?></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->email ?></td>
                      <td><?php echo $record->mobile ?></td>
                      <td class="text-center">
                          <a class="btn btn-success deleteUser" href="#"  data-serviceId="<?php echo $serviceId; ?>"  data-userId="<?php echo $record->userId; ?>"><i class="glyphicon glyphicon-plus-sign"></i></a>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/commonUserService.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "addUserService/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
