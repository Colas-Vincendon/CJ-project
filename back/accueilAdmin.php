<?php
session_start();

// Vérifier si l'utilisateur est connecté et s'il est administrateur, sinon le rediriger vers la page de connexion
if (!isset($_SESSION['email']) || $_SESSION['isAdmin'] != 1) {
    header('Location: connexion.php');
    exit();
}

// if (!isset($_COOKIE['connexion_time'])) {
//     // Le cookie n'existe pas, procédez à l'authentification
// } else {
//     // Le cookie existe, vérifiez s'il est expiré
//     $currentTime = time();
//     $cookieTime = $_COOKIE['connexion_time'];
//     $expirationTime = $cookieTime + 30; // 30 secondes d'expiration

//     if ($currentTime >= $expirationTime) {
//         // Le cookie est expiré, procédez à l'authentification
//         header('Location: connexion.php');
//         exit;
//     }
// }

// setcookie('connexion_time', time(), time() + 30);

if (isset($_POST['logout'])) {
    // Déconnexion : Supprimer les informations de session et le cookie
    session_unset();
    session_destroy();

    // Redirection vers la page de connexion
    header('Location: connexion.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A compléter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    <!-- --------------------------- BODY ------------------------- -->
    <div>
        <div>
            <!-- ------------------------ TOP-HEADER ----------------------- -->

            <!-- ------------------------------ HEADER ------------------------------- -->

            <!-- --------------------------------- START NAVBAR ------------------------------ -->

            <!-- ------------------------------ END NAVBAR ------------------------------- -->

            <!-- ------------------------------ DEBUT MAIN ------------------------------- -->
            <div class="container d-flex align-items-center justify-content-center my-2">

                <h1 class="my-3 mx-3"><b></b>Espace Administrateur</b></h1><br>
                <br>
                <form method="post">
                    <button class="btn btn-danger my-3 mx-3" type="submit" name="logout">Se déconnecter</button>
                </form>
            </div>

            <div class="container text-center connect my-2">
                <h1 class='ml-0 text-grey my-3'>Ajouter un nouveau chantier dans "Nos réalisations"</h1>
                <form action='ajouter_chantier.php' method='POST' enctype='multipart/form-data'>
                    <div>
                        <label class="my-2" for='titre'>Titre :</label><br>
                        <input type='text' id='titre' name='titre' required>
                    </div>
                    <div class='my-3'>
                        <label class="my-2" for='paragraphe'>Paragraphe :</label><br>
                        <textarea style="width: 50vw; height: 20vh; resize: none" id='paragraphe' name='paragraphe'
                            required></textarea>
                    </div>
                    <div class='my-3'>
                        <label class="my-2" for='images'>Images :</label><br>
                        <input class="btn btn-primary" type='file' id='images' name='images[]' multiple required>
                    </div>
                    <button class="btn btn-success my-5" type='submit'>Ajouter</button>
                </form>
            </div>




            <div class="container text-center connect my-2">
                <h1 class="ml-0 text-grey my-3">Supprimer un chantier de la page "Nos réalisations"</h1>
                <div class="row">
                    <?php
                    require_once 'databaseConnexion.php';

                    //SINGLETON
                    $database = Database::getInstance();
                    $conn = $database->getConnection();

                    // Récupérer les chantiers depuis la base de données
                    $sql = "SELECT c.id, c.titre, c.paragraphe
        FROM nurichantiers c";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $chantiers = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($chantiers)) {
                        foreach ($chantiers as $chantier) {
                            $chantierId = $chantier['id'];
                            $titre = $chantier['titre'];
                            $paragraphe = $chantier['paragraphe'];

                            // Récupérer les images du chantier depuis la base de données
                            // Requête préparée pour récupérer les images du chantier
                            $stmtImages = $conn->prepare("SELECT image_base64 FROM nurichantiersimages WHERE chantiersID = :chantierId");
                            $stmtImages->bindParam(':chantierId', $chantierId);
                            $stmtImages->execute();
                            $images = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

                            echo "<div class='col-12 col-lg-5 mx-2 my-2 py-3 border border-secondary' style='background-color:lightblue'>";
                            echo "<div>";
                            echo "<h3>$titre</h3>";
                            echo "<p>$paragraphe</p>";

                            if (count($images) === 1) {
                                // Afficher une seule image
                                echo "<img src='data:image/jpeg;base64," . $images[0]['image_base64'] . "' class='d-block w-100' alt='Image chantier'>";
                            } else if (count($images) > 1) {
                                // Afficher un carousel
                                echo "<div id='carouselExampleIndicators_$chantierId' class='carousel slide' data-bs-ride='carousel'>";
                                echo "<ol class='carousel-indicators'>";
                                foreach ($images as $index => $image) {
                                    $active = ($index === 0) ? "active" : "";
                                    echo "<li data-bs-target='#carouselExampleIndicators_$chantierId' data-bs-slide-to='$index' class='$active'></li>";
                                }
                                echo "</ol>";

                                echo "<div class='carousel-inner'>";
                                foreach ($images as $index => $image) {
                                    $active = ($index === 0) ? "active" : "";
                                    echo "<div class='carousel-item $active'>";
                                    echo "<img src='data:image/jpeg;base64," . $image['image_base64'] . "' class='d-block w-100' alt='Image chantier'>";
                                    echo "</div>";
                                }
                                echo "</div>";

                                echo "<a class='carousel-control-prev' href='#carouselExampleIndicators_$chantierId' role='button' data-bs-slide='prev'>";
                                echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                                echo "<span class='visually-hidden'>Previous</span>";
                                echo "</a>";
                                echo "<a class='carousel-control-next' href='#carouselExampleIndicators_$chantierId' role='button' data-bs-slide='next'>";
                                echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
                                echo "<span class='visually-hidden'>Next</span>";
                                echo "</a>";

                                echo "</div>";
                            }

                            echo "<div class='my-3'>";
                            echo "<form action='supprimer_chantier.php' method='POST'>";
                            echo "<input type='hidden' name='chantier_id' value='$chantierId'>";
                            echo "<button class='btn btn-danger my-1' type='submit' onclick='return confirmDeleteChantier()'>Supprimer</button>";
                            echo "</form>";
                            echo "</div>";

                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "Aucun chantier existant.";
                    }

                    $conn = null;
                    ?>

                </div>
            </div>









            <!-- --------------------------------- FOOTER --------------------------- -->


        </div>
    </div>
    <script src="../front/script/supprimer_chantier.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>