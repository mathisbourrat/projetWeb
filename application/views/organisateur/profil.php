
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<div class="container">
    <div class="row">
                


                <h1>Votre Profil</h1>


                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <?php echo form_open('OrganisateurCtrl/modifier_profil'); ?>
                <div class="form-group">
                    <label class="control-label">Nom</label>
                    <input type="text" class="form-control" name="nomOrga" value="<?php echo $organisateur[0]->nomOrga; ?>" size="30" required/> 

                </div>

                <div class="form-group">
                    <label class="control-label">Prenom</label>
                    <input type="text" class="form-control" name="prenomOrga" value=" <?php echo $organisateur[0]->prenomOrga; ?>" size="30" required/>
                </div>    
                <div class="form-group">
                    <label class="control-label">Mail</label>
                    <input type="text" class="form-control" name="mailOrga" value="<?php echo $organisateur[0]->mailOrga; ?>" size="30" required/> 
                </div>  


                <div class="form-group">
                    <label class="control-label">Adresse</label>
                    <input type="text" class="form-control" name="adresseOrga" value="<?php echo $organisateur[0]->adresseOrga; ?>" size="30" required/>
                </div>    
                <div class="form-group">
                    <label class="control-label">Code postale</label>
                    <input type="tel" class="form-control" name="codePOrga" value="<?php echo $organisateur[0]->codePOrga; ?>"pattern="[0-9]{5}" required/>
                </div> 
                <div class="form-group">
                    <label class="control-label">Ville</label>
                    <input type="text" class="form-control" name="villeOrga" value="<?php echo $organisateur[0]->villeOrga; ?>" size="30" required/>
                </div>    
                <div class="form-group">
                    <label class="control-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" name="telOrga" value="<?php echo $organisateur[0]->telOrga; ?>" pattern="0[0-9]{9}" required>
                </div>    


                
                <div class="text-center"><input class="btn btn-primary btn-success btn-block" type="submit" value="Modifier" /></div>
            </div>
        </div>
        
        <div class="col-md-6 text-center">
            <div class="my-form">
            <div class='my-update'>
                <h3>Changement de mot de passe</h3>

                <div class="form-group">
                    <label class="control-label">Mot de passe</label>
                    <input type="password" class="form-control" name="mdpOrga" value="" minlength="8" size="30" >
                </div>

                <div class="form-group">
                    <label class="control-label">Confirmation</label>
                    <input type="password" class="form-control" name="mdp2Orga" value="" minlength="8" size="30" >
                </div>

                <div class="form-group">
                    <input type="checkbox" name="change_psw" value="1"> je confirme vouloir changer mon mot de passe<br>                               
                </div>

                <br>

                <div class="text-center"><input class="btn btn-primary" type="submit" value="Changer mot de passe" /></div>


            </div>
        </div>
    </div>
</div>
</div>

