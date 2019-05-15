<?php foreach ($event as $item) { ?>
    <div class="item"> 
                    <img style="height: 300px;" src="http://localhost/projetWeb/index.php/../assets/image/".<?php echo $item->nomEvent; ?> alt="..."> 
                    <div class="carousel-caption"> 
                        <h3><?php echo $item->nomEvent; ?></h3> 
                        <p>Denique Antiochensis ordinis vertices sub uno elogio 
                            iussit occidi ideo efferatus.</p> 
                        <p><button class="btn btn-primary">Plus d’informations 
                            </button></p> 
                    </div> 
                </div>
<?php } ?>