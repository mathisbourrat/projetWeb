<div class="container">
    <div class="row text-center">    
        <div>
            <h1><?php echo $event[0]->nomEvent; ?></h1>
        </div>
        <div class="test1234">
        <div class="col-lg-6">
            

            <img src="<?php echo base_url("./assets/image/Event/") . $event[0]->imageEvent; ?>">
        </div>
        <div class="col-lg-6">
            <h2>Du <?php echo $event[0]->dateDebut; ?> au <?php echo $event[0]->dateFin; ?> !</h2>
            <h2><?php echo $event[0]->lieu; ?></h2>
            <h3><?php echo $event[0]->description; ?></h3>
            

        </div>
          </div>
    </div>
</div>
