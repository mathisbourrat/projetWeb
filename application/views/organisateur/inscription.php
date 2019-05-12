<!--<link href="?php echo base_url()."../template/css/Connexion.css"; ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->

<div class="container login-container2" align="left">
    <div class="row">
        <div class="col-md-6 login-form-3"><br>

                    <!-- renvoie tous les messages d'erreur, une chaine vide sinon -->
            <?php echo form_open('OrganisateurCtrl/inscription'); ?>

                <br>
                    <div class="text-center">
                    <h3>Inscription organisateur</h3>
                    </div>

                    <br>					
						
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre nom</h5></strong></label>
                            <input type="text" class="form-control" name="nomOrga" placeholder="Nom" value="" size="50" required /> 
                    </div>

                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre Prénom</h5></strong></label>
                            <input type="text" class="form-control" name="prenomOrga" placeholder="prenom" value="" size="50" required /> 
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre mail</h5></strong></label>
                        <input type="mail" class="form-control" name="mailOrga" value="" size="50" placeholder="Email" required valid_email/>
                    </div>

                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre mot de passe</h5></strong></label>
                        <input type="password" class="form-control" name="mdpOrga" value="" placeholder="Mot de passe" size="50" required/>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Confirmation de votre mot de passe</h5></strong></label>
                        <input type="password" class="form-control" name="mdpOrga2" value="" placeholder="Mot de passe" size="50" required/>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre telephone </h5></strong></label>
                        <input type="text" class="form-control" name="telOrga" value="" placeholder="telephone" size="30" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre code postal</h5></strong></label>
                        <input type="text" class="form-control" name="codePOrga" value="" placeholder="Code Postal" size="30" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre ville</h5></strong></label>
                        <input type="text" class="form-control" name="villeOrga" value="" placeholder="Ville" size="50" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre adresse</h5></strong></label>
                        <input type="text" class="form-control" name="adresseOrga" value="" placeholder="adresse" size="50" required/>
                    </div>
		
                    <div class="text-center"><input class="btnSubmit" type="submit" value="Inscription" /></div>
				

            <br>
            <br>



            </div>
        
    </div>
</div>

         <!--           <div class="form-group"><h5>
                       
 <input type="checkbox" name="conditionsUtilisation" required/>  Je m'engage à respecter les <a href="<?php echo base_url("ClientCtrl/condition_utilisation/");?>">conditions d'utilisation</a> de ce site
                    </h5></div> -->