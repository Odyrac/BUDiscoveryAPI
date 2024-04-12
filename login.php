<?php
include 'assets/pass.php';

// L'utilisateur est déjà connecté
if (isset($_COOKIE['password']) && $_COOKIE['password'] == $password_global) {
    setcookie('password', '', time() - 3600, '/', null, false, true);
    header('Location: index.php');
    exit();
}

if (isset($_POST['password']) && $_POST['password'] == $password_global) {
    setcookie('password', $password_global, time() + 365 * 24 * 3600, '/', null, false, true);
    header('Location: index.php');
} else {
    setcookie('password', '', time() - 3600, '/', null, false, true);
    header('Location: index.php?error=wrongauth');
}
?>