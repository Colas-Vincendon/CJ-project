<?php

require_once 'databaseConnexion.php';
//SINGLETON
$database = Database::getInstance();
$conn = $database->getConnection();

// Récupérer les valeurs du formulaire
$titre = $_POST['titre'];
$paragraphe = $_POST['paragraphe'];

// Vérifier si un fichier a été téléchargé
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];

    // Vérifier si le fichier est une image
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($fileType, $allowedTypes)) {
        // Lire le contenu du fichier
        $imageData = file_get_contents($fileTmpPath);

        // Convertir l'image en format Base64
        $imageBase64 = base64_encode($imageData);

        // Insérer le nouveau service dans la table "services" en utilisant une requête préparée
        $stmt = $conn->prepare("INSERT INTO nuri-chantiers (titre, paragraphe) VALUES (:titre, :paragraphe)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':paragraphe', $paragraphe);
        $stmt->execute();

        // Récupérer l'identifiant du dernier service inséré
        $chantierID = $conn->lastInsertId();

        // Insérer l'image dans la table "imageService" en utilisant une requête préparée
        $stmt = $conn->prepare("INSERT INTO nuri-chantiersimages (chantier-ID, image_base64) VALUES (:chantier-ID, :imageBase64)");
        $stmt->bindParam(':chantier-ID', $chantierID);
        $stmt->bindParam(':imageBase64', $imageBase64);
        $stmt->execute();

        echo "La présentation a été ajoutée avec succès.";
    } else {
        echo "Le fichier doit être une image de type JPEG, PNG ou GIF.";
    }
} else {
    echo "Une erreur s'est produite lors du téléchargement du fichier.";
}

$conn = null;

header("Location: ../front/nouveauChantierAjouté.html");
exit();
?>