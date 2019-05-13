
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
    <div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-5">
            <div class="form-login" >
                <br>
                

                <h2>Votre Profil</h2>

                    <br>
                    <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                    <?php echo form_open('OrganisateurCtrl/modifier'); ?>
                    <div class="form-group">
                        <label class="control-label">Nom</label>
                        <input type="text" class="form-control" name="nomOrga" value="<?php echo  $organisateur[0]->nomOrga; ?>" size="30" required/> 
                            <h6 style="color:red;"</h6>
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
                            <input type="text" class="form-control" name="codePOrga" value="<?php  echo $organisateur[0]->codePOrga; ?>" size="30" required/>
                    </div> 
                    <div class="form-group">
                        <label class="control-label">Ville</label>
                        <input type="text" class="form-control" name="villeOrga" value="<?php echo $organisateur[0]->villeOrga; ?>" size="30" required/>
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Numéro de téléphone</label>
                        <input type="text" class="form-control" name="telOrga" value="<?php echo $organisateur[0]->telOrga; ?>" size="30" required>
                    </div>    
                   

                    <br>
                    <div class="text-center"><input class="btn btn-primary btn-success btn-block" type="submit" value="Modifier" /></div>
                    <div class="text-center">
                        <br>
                        
                        <h1 style="color:darkslategrey; "></h1>
                    </div>
                </form>
            <br>
            

                <br>

               
                <br>

            </div>
        </div>
    </div>
</div>
    
 