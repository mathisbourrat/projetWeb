<div class="container fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url("index.php/Accueil/accueil"); ?>">Accueil</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Organisateur<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("index.php/Accueil/connexion_organisateur"); ?>">Se Connecter</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url("index.php/Accueil/inscription_organisateur"); ?>">S'inscrire</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bénévole<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("index.php/Accueil/connexion_Benevole"); ?>">Se Connecter</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url("index.php/Accueil/inscription_benevole"); ?>">S'inscrire</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evenement <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Par catégorie</a></li>
                            <?php foreach ($typeEvent as $item) { ?>
                            <li><a style='margin-left:5%' href="<?php echo base_url("index.php/Accueil/categorie_event/" . $item->idType . "/"); ?>"><?php echo $item->descriptionType; ?></a></li>
                            
                    <?php } ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url("index.php/Accueil/next_events"); ?>">Par date</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <form action="<?php echo base_url("index.php/Accueil/search_event"); ?>" method="post" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Search">
                        <input type="submit" name="submit value=" value="search"> 
                    </div>
                </form>
                
                
                    
                
                    
                    
                    

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>








