<?php
if (isset($_COOKIE['password']) && $_COOKIE['password'] == $password_global) {
    return true;
} else {
    header('Location: index.php?error=noauth');
    exit();
}