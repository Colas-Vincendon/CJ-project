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
    <title>Projet ECF: Garage Parrot</title>
    <meta type="description" content="Entretien de votre véhicule et vente de véhicules d'occasion" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./src/styles/style.css" />
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
                        <label class="my-2" for='titre'>Titre :</label></br>
                        <input type='text' id='titre' name='titre' required>
                    </div>
                    <div class='my-3'>
                        <label class="my-2" for='paragraphe'>Paragraphe :</label></br>
                        <textarea style="width: 50vw; height: 20vh; resize: none" id='paragraphe' name='paragraphe'
                            required></textarea>
                    </div>
                    <div class='my-3'>
                        <label class="my-2" for='image'>Image :</label></br>
                        <input class="btn btn-primary" type='file' id='image' name='image' required>
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

                    // Récupérer les services et leurs images associées depuis la base de données
                    $sql = "SELECT c.id, c.titre, c.paragraphe, i.image_base64
                         FROM nuri-chantiers s
                         LEFT JOIN nuri-chantiersimages i ON c.id = i.service_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $chantiers = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($chantiers)) {
                        foreach ($chantiers as $chantier) {
                            $chantierId = $chantier['id'];
                            $titre = $chantier['titre'];
                            $paragraphe = $chantier['paragraphe'];
                            $imageBase64 = $chantier['image_base64'];

                            // Afficher les informations du service
                            echo "<div class='col-12 col-md-6 col-xl-4 col-xxl-3 connect'><div class='container-fluid containerAllServices my-3 p-0'>";
                            if (!empty($imageBase64)) {
                                echo "<div class='container-fluid p-0'><img style='width: 100%; height: 200px;' class='img-fluid cover' src='data:image;base64,$imageBase64' alt='image du service'></div>";
                            }
                            echo "<h3>$titre</h3>";
                            echo "<p>$paragraphe</p>";
                            echo "<form action='supprimer_chantier.php' method='POST'>";
                            echo "<input type='hidden' name='service_id' value='$chantier'>";
                            echo "<button class='btn btn-danger my-1' type='submit' onclick='return confirmDelete()'>Supprimer</button>";
                            echo "</form>";
                            echo "</div></div>";
                        }
                    } else {
                        echo "Aucun service existant.";
                    }
                    $conn = null;
                    ?>
                </div>
            </div>
            
            <!-- --------------------------------- FOOTER --------------------------- -->
            
           
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="./src/scripts/script.js"></script>
</body>

</html>