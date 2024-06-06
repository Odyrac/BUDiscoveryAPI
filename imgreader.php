<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/logo.png" />
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>

    <?php include 'assets/navbar.php';
    include 'assets/amiconnected.php'; ?>

    <div class="container">
        <h1 class="text-center">Modifier une image</h1>
        <?php

        if (isset($_GET['file'])) {
            $file = $_GET['file'];

            echo "<form action='imgwriter.php' method='post' enctype='multipart/form-data'>";
            echo "<div class='form-group'>";
            echo "<label for='file' class='col-form-label'>Nouvelle image pour $file</label>";
            echo "<input type='file' name='file' class='form-control-file'>";
            echo "</div>";
            echo "<input type='hidden' name='oldfile' value='$file'>";
            echo "<div class='text-center'>";
            echo "<button type='submit' class='btn btn-success'>Modifier le fichier</button>";
            echo "<div style='height: 20px;'></div>";
            echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "<p class='text-danger'>Aucun fichier spécifié !</p>";
            echo "<div class='text-center'>";
            echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
            echo "</div>";
        }

        ?>
    </div>
</body>

</html>