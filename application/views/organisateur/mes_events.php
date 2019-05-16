<div class="container">
    <h2>Mes Evenements</h2>
    <div class="row">
        
        
                        <?php foreach ($event as $item) { ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo base_url("./assets/image/Event/") . $item->imageEvent; ?>" alt="...">
      <div class="caption">
        <h3><?php echo $item->nomEvent; ?></h3>
        <p><?php echo $item->dateDebut; ?></p>
        <p><a href="<?php echo base_url("index.php/AccueilCtrl/afficher_event/" . $item->idEvent); ?>" class="btn btn-primary" role="button">voir</a> 
            <a href="<?php echo base_url("index.php/OrganisateurCtrl/modification_event/" . $item->idEvent); ?>" class="btn btn-default" role="button">modifier</a></p>
      </div>
    </div>
  </div>
           <?php } ?>
        

                          
           
       
    </div>
        
</div>

