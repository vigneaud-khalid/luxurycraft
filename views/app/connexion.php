<?php include(VIEWS . '_partials/header.php'); ?>


<form method="post"      action="<?= BASE_PATH.'user/connexion' ?>"        >
  <fieldset>
  
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    </div>

  <input type="hidden" name="commmande" value="<?= $commande; ?>">

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" name="mdp" id="exampleInputPassword1" placeholder="Password">
      <div class="mt-2">
      <a href="<?= BASE_PATH.'user/inscription' ?>">Not yet signed up?  Click here to sign up!</a>
    
      </div>
    </div>
      
    <button type="submit" class="btn btn-primary">Log in</button>
  </fieldset>
</form>

<?php include(VIEWS . '_partials/footer.php'); ?>
