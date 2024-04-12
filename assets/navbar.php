<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="assets/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      BUDiscovery API
    </a>

    <?php
    include 'assets/pass.php';
    if (isset($_COOKIE['password']) && $_COOKIE['password'] == $password_global) {
      echo '<form class="d-flex flex-row align-items-center" method="post" action="login.php">';
      echo '<span class="badge bg-success mx-2">Vous êtes connecté !</span>';
      echo '<button class="btn btn-danger mx-2" type="submit">Déconnexion</button>';
      echo '</form>';
    } else {
      echo '<form class="d-flex flex-row align-items-center" method="post" action="login.php">';
      if (isset($_GET['error']) && $_GET['error'] == 'wrongauth') {
        echo '<span class="badge bg-warning mx-2">Mot de passe incorrect !</span>';
      }
      if (isset($_GET['error']) && $_GET['error'] == 'noauth') {
        echo '<span class="badge bg-warning mx-2">Merci de vous connecter !</span>';
      }
      echo '<span class="badge bg-danger mx-2">Vous n\'êtes pas connecté !</span>';
      echo '<input class="form-control mx-2" type="password" placeholder="Mot de passe" name="password" required>';
      echo '<button class="btn btn-success mx-2" type="submit">Connexion</button>';
      echo '</form>';
    }
    ?>
  </div>
</nav>