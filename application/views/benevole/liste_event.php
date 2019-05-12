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
                        <th scope="col">s'engager</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($event as $item) { ?>
                            <td><?php echo $item->nomEvent; ?></td>
                            <td><?php echo $item->dateDebut; ?></td>
                            <td><?php echo $item->lieu; ?></td>
                            <td><p><a href="<?php echo base_url("index.php/BenevoleCtrl/participer/" . $item->idEvent); ?>">Participer</a></p></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

