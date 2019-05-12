<div class="container">
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
                <a class="navbar-brand" href="<?php echo base_url("index.php/OrganisateurCtrl/index"); ?>">Accueil</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon compte<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("index.php/OrganisateurCtrl/profil"); ?>">Mon profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url("index.php/OrganisateurCtrl/deconnexion"); ?>">Se déconnecter</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes évenements<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("index.php/OrganisateurCtrl/mes_events"); ?>">Voir mes évenements</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url("index.php/OrganisateurCtrl/create_event"); ?>">Créer un évenement</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evenement<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Par catégorie</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url("index.php/AccueilCtrl/liste_event"); ?>">Par date</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
