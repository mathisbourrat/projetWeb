<div class="container">
    <div class="row">





                <h2>Votre Profil</h2>

        <div class="col-md-6 text-center">
            <div class='my-update'>
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <?php echo form_open('BenevoleCtrl/modifier'); ?>
                        <div class="form-group">
                            <label class="control-label">Nom</label>
                            <input type="text" class="form-control" name="nomBen" value="<?php echo $benevole[0]->nomBen; ?>" size="30" required/> 
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
                            <label class="control-label">Adresse</label>
                            <input type="text" class="form-control" name="adresseBen" value="<?php echo $benevole[0]->adresseBen; ?>" size="30" required/>
                        </div>    
                        <div class="form-group">
                            <label class="control-label">Code postale</label>
                            <input type="text" class="form-control" name="codePBen" value="<?php echo $benevole[0]->codePBen; ?>" size="30" required/>
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
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div class="my-form">
                        <div class='my-update'>

                            <h3>Changement de mot de passe</h3>



                            <div class="form-group">
                                <label class="control-label">Mot de passe</label>
                                <input type="password" class="form-control" name="mdpBen" value="" placeholder="Mot de passe" minlength="8" size="30" >
                            </div>

                            <div class="form-group">
                                <label class="control-label">Confirmation</label>
                                <input type="password" class="form-control" name="mdp2Ben" value="" placeholder="Mot de passe" minlength="8" size="30" >
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="change_psw" value="1"> je confirme vouloir changer mon mot de passe<br>                               
                            </div>


                            <div class="text-center"><input class="btn btn-primary" type="submit" value="Changer mot de passe" /></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

