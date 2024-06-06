<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélectionner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/logo.png" />
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>

    <?php include 'assets/navbar.php'; ?>

    <div class="container">
        <div class="alert alert-warning" role="alert">
            Ce site permet de modifier les textes ainsi que les images de BUDiscovery. Une fois les données modifiées, il est nécessaire de synchroniser votre application avec le serveur depuis les options de cette dernière.
        </div>
        <header style="margin-top: 40px;">
            <h1 class="text-center">Sélectionnez un fichier</h1>
        </header>


        <div class="row justify-content-center" style="margin-top: 40px;">
            <div class="col-md-6">

                <h3 class="text-center">Modifier un texte</h3>
                <?php
                $dirJson = './json';
                $files = array();

                if (is_dir($dirJson)) {
                    if ($dh = opendir($dirJson)) {
                        while (($file = readdir($dh)) !== false) {
                            if ($file != "." && $file != "..") {
                                $files[] = $file;
                            }
                        }
                        closedir($dh);
                    }
                }

                sort($files); // Trie les noms de fichiers par ordre alphabétique

                echo "<form action='jsonreader.php' method='get' class='form-inline justify-content-center'>";
                echo "<select name='file' class='form-control m-2'>";

                foreach ($files as $file) {
                    echo "<option value='$file'>$file</option>";
                }

                echo "</select>";
                echo "<button type='submit' class='btn btn-primary'>Modifier</button>";
                echo "</form>";
                ?>

                <p class="text-center">
                    <i>Si vous modifiez un fichier JSON, pensez bien à modifier son potentiel homologue en version anglaise.</i>
                </p>
                <h3 class="text-center" style="margin-top: 40px;">Modifier une image</h3>
                <?php
                $dirImg = './img';
                $files = array();

                if (is_dir($dirImg)) {
                    if ($dh = opendir($dirImg)) {
                        while (($file = readdir($dh)) !== false) {
                            if ($file != "." && $file != "..") {
                                $files[] = $file;
                            }
                        }
                        closedir($dh);
                    }
                }

                sort($files); // Trie les noms de fichiers par ordre alphabétique

                echo "<form action='imgreader.php' method='get' class='form-inline justify-content-center'>";
                echo "<select name='file' class='form-control m-2'>";

                foreach ($files as $file) {
                    echo "<option value='$file'>$file</option>";
                }

                echo "</select>";
                echo "<button type='submit' class='btn btn-primary'>Modifier</button>";
                echo "</form>";
                ?>

                <div class="text-center" style="margin-top: 50px;">
                    <a href="reset.php" class="btn btn-danger" id="resetBtn">Remettre les fichiers comme à l'origine</a>
                </div>

                <div class="row" style="margin-top: 80px;">
                    <div class="col-md-6">
                        <table class="table table-dark" style="border-radius: 10px;">
                            <thead>
                                <tr style="border-top-style:hidden;">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dir = './img';
                                $files = array();

                                if (is_dir($dir)) {
                                    if ($dh = opendir($dir)) {
                                        while (($file = readdir($dh)) !== false) {
                                            if ($file != "." && $file != "..") {
                                                $files[] = $file;
                                            }
                                        }
                                        closedir($dh);
                                    }
                                }

                                sort($files); // Trie les noms de fichiers par ordre alphabétique

                                $timestamp = time(); // Pour forcer le navigateur à recharger les images

                                foreach ($files as $file) {
                                    echo "<tr>";
                                    echo "<td>$file</td>";
                                    echo "<td><img src='img/$file?t=$timestamp' alt='$file' style='max-width: 70px;'></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-dark" style="border-radius: 10px;">
                            <thead>
                                <tr style="border-top-style:hidden;">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Contenu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dir = './json';
                                $files = array();

                                if (is_dir($dir)) {
                                    if ($dh = opendir($dir)) {
                                        while (($file = readdir($dh)) !== false) {
                                            if ($file != "." && $file != "..") {
                                                $files[] = $file;
                                            }
                                        }
                                        closedir($dh);
                                    }
                                }

                                sort($files); // Trie les noms de fichiers par ordre alphabétique

                                foreach ($files as $file) {
                                    echo "<tr>";
                                    echo "<td>$file</td>";
                                    echo "<td><a href='json/$file' target='_blank' class='btn btn-primary'>Ouvrir</a></td>";
                                    echo "</tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Confirmation avant de réinitialiser les fichiers
        document.getElementById('resetBtn').addEventListener('click', function(e) {
            var confirmation = confirm("Êtes-vous sûr de vouloir réinitialiser les fichiers ?");
            if (!confirmation) {
                e.preventDefault(); // Annuler la redirection si l'utilisateur annule
            }
        });
    </script>
</body>

</html>