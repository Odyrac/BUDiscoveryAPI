<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/logo.png" />
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>

    <?php include 'assets/navbar.php';
    include 'assets/amiconnected.php'; ?>

    <div class="container">
        <h1 class="text-center">Reset</h1>
        <?php

        if (!isset($_POST['reset'])) {
            echo "<p>Êtes-vous sûr de vouloir effectuer un reset ?</p>";
            echo "<form action='reset.php' method='post' class='text-center'>";
            echo "<button type='submit' name='reset' class='btn btn-danger'>Oui</button>";
            echo "</form>";
            echo "<div class='text-center mt-3'>";
            echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
            echo "</div>";
            exit();
        }

        $dir = './json';
        $dirBackup = './jsonBackup';

        $dirImg = './img';
        $dirImgBackup = './imgBackup';

        // Ouvrir un répertoire et lire son contenu
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        unlink($dir . "/" . $file);
                    }
                }
                closedir($dh);
            }
        }

        if (is_dir($dirImg)) {
            if ($dh = opendir($dirImg)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        unlink($dirImg . "/" . $file);
                    }
                }
                closedir($dh);
            }
        }

        if (is_dir($dirBackup)) {
            if ($dh = opendir($dirBackup)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        copy($dirBackup . "/" . $file, $dir . "/" . $file);
                    }
                }
                closedir($dh);
            }
        }

        if (is_dir($dirImgBackup)) {
            if ($dh = opendir($dirImgBackup)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        copy($dirImgBackup . "/" . $file, $dirImg . "/" . $file);
                    }
                }
                closedir($dh);
            }
        }

        echo "<p>Reset effectué avec succès !</p>";
        echo "<div class='text-center'>";
        echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
        echo "</div>";


        ?>
    </div>
</body>

</html>