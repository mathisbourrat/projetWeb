<!--<link href="?php echo base_url()."../template/css/Connexion.css"; ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->

<div class="container login-container2" align="left">
    <div class="row">
        <div class="col-md-6 login-form-3"><br>
            <?php echo form_open('BenevoleCtrl/inscription'); ?>

                <br>
                    <div class="text-center">
                    <h3>Inscription Benevole</h3>
                    </div>

                    <br>					
						
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre nom</h5></strong></label>
                            <input type="text" class="form-control" name="nomBen" placeholder="Nom" value="" size="50" required /> 
                    </div>

                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre Prénom</h5></strong></label>
                            <input type="text" class="form-control" name="prenomBen" placeholder="prenom" value="" size="50" required /> 
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre mail</h5></strong></label>
                        <input type="email" class="form-control" name="mailBen" value="" size="50" placeholder="Email" required valid_email/>
                    </div>

                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre mot de passe</h5></strong></label>
                        <input type="password" class="form-control" name="mdpBen" value="" placeholder="Mot de passe" size="50" required/>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Confirmation de votre mot de passe</h5></strong></label>
                        <input type="password" class="form-control" name="mdpBen2" value="" placeholder="Mot de passe" size="50" required/>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre telephone </h5></strong></label>
                        <input type="text" class="form-control" name="telBen" value="" placeholder="telephone" size="30" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre code postal</h5></strong></label>
                        <input type="text" class="form-control" name="codePBen" value="" placeholder="Code Postal" size="30" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre ville</h5></strong></label>
                        <input type="text" class="form-control" name="villeBen" value="" placeholder="Ville" size="50" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><h5><strong>Votre adresse</h5></strong></label>
                        <input type="text" class="form-control" name="adresseBen" value="" placeholder="adresse" size="50" required/>
                    </div>
		
                    <div class="text-center"><input class="btnSubmit" type="submit" value="Inscription" /></div>
				

            <br>
            <br>



            </div>
        
    </div>
</div>


