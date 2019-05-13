<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Je me connecte</h3>
                    <?php echo form_open('OrganisateurCtrl/connexion', array('method'=>'post'));?>
                    <?php echo isset($error) ? $error : '';?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mailOrga" placeholder="Votre adresse email" value="" size="50" required /> 
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="mdpOrga" placeholder="Votre mot de passe" value="" size="30" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Se connecter" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Mot de passe oublié</a>
                        </div>
                    </form>
			
                    <?php echo form_close(); ?>
                </div>
            </div>
 </div>
