<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Je me connecte en tant que bénévole</h3>
                    <?php echo form_open('BenevoleCtrl/connexion');?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mailBen" placeholder="Votre adresse email" value="" size="50" required /> 
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="mdpBen" placeholder="Votre mot de passe" value="" size="50" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Se connecter" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Mot de passe oublié</a>
                        </div>
					<div class="text-center">
                            <a href="<?php echo base_url()?>BenevoleCtrl/inscription" role="button" ><input type="submit" class="btnNew" value="Vous êtes nouveaux ?"/></a>
					</div>
                </div>
            </div>
 </div>
