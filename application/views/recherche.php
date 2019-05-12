<div class="container">
    <h2>Votre Recherche</h2>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Evenement</th>
                        <th scope="col">Date</th>
                        <th scope="col">Lieu</th>
                        <th scope="col">Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($events as $event) { ?>
                            <td><?php echo $event->nomEvent; ?></td>
                            <td><?php echo $event->dateDebut; ?></td>
                            <td><?php echo $event->lieu; ?></td>
                            <td><p><a href="<?php echo base_url("AccueilCtrl/afficher_event/" . $event->idEvent); ?>">Plus</a></p></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

