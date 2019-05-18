<!--<link href="?php echo base_url()."../template/css/Connexion.css"; ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->

<div class="container login-container2" align="left">
    <div class="row">
        <div class="col-md-6 login-form-3"><br>

            <?php echo form_open_multipart('OrganisateurCtrl/create_event'); ?>



            <br>
            <div class="text-center">
                <h3>Créer Votre événement!</h3>
            </div>

            <br>					

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


            <br>






            <div class="text-center"><input class="btnSubmit" type="submit" value="upload" /></div>


            <br>
            <br>



        </div>

    </div>
</div>

