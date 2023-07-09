<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./src/styles/style.css" />
</head>

<body>
    <!-- --------------------------- BODY ------------------------- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col col-12">

                <!-- ------------------------------ HEADER ------------------------------- -->
                <?php

                require_once '../front/components/header.html';

                // Récupérer les valeurs des champs
                $email = $_POST['email'];
                $password = $_POST['password'];

                require_once 'databaseConnexion.php';
                //SINGLETON
                $database = Database::getInstance();
                $conn = $database->getConnection();

                $errorMessage = ''; // Initialiser le message d'erreur à une chaîne vide
                
                if (isset($_POST['connect'])) { // Vérifier si le bouton 'Se connecter' a été soumis
                    // Requête pour récupérer le hash du mot de passe enregistré
                    $stmt = $conn->prepare("SELECT password, isAdmin FROM nuriEmployes WHERE email = :email");
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row && password_verify($password, $row['password'])) {
                        // Mot de passe correct, définir les informations de session
                        $_SESSION['email'] = $email;
                        $_SESSION['isAdmin'] = $row['isAdmin'];

                        // Définition de la page de redirection
                        $redirectPage = 'accueilAdmin.php';

                        // Redirection vers la page appropriée
                        echo '<script>window.location.href = "' . $redirectPage . '";</script>';
                        exit();
                    } else {
                        $errorMessage = 'Adresse e-mail ou mot de passe incorrect.';
                    }
                }

                $conn = null;

                ?>
                <div class="container-fluid text-center my-3 py-3">
                    <p class="fs-2 my-4">Identification</p>
                    <form method="POST">
                        <div class="row justify-content-center my-4">
                            <div class="col-12 col-md-6 col-lg-4">
                                <label for="email"><b>Adresse e-mail :</b></label><br>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <div class="col-12 col-md-6 col-lg-4">
                                <label for="password"><b>Mot de passe :</b></label><br>
                                <input type="password" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <div class="col-12 col-md-6 col-lg-4">
                                <button class="btn btn-primary" name="connect" type="submit" style="width: 130px;">Se
                                    connecter</button>
                            </div>
                        </div>
                        <?php if (isset($errorMessage)): ?>
                            <div class="my-3">
                                <?php echo $errorMessage; ?>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>

                <!-- --------------------------------- FOOTER --------------------------- -->


            </div>


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
    <script src="src/scripts/scroll.js"></script>
    <script src="src/scripts/schedules.js"></script>
</body>

</html>