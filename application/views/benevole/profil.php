    <div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-5">
            <div class="form-login" >
                <br>
                

                <h2>Votre Profil</h2>

                    <br>
                    <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                    <?php echo form_open('BenevoleCtrl/modifier'); ?>
                    <div class="form-group">
                        <label class="control-label">Nom</label>
                        <input type="text" class="form-control" name="nomBen" value="<?php echo  $benevole[0]->nomBen; ?>" size="30" required/> 
                            <h6 style="color:red;"</h6>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Prenom</label>
                        <input type="text" class="form-control" name="prenomBen" value=" <?php echo $benevole[0]->prenomBen; ?>" size="30" required/>
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Mail</label>
                        <input type="text" class="form-control" name="mailBen" value="<?php echo $benevole[0]->mailBen; ?>" size="30" required/> 
                    </div>  
                    
                    <div class="form-group">
                        <label class="control-label">Mot de passe</label>
                        <h3 text-color='red'>pas toucher pour le moment</h3>
                        <input type="password" class="form-control" name="mdpBen" value="" size="30" required />
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Confirmez votre mot de passe</label>
                        <input type="password" class="form-control" name="mdpBen2" value="" size="30" required />
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Adresse</label>
                        <input type="text" class="form-control" name="adresseBen" value="<?php echo $benevole[0]->adresseBen; ?>" size="30" required/>
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Code postale</label>
                            <input type="text" class="form-control" name="codePBen" value="<?php  echo $benevole[0]->codePBen; ?>" size="30" required/>
                    </div> 
                    <div class="form-group">
                        <label class="control-label">Ville</label>
                        <input type="text" class="form-control" name="villeBen" value="<?php echo $benevole[0]->villeBen; ?>" size="30" required/>
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Numéro de téléphone</label>
                        <input type="text" class="form-control" name="telBen" value="<?php echo $benevole[0]->telBen; ?>" size="30" required>
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
    
 