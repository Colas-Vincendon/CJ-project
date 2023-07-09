<?php

require_once 'databaseConnexion.php';
//SINGLETON
$database = Database::getInstance();
$conn = $database->getConnection();

// Récupérer les valeurs du formulaire
$titre = $_POST['titre'];

// Insérer le nouveau chantier dans la table "nurichantiers" en utilisant une requête préparée
$stmt = $conn->prepare("INSERT INTO `nurichantiers` (`titre`) VALUES (:titre)");
$stmt->bindParam(':titre', $titre);
$stmt->execute();

// Récupérer l'identifiant du dernier chantier inséré
$chantierID = $conn->lastInsertId();

// Vérifier si des fichiers ont été téléchargés
if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
    $totalImages = count($_FILES['images']['name']);

    // Parcourir chaque fichier téléchargé
    for ($i = 0; $i < $totalImages; $i++) {
        $fileTmpPath = $_FILES['images']['tmp_name'][$i];
        $fileName = $_FILES['images']['name'][$i];
        $fileType = $_FILES['images']['type'][$i];
        $fileSize = $_FILES['images']['size'][$i];

        // Vérifier si le fichier est une image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            // Lire le contenu du fichier
            $imageData = file_get_contents($fileTmpPath);

            // Convertir l'image en format Base64
            $imageBase64 = base64_encode($imageData);

            // Insérer l'image dans la table "nurichantiersimages" en utilisant une requête préparée
            $stmt = $conn->prepare("INSERT INTO `nurichantiersimages` (`chantiersID`, `image_base64`) VALUES (:chantierID, :imageBase64)");
            $stmt->bindParam(':chantierID', $chantierID);
            $stmt->bindParam(':imageBase64', $imageBase64);
            $stmt->execute();
        } else {
            echo "Le fichier doit être une image de type JPEG, PNG ou GIF.";
        }
    }

    // Redirection vers la page accueilAdmin.php
    header("Location: accueilAdmin.php");
} else {
    echo "Aucun fichier n'a été téléchargé.";
}

$conn = null;

exit();
