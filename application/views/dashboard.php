<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord
        <small>Actions</small>
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
				 <?php
            if($role == ROLE_ADMIN)
            {
            ?>

              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $countUser;?></h3>
                  <p>Utilisateurs</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
				   <a href="<?php echo base_url(); ?>userListing" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $countDemande;?></h3>
                  <p>Demandes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-chatboxes"></i>
                </div>
		        <a href="<?php echo base_url(); ?>demande" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $countService;?></h3>
                  <p>Services</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cube"></i>
                </div>
                <a href="<?php echo base_url(); ?>service" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php
            }
           if($role == ROLE_VALIDEUR)
            {
            ?>
    			  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?php echo $countNewDemande;?></h3>
                      <p>Nouvelle demande</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-chatboxes"></i>
                    </div>
    				   <a href="<?php echo base_url(); ?>newDemande" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3><?php echo $countActualDemande;?></h3>
                        <p>Demandes en traitement</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-chatboxes"></i>
                      </div>
                 <a href="<?php echo base_url(); ?>actualDemande" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php echo $countvalideDemande;?></h3>
                      <p>Demandes validés</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-chatboxes"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>validDemande" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php echo $countrefuseDemande;?></h3>
                      <p>Demandes refusées</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-chatboxes"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>refusDemande" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
			         <?php
			       }
            ?>

            <?php
           if($role == ROLE_DEMANDEUR)
            {
            ?>
            <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h2>Nouvelle demande</h2>
                      <p> Creer une demande <p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-file-text-o"></i>
                    </div>
                   <a href="<?php echo base_url(); ?>addDemande" class="small-box-footer">Créer <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php echo $countDemande;?></h3>
                      <p>Mes demandes</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-chatboxes"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>demandeListing" class="small-box-footer">Liste <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
               <?php
             }
            ?>
          </div>
    </section>
</div>
