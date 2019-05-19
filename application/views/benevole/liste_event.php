<div class="container">
    <h2>Futurs Evénements!</h2>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Evenement</th>
                        <th scope="col">Date</th>
                        <th scope="col">Lieu</th>
                        <th scope="col">Afficher</th>
                        <th scope="col">annuler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($event as $item) { ?>
                            <td><?php echo $item->nomEvent; ?></td>
                            <td><?php echo $item->dateDebut; ?></td>
                            <td><?php echo $item->lieu; ?></td>
                            
                            <td><a href="<?php echo base_url("index.php/AccueilCtrl/event" . $item->idEvent); ?>" class="btn btn-info" role="button">Voir</a>
                        
                            <td><a href="<?php echo base_url("index.php/EventCtrl/supprimer_benevole/" . $item->idEvent . "/" . $idBen); ?>" class="btn btn-danger" role="button"
                                   onclick="confirm('la suppression neut être annulée après confirmation')">annuler</a>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

