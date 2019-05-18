<div class="container">
    <h2>Participants à l'événement <?php echo $nameEvent[0]->nomEvent; ?> </h2>

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
                            <td><a href="<?php echo base_url("index.php/OrganisateurCtrl/profil_ben/" . $item->idEvent); ?>"class="btn btn-default" role="button">Profil</a></p></td>
                            <td><a href="<?php echo base_url("index.php/OrganisateurCtrl/supprimer_benevole/" . $item->idEvent); ?>" class="btn btn-danger" role="button"
                                   onclick="return confirm('la suppression neut être annulée après confirmation')">supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

