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
        <header>
            <h1 class="text-center" style="margin-bottom: 20px;">Modifiez un texte</h1>
        </header>
        <?php

        if (isset($_GET['file'])) {
            $file = $_GET['file'];
            $json = file_get_contents("./json/" . $file);
            $data = json_decode($json, true);

            if ($data === null) {
                echo "<p class='text-danger'>Erreur de lecture du fichier JSON !</p>";
                echo "<div class='text-center'>";
                echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
                echo "</div>";
                exit;
            }

            echo "<form action='jsonwriter.php' method='post'>";
            echo "<input type='hidden' name='file' value='$file'>";

            echo "<div class='text-center'>";
            echo "<input type='submit' class='btn btn-success' value='Modifier le fichier'>";
            echo "<div style='height: 20px;'></div>";
            echo "<a href='index.php' class='btn btn-primary'>Retour au menu</a>";
            echo "</div>";

            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    echo "<fieldset><legend>$key</legend>";
                    echo "<input type='hidden' name='TYPE_$key' value='array'>";
                    echo "<div class='form-group'>";
                    echo "<label for='$key' class='col-form-label'>$key</label>";
                    echo "<textarea type='text' rows='7' class='form-control' name='$key'>" . json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</textarea>";
                    echo "</div>";
                    echo "</fieldset>";
                } else {
                    echo "<div class='form-group'>";
                    echo "<label for='$key' class='col-form-label'>$key</label>";
                    if (is_int($value)) {
                        echo "<input type='hidden' name='TYPE_$key' value='int'>";
                        echo "<input type='number' class='form-control' name='$key' value='$value'>";
                    } elseif (is_bool($value)) {
                        echo "<input type='hidden' name='TYPE_$key' value='bool'>";
                        echo "<select class='form-control' name='$key'>";
                        echo "<option value='true'" . ($value ? ' selected' : '') . ">True</option>";
                        echo "<option value='false'" . (!$value ? ' selected' : '') . ">False</option>";
                        echo "</select>";
                    } else {
                        echo "<input type='hidden' name='TYPE_$key' value='string'>";
                        echo "<textarea type='text' rows='3' class='form-control' name='$key'>$value</textarea>";
                    }
                    echo "</div>";
                }


                echo "<div style='height: 3px; background-color: white; margin-top: 20px; margin-bottom: 20px; border-radius: 10px;'></div>";
            }

            echo "<div class='text-center'>";
            echo "<input type='submit' class='btn btn-success' value='Modifier le fichier'>";
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