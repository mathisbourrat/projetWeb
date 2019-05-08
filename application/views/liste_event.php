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
                        <th scope="col">Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($event as $item) { ?>
                            <td><?php echo $item->nomEvent; ?></td>
                            <td><?php echo $item->dateDebut; ?></td>
                            <td><?php echo $item->lieu; ?></td>
                            <td><p><a href="<?php echo base_url("AccueilCtrl/afficher_event/" . $item->idEvent); ?>">Plus</a></p></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

