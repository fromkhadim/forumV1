<!-- ========================================================================================== -->
<!-- Inclusion de l'en-tete  dans mon fichier inscription.HTML -->

<?php include_once './includes/header.php'; ?>
<main>
  <div class="container col-md-8 col-md-offset-2" id="parametres">
    <div class="inscription_title">
      <h1>INSCRIPTION</h1>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="hero-overview">
        <img src="./assets/background.png" height="500" width="400" alt="image">
      </div>
      <!-- ========================================================================================== -->
      <form action="inscription.php" method="POST" id="inscription">
        <fieldset>
          <div class="form-group">
            <label for="prenom">PRENOM</label>
            <input type="text" id="prenom" class="form-control" name="prenom">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i>
            <small>Message d'erreur</small>
          </div>
          <div class="form-group">
            <label for="nom">NOM</label>
            <input type="text" id="nom" class="form-control" name="nom">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i>
            <small> Message d'erreur</small>
          </div>
          <div class="form-group">
            <label for="email">EMAIL</label>
            <input type="email" id="email" class="form-control" name="email">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i>
            <small>Message d'erreur</small>
          </div>
          <div class="form-group">
            <label for="login">LOGIN</label>
            <input type="text" id="login" class="form-control" name="login">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i>
            <small>Message d'erreur</small>
          </div>
          <div class="form-group">
            <label for="password">MOT DE PASSE</label>
            <input type="password" id="password" class="form-control" name="password">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i>
            <small>Message d'erreur</small>
          </div>
          <div class="form-group">
            <label for="password_bis"> CONFIRMATION MOT DE PASSE</label>
            <input type="password" id="password_bis" class="form-control" name="password_bis">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation"></i>
            <small>Message d'erreur</small>
          </div>
          <div class="validation_inscription">
            <button type="submit" class="btn btn-primary" name="envoyer"><i class="fas fa-user-plus"></i>
              S'INSCRIRE
            </button>
          </div>
        </fieldset>
      </form>
      <div class="Els">
        <p>Déjà un compte? <a href="connection.html"> Se connecter</a></p>
      </div>
    </div>
  </div>
</main>
<!-- ========================================================================================== -->
<!-- Inclusion du pied de page dans mon fichier inscription.HTML -->
<?php 
  require_once './includes/footer.php'; 
  ?>
<!-- ========================================================================================== -->
</body>

</html>