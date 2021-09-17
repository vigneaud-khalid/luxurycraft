<?php include(VIEWS . '_partials/header.php'); 
if(!empty($_SESSION['membre']) && $_SESSION['membre']['role']=='ROLE_ADMIN'): 
?>
<a href="<?= BASE_PATH.'categories/add'; ?>" class="btn btn-secondary mb-2 mt-2">Add</a>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $categorie): ?>
    <tr>
        <th scope="row"><?= $categorie['id'] ?></th>
        <td><?= $categorie['nom'] ?></td>
        <td>
            <a href="<?= BASE_PATH.'categories/add?id='.$categorie['id'] ?>" class="btn btn-light">Edit</a>
            <a onclick="return(confirm('Are you sure you want to delete this category?'))" href="<?= BASE_PATH.'categories/delete?id='.$categorie['id'] ?>" class="btn btn-danger">Delete</a>
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