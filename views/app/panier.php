<?php include(VIEWS . '_partials/header.php'); 

if (empty($_SESSION['panier'])):
echo '<p>Your cart is empty, fill it quickly <a class="btn btn-success" href="'. BASE_PATH .'">Store access</a> </p>';
else:
?>


<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Photo</th>
        
    </tr>
    </thead>
    <tbody>
    <?php $total=0; for($i=0; $i<count($_SESSION['panier']['id']); $i++ ): ?>
        <tr>
            <th scope="row"><?= $_SESSION['panier']['id'][$i] ?></th>
            <td><?= $_SESSION['panier']['nom'][$i] ?></td>
            <td><?= $_SESSION['panier']['prix'][$i] ?></td>
            <td><?= $_SESSION['panier']['quantite'][$i] ?></td>
            <td><img src="<?= '../../upload/' . $_SESSION['panier']['photo'][$i] ?>" width="40" height="40" alt=""></td>
        </tr>

        <?php $total +=$_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
     endfor; ?>

    </tbody>
</table>
<h3>Montant total : <?= $total ?> euros</h3>
<a href="<?= BASE_PATH.'panier/list?action=vider' ?>" class="btn btn-secondary">Empty the cart</a>
<?php if (!empty($_SESSION['membre'])): ?>
<a href="<?= BASE_PATH.'produit/commande' ?>" class="btn btn-warning">Confirm order</a>
<?php else: ?>
    <a href="<?= BASE_PATH.'user/connexion?commande=true' ?>" class="btn btn-warning">Log in to place order</a>

<?php endif; ?>


<?php include(VIEWS . '_partials/footer.php') ;endif;?>

