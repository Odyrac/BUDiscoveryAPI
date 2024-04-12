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
        <h1 class="text-center">Modifier le fichier</h1>
        <?php

        function updateData(&$data, $formData)
        {
            foreach ($formData as $key => $value) {

                $type = $formData["TYPE_$key"];

                if ($type === "int") {
                    $data[$key] = intval($value);
                } elseif ($type === "bool") {
                    if ($value === "true") {
                        $data[$key] = true;
                    } else {
                        $data[$key] = false;
                    }
                } elseif ($type === "string") {
                    $data[$key] = $value;
                } elseif ($type === "array") {
                    $array = json_decode($value, true);
                    if ($array === null) {
                        echo "<p class='text-danger'>Erreur de lecture du tableau JSON !</p>";
                        echo "<div class='text-center'>";
                        echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
                        echo "</div>";
                        exit;
                    }
                    $data[$key] = $array;
                }
            }
        }


        if (isset($_POST['file'])) {
            $file = $_POST['file'];
            $json = file_get_contents("./json/" . $file);
            $data = json_decode($json, true);

            if ($data === null) {
                echo "<p class='text-danger'>Erreur de lecture du fichier JSON !</p>";
                echo "<div class='text-center'>";
                echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
                echo "</div>";
                exit;
            }

            updateData($data, $_POST);

            file_put_contents("./json/" . $file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo "<p>Fichier $file modifié avec succès !</p>";
            echo "<div class='text-center'>";
            echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
            echo "</div>";
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