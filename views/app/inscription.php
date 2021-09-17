<?php include(VIEWS . '_partials/header.php'); ?>


<form method="post" action="<?= BASE_PATH.'user/inscription' ?>">
  <fieldset>
  <input type="hidden" name="id" value="<?= 0 ?>">

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" name="mdp" id="exampleInputPassword1" placeholder="Mot de passe">
    </div>
      <div class="form-group">
          <label for="exampleInputPassword1" class="form-label mt-4">Name</label>
          <input type="text" class="form-control" name="nom" id="exampleInputPassword1" placeholder="Nom">
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1" class="form-label mt-4">First name</label>
          <input type="text" class="form-control" name="prenom" id="exampleInputPassword1" placeholder="Prenom">
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1" class="form-label mt-4">Address</label>
          <input type="text" class="form-control" name="adresse" id="exampleInputPassword1" placeholder="Adresse">
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1" class="form-label mt-4">Zip code</label>
          <input type="text" class="form-control" name="cp" id="exampleInputPassword1" placeholder="Code postal">
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1" class="form-label mt-4">City</label>
          <input type="text" class="form-control" name="ville" id="exampleInputPassword1" placeholder="Ville">
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1" class="form-label mt-4">Phone number</label>
          <input type="text" class="form-control" name="tel" id="exampleInputPassword1" placeholder="Numéro de téléphone">
      <div class="mt-2"></div></div>
      <a href="<?= BASE_PATH.'user/connexion' ?>">Already registered?  Please log in!</a>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
  </fieldset>
</form>

<?php include(VIEWS . '_partials/footer.php'); ?>
