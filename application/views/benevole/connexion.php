<div class="container login-container">
    <div class="row">

        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 login-form-1">
            <h2>Connexion à l'espace bénévole</h2>
            <div class="my-login text-center">
                <?php echo form_open('Benevoles/connexion'); ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="mailBen" placeholder="Votre adresse email" value="" size="50" required /> 
                </div>
                <div class="form-group">
                    <input type="password" class="form-control"  name="mdpBen" placeholder="Votre mot de passe" value="" size="50" required />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit btn-success btn-default" value="Se connecter" />
                </div>
                <div class="form-group">
                            <a href="<?php echo base_url("index.php/Accueil/inscription_benevole");?>" class="ForgetPwd">Rejoins nous!</a>
                        </div>
                    
            </div>
        </div>
    </div>
</div>