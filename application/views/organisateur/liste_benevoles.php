<div class="container">
    <h2>Participants</h2>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Numéro de telephone</th>
                        <th scope="col">Voir plus</th>
                        <th scope="col">supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($benevoles as $item) { ?>
                            <td><?php echo $item->nomBen; ?></td>
                            <td><?php echo $item->prenomBen; ?></td>
                            <td><?php echo $item->mailBen; ?></td>
                            <td><?php echo $item->telBen; ?></td>
                            <td><p><a href="<?php echo base_url("index.php/OrganisateurCtrl/profil_ben/" . $item->idEvent); ?>">Plus</a></p></td>
                            <td><p><a href="<?php echo base_url("index.php/OrganisateurCtrl/supprimer_participant/" . $item->idEvent . $item->idBen); ?>">supprimer</a></p></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

