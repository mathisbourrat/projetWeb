<div class="container text-center">
            <div class="row">
                
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 login-form-1">
                    
                    <h2>Connexion à mon espace organisateur</h2>
                    <div class="my-login">
                    <?php echo form_open('Organisateurs/connexion', array('method'=>'post'));?>
                    <?php echo isset($error) ? $error : '';?>
                        <div class="form-group">
                            <input type="email" class="form-control" name="mailOrga" placeholder="Votre adresse email" value="" size="50" required /> 
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="mdpOrga" placeholder="Votre mot de passe" value="" size="30" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit btn-success btn-default" value="Se connecter" />
                        </div>
                        <div class="form-group">
                            <a href="<?php echo base_url("index.php/Accueil/inscription_organisateur");?>" class="ForgetPwd">Rejoins nous!</a>
                        </div>
                    
                        
                    <?php echo form_close(); ?>
                </div>
                    </div>
            
                </div>
</div>
