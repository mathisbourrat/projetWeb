<div class="container">
    <div class="result"><h1>Evénements correspondants à votre recherche</h1></div>
    <div class="row">
        
        
                        <?php foreach ($event as $item) { ?>
  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="thumbnail">
      <img src="<?php echo base_url("./assets/image/Event/") . $item->imageEvent; ?>" alt="...">
      <div class="caption">
        <h3><?php echo $item->nomEvent; ?></h3>
        <p><?php echo $item->dateDebut; ?></p>
        <p><a href="<?php echo base_url("index.php/AccueilCtrl/afficher_event/" . $item->idEvent); ?>" class="btn btn-primary" role="button">voir</a> 
            <a href="<?php echo base_url("index.php/BenevoleCtrl/participer/" . $item->idEvent); ?>" class="btn btn-default" role="button">participer</a></p>
      </div>
    </div>
  </div>
           <?php } ?>
        

                          
           
       
    </div>
        
</div>

