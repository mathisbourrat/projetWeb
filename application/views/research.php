<div class="container">
    <div class="container text-center">
   
    <div class="result"><h1>Résultat de la recherche " <?php echo $name; ?> "</h1></div>
    <div class="row">
        
        
                        <?php foreach ($event as $item) { ?>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="thumbnail">
      <img src="<?php echo base_url("./assets/image/Event/") . $item->imageEvent; ?>" alt="...">
      <div class="caption">
        <h3><?php echo $item->nomEvent; ?></h3>
        <p><?php echo $item->dateDebut; ?></p>
        <a href="<?php echo base_url("index.php/Accueil/event/" . $item->idEvent); ?>" ><button class="btn btn-info">Plus d’informations</button></a>
        <a href="<?php echo base_url("index.php/Benevoles/participer/" . $item->idEvent); ?>" ><button class="btn btn-primary">Participer</button></a>
      </div>
    </div>
  </div>
           <?php } ?>
        

                          
           
       
    </div>
        
</div>
</div>


