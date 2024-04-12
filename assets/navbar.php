<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid flex-md-row flex-column">
    <a class="navbar-brand" href="index.php">
      <img src="assets/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      BUDiscovery API
    </a>

    <?php
    include 'assets/pass.php';
    if (isset($_COOKIE['password']) && $_COOKIE['password'] == $password_global) {
      echo '<form class="d-flex flex-md-row flex-column align-items-center" method="post" action="login.php">';
      echo '<span class="badge bg-success m-2">Vous êtes connecté !</span>';
      echo '<button class="btn btn-danger m-2" type="submit">Déconnexion</button>';
      echo '</form>';
    } else {
      echo '<form class="d-flex flex-md-row flex-column align-items-center" method="post" action="login.php">';
      if (isset($_GET['error']) && $_GET['error'] == 'wrongauth') {
        echo '<span class="badge bg-warning m-2">Mot de passe incorrect !</span>';
      }
      if (isset($_GET['error']) && $_GET['error'] == 'noauth') {
        echo '<span class="badge bg-warning m-2">Merci de vous connecter !</span>';
      }
      echo '<span class="badge bg-danger m-2">Vous n\'êtes pas connecté !</span>';
      echo '<input class="form-control m-2" type="password" placeholder="Mot de passe" name="password" required>';
      echo '<button class="btn btn-success m-2" type="submit">Connexion</button>';
      echo '</form>';
    }
    ?>
  </div>
</nav>