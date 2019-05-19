<!--<link href="?php echo base_url()."../template/css/Connexion.css"; ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->

<div class="container login-container2" align="left">
    <div class="row">

        <?php echo form_open_multipart('EventCtrl/create_event'); ?>




        <div class="col-md-6 col-md-offset-3 login-form-3 text-center">
            <div class="text-center">
                <h2>Créer Votre événement!</h2>
            </div>

            <div class="my-register">				

                <div class="form-group">
                    <label class="control-label"><h5><strong>Nom de votre événement</h5></strong></label>
                    <input type="text" class="form-control" name="nomEvent" placeholder="Nom" value="" size="50" required /> 
                </div>

                <div  class="form-group">

                    <label class="control-label"><h5><strong>Type d'événement </h5></strong></label>
                    <select name ="idType" required>
                        <?php foreach ($typeEvent as $type) { ?>        
                            <option value="<?php echo $type->idType; ?>"><?php echo $type->descriptionType; ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="form-group">
                    <label class="control-label"><h5><strong>Affiche</h5></strong></label>
                    <input type="file" class="form-control" name="imageEvent" value="" size="50" required/>
                </div>
                <div class="form-group">
                    <label class="control-label"><h5><strong>Début</h5></strong></label>
                    <input type="date" class="form-control" name="dateDebut" placeholder="debut" value="" size="50" required /> 
                </div>

                <div class="form-group">
                    <label class="control-label"><h5><strong>Fin</h5></strong></label>
                    <input type="date" class="form-control" name="dateFin" value="" size="50" placeholder="Fin" required/>
                </div>

                <div class="form-group">
                    <label class="control-label"><h5><strong>Lieu</h5></strong></label>
                    <input type="text" class="form-control" name="lieu" value="" placeholder="lieu" size="50" required/>
                </div>


                <div class="form-group">
                    <label class="control-label"><h5><strong>Description</h5></strong></label>
                    <input type="text" class="form-control" name="description" value="" placeholder="description" size="300" required/>
                </div>


               






                <div class="text-center"><input class="btnSubmit" type="submit" value="upload" /></div>


                <br>
                <br>



            </div>

        </div>
    </div>
</div>


