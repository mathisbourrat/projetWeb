<div class="container">
    <div class="result"><h1>Evénements correspondants à votre recherche</h1></div>
    <div class="row">
        
        <?php
        $no = $offset;
                         foreach ($data as $item) { ?>
  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
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
        <div class="text-center col-lg-12 col-x2-12 col-sm-12 col-md-12">      
    <?php echo $halaman; ?>
</div>
                          
           
       
    </div>
        
</div>







