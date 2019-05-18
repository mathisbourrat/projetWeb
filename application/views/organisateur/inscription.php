<!--<link href="?php echo base_url()."../template/css/Connexion.css"; ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->

<div class="container login-container2" align="left">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 login-form-3 text-center">

                    <!-- renvoie tous les messages d'erreur, une chaine vide sinon -->
            <?php echo form_open('OrganisateurCtrl/inscription'); ?>

                <br>
                
                    <div class="text-center">
                    <h2>Inscription organisateur</h2>
                    </div>

                <div class="my-register">					
						
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
                        <input type="email" class="form-control" name="mailOrga" value="" size="50" placeholder="Email" required valid_email/>
                    </div>

                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre mot de passe</h5></strong></label>
                        <input type="password" class="form-control" name="mdpOrga" value="" placeholder="Mot de passe" minlength="8" size="30" required/>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Confirmation de votre mot de passe</h5></strong></label>
                        <input type="password" class="form-control" name="mdpOrga2" value="" placeholder="Mot de passe" minlength="8" size="30" required/>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre telephone </h5></strong></label>
                        <input type="tel" class="form-control" name="telOrga" pattern="0[0-9]{9}" placeholder="telephone" required>
                        
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre code postal</h5></strong></label>
                        <input type="tel" class="form-control" name="codePOrga" value=""  pattern="[0-9]{5}" placeholder="Code Postal" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre ville</h5></strong></label>
                        <input type="text" class="form-control" name="villeOrga" value="" placeholder="Ville" size="30" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre adresse</h5></strong></label>
                        <input type="text" class="form-control" name="adresseOrga" value="" placeholder="adresse" size="30" required/>
                    </div>
		
                    <div class="text-center"><input class="btnSubmit btn-success btn-default" type="submit" value="Inscription" /></div>
				

            </div>
           
            </div>
        
    </div>
</div>
