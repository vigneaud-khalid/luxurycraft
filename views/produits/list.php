<?php include(VIEWS . '_partials/header.php'); 
if(!empty($_SESSION['membre']) && $_SESSION['membre']['role']=='ROLE_ADMIN'): 
?>
<a href="<?= BASE_PATH . 'produits/add'; ?>" class="btn btn-secondary mb-2 mt-2">Add</a>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Photo</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $produit): ?>
        <tr>
            <th scope="row"><?= $produit['id'] ?></th>
            <td><?= $produit['nom'] ?></td>
            <td><?= $produit['descriptif'] ?></td>
            <?php foreach ($categories as $categorie):
                if ($categorie['id'] == $produit['categorie_id']): ?>
                    <td><?= $categorie['nom'] ?></td>
                <?php endif;endforeach; ?>
            <td><?= $produit['prix'] ?></td>
            <td><?= $produit['stock'] ?></td>
            <td><img src="<?= '../../upload/' . $produit['photo'] ?>" width="40" height="40" alt=""></td>
            <td>
                <a href="<?= BASE_PATH.'produits/add?id='.$produit['id'];  ?>" class="btn btn-light">Edit</a>
                <a onclick="return(confirm('Etes vous sûr de vouloir supprimer ce produit?'))" href="<?= BASE_PATH.'produits/delete?id='.$produit['id'];  ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php

else:
echo ' <h1>not allowed  <a href="'.BASE_PATH.'" >Back home page</a> </h1>';

endif;

include(VIEWS . '_partials/footer.php'); ?>