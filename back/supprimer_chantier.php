<?php

require_once 'databaseConnexion.php';

// Vérifier si l'identifiant du chantier à supprimer est présent
if(isset($_POST['chantier_id'])) {
    $chantierId = $_POST['chantier_id'];

    // SINGLETON
    $database = Database::getInstance();
    $conn = $database->getConnection();

    // Supprimer le chantier de la table "nurichantiers"
    $stmt = $conn->prepare("DELETE FROM nurichantiers WHERE id = :chantierId");
    $stmt->bindParam(':chantierId', $chantierId);
    $stmt->execute();

    // Supprimer les images associées du chantier de la table "nurichantiersimages"
    $stmt = $conn->prepare("DELETE FROM nurichantiersimages WHERE chantiersID = :chantierId");
    $stmt->bindParam(':chantierId', $chantierId);
    $stmt->execute();

    echo "Le chantier a été supprimé avec succès.";

    // Fermer la connexion à la base de données
    $conn = null;
} else {
    echo "L'identifiant du chantier n'a pas été spécifié.";
}

?>
