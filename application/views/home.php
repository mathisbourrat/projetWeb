
<div class="container">
    <div class="col-">
        <h1>Bienvenue sur Share-Your-Event !</h1>
    </div>
    <br>
    <h4>Ce site a pour but a de regrouper tout un tas d'évenements, dans tous 
        les domaines que l'on peut imaginer.<br>
        Vous pourrez trouvez tous vos évenements, soit pour y participer en tant
        que public, soit en tant que bénevoles</h4>

    <div id="body">
        <h2>Retrouvez ici les événements en vogue!</h2>

        <div id="carrousel-accueil" class="carousel slide" data-ride="carousel"> 

            <ol class="carousel-indicators"> 
                <li data-target="#carrousel-accueil" data-slide-to="0" 
                    class="active"></li> 
                <li data-target="#carrousel-accueil" data-slide-to="1"></li> 
                <li data-target="#carrousel-accueil" data-slide-to="2"></li> 
            </ol> 


            <div class="carousel-inner"> 
                <div class="item active">
                    <img style="height: 400px; margin: auto" src="<?php echo base_url("index.php/../assets/image/Event/" . $event[0]->imageEvent); ?>" alt="..."> 
                    <div class="carousel-caption"> 
                        <h2><?php echo $event[0]->nomEvent; ?></h2><br><br>
                        <a href="<?php echo base_url("index.php/Accueil/event/" . $event[0]->idEvent); ?>" ><p><button class="btn btn-primary">Plus d’informations</button></p></a> 

                    </div> 
                </div>
                <div class="item"> 
                    <img style="height: 400px; margin: auto" src="<?php echo base_url("index.php/../assets/image/Event/" . $event[1]->imageEvent); ?>" alt="..."> 
                    <div class="carousel-caption">

                        <h2><?php echo $event[1]->nomEvent; ?></h2> <br><br>
                        
                        <a href="<?php echo base_url("index.php/Accueil/event/" . $event[1]->idEvent); ?>" ><p><button class="btn btn-primary">Plus d’informations</button></p></a> 

                    </div> 
                </div>
                <div class="item" style='text-align: center'> 
                    <img style="height: 400px; margin: auto" src="<?php echo base_url("index.php/../assets/image/Event/" . $event[2]->imageEvent); ?>" alt="..."> 
                    <div class="carousel-caption"> 
                        <h2><?php echo $event[2]->nomEvent; ?></h2> <br><br> 
                        <a href="<?php echo base_url("index.php/Accueil/event/" . $event[2]->idEvent); ?>" ><p><button class="btn btn-primary">Plus d’informations</button></p></a> 
                    </div> 
                </div> 
            </div> 


            <a class="left carousel-control" href="#carrousel-accueil" 
               data-slide="prev"> 
                <span class="glyphicon glyphicon-chevron-left"></span> 
            </a> 
            <a class="right carousel-control" href="#carrousel-accueil" 
               data-slide="next"> 
                <span class="glyphicon glyphicon-chevron-right"></span> 
            </a> 
        </div>
    </div>

</div>