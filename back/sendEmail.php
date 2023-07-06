<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier les données soumises

    // Vérifier si les champs obligatoires sont remplis
    if (empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['sujet']) || empty($_POST['message'])) {
        $erreur = "Veuillez remplir tous les champs obligatoires.";
    } else {
        // Validation de l'adresse e-mail
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $erreur = "L'adresse e-mail n'est pas valide.";
        } else {
            // Captcha (exemple avec reCAPTCHA de Google)
            $captchaResponse = $_POST['g-recaptcha-response'];
            $secretKey = 'VOTRE_CLE_SECRETE_RECAPTCHA';

            // Effectuer une requête HTTP vers l'API de validation reCAPTCHA
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => $secretKey,
                'response' => $captchaResponse
            );

            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $captchaResult = json_decode($response, true);

            // Vérifier la réponse du captcha
            if (!$captchaResult['success']) {
                $erreur = "Le captcha n'a pas été validé.";
            } else {
                // Les données du formulaire sont valides, envoyer l'e-mail

                // Récupérer les valeurs des champs
                $nom = $_POST['nom'];
                $email = $_POST['email'];
                $sujet = $_POST['sujet'];
                $message = $_POST['message'];

                // Préparer le contenu de l'e-mail
                $contenu = "Nom: " . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . "\n";
                $contenu .= "Adresse e-mail: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "\n";
                $contenu .= "Sujet: " . htmlspecialchars($sujet, ENT_QUOTES, 'UTF-8') . "\n";
                $contenu .= "Message: " . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "\n";

                // Adresse e-mail de destination
                $destinataire = 'votreadresse@example.com';

                // En-têtes de l'e-mail
                $headers = 'From: ' . $email . "\r\n" .
                    'Reply-To: ' . $email . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                // Envoyer l'e-mail
                if (mail($destinataire, $sujet, $contenu, $headers)) {
                    $succes = "Votre message a été envoyé avec succès.";
                } else {
                    $erreur = "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <h1>Formulaire de contact</h1>

    <?php if (isset($erreur)) : ?>
        <div class="erreur"><?php echo $erreur; ?></div>
    <?php endif; ?>

    <?php if (isset($succes)) : ?>
        <div class="succes"><?php echo $succes; ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div>
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="sujet">Sujet :</label>
            <input type="text" id="sujet" name="sujet" required>
        </div>

        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <div class="g-recaptcha" data-sitekey="VOTRE_CLE_SITE_RECAPTCHA"></div>

        <button type="submit">Envoyer</button>
    </form>
</body>

</html>
