<?php include(VIEWS . '_partials/header.php'); 
if(!empty($_SESSION['membre']) && $_SESSION['membre']['role']=='ROLE_ADMIN'): 
?>
<?php //var_dump($details); ?>
<?php foreach ($commandes as $commande) : ?>
    <table class="table table-dark mb-1">
        <thead>
        <tr>
            <?php $user=Utilisateur::findById(['id'=>$commande['utilisateur_id']]); ?>
            <th class="text-center" colspan="6">Ordered by <?= $user['prenom'].'  '.strtoupper($user['nom'] ) ?> </th>
        </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Details</th>
            </tr>
            
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?= $commande['id'] ?></th>
                <td><?= $commande['date'] ?></td>
                <td><?= $commande['montant'] ?> €</td>
                <td><?= $commande['statut'] ?></td>

                <?php if (empty($details)) : ?>
                    <td>
                        <a href="<?= BASE_PATH . 'produits/recap?id=' . $commande['id'] ?>" class="btn btn-light">View details</a>

                    </td>
                    <?php else :
                    if ($details[0]['commande_id'] == $commande['id']) :    ?>

                        <td>
                            <a href="<?= BASE_PATH . 'produits/recap?action=vider' ?>" class="btn btn-light">Hide details</a>

                        </td>
                    <?php else : ?>
                        <td>
                            <a href="<?= BASE_PATH . 'produits/recap?id=' . $commande['id'] ?>" class="btn btn-light">View details</a>

                        </td>
                <?php endif; endif; ?>
            </tr>
        </tbody>
    </table>
    <?php if (!empty($details) && $details[0]['commande_id'] == $commande['id']) : ?>
        <table class="table table-light mt-0">
            <thead>
                <tr>
                    <th scope="col">Product photo</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($details as $detail):
//                 dans la table détail, nous avons access  à la propriété produit_id ainsi pour obtenir le détail de notre produit on appel la méthode find() du model produit.php à laquelle on transmet le produit_id de notre ligne de détail en paramètre et accédons directement à la propriété souhaité du produit
                $produit=Produit::find(['id'=>$detail['produit_id']]);
                ?>
                <tr>

                    <td><img src="<?= '../../upload/'.$produit['photo'] ?>" width="50" height="50"  alt=""></td>
                    <td><?= $produit['nom']  ?></td>
                    <td><?= $detail['montant'] ?> €</td>
                    <td><?= $detail['quantite'] ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; endforeach; ?>



<?php

else:
echo ' <h1>not allowed  <a href="'.BASE_PATH.'" >Back home page</a> </h1>';

endif;

include(VIEWS . '_partials/footer.php'); ?>