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
        <h1 class="text-center">Modifier l'image</h1>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifier si un fichier a été téléchargé avec succès
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                // Emplacement temporaire du fichier téléchargé
                $tmp_name = $_FILES["file"]["tmp_name"];
                // Nom du fichier téléchargé
                $new_filename = $_FILES["file"]["name"];

                // Récupérer le nom du fichier existant
                $old_filename = $_POST['oldfile'];

                if (file_exists("img/$old_filename")) {
                    unlink("img/$old_filename");
                }
                move_uploaded_file($tmp_name, "img/$old_filename");
                echo "<p>L'image a été téléchargée et remplacée avec succès.</p>";
                echo "<div class='text-center'>";
                echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
                echo "</div>";
            } else {
                echo "<p class='text-danger'>Une erreur s'est produite lors du téléchargement du fichier.</p>";
                echo "<div class='text-center'>";
                echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
                echo "</div>";
            }
        }

        ?>
    </div>
</body>

</html>