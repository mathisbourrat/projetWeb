
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 login-form-3 text-center">
            <br>

            <div class="text-center">
                <h2>Modifier l'événement <?php echo $event[0]->nomEvent; ?></h2>
            </div>
            <div class="my-register">
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php echo form_open('Events/update_event/' . $event[0]->idEvent); ?>

                    <div class="form-group">
                        <label class="control-label">Nom</label>
                        <input type="text" class="form-control" name="nomEvent" value="<?php echo $event[0]->nomEvent; ?>" size="30" required/> 

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
                        <label class="control-label"><strong>Affiche</strong></label>
                        <input type="file" class="form-control" name="imageEvent" value="<?php echo $event[0]->imageEvent; ?>" size="50"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Debut</label>
                        <input type="date" class="form-control" name="dateDebut" value=" <?php echo $event[0]->dateDebut; ?>" size="30" required/>
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Fin</label>
                        <input type="date" class="form-control" name="dateFin" value="<?php echo $event[0]->dateFin; ?>" size="30" required/> 
                    </div>  


                    <div class="form-group">
                        <label class="control-label">Lieu</label>
                        <input type="text" class="form-control" name="lieu" value="<?php echo $event[0]->lieu; ?>" size="30" required/>
                    </div>    
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <input type="text" class="form-control" name="description" value="<?php echo $event[0]->description; ?>" size="400" required/>
                    </div>

                    <input class="btn btn-primary btn-success btn-block" type="submit" value="Modifier" />



                    <div>
                        <a href="<?php echo base_url("index.php/Events/supprimer_event/" . $event[0]->idEvent); ?>" class="btn btn-primary btn-danger btn-block" 
                           onclick="return confirm('la suppression ne peut être annulée après cette page')">Supprimer</a>
                    </div>         


                </div>
            </div>


        </div>
    </div>

