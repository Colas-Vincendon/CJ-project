<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données
    require_once 'databaseConnexion.php';
    //SINGLETON
    $database = Database::getInstance();
    $conn = $database->getConnection();

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Requête d'insertion de l'employé avec des paramètres préparés
    $query = "INSERT INTO nuriEmployes (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Redirection vers la page d'accueil de l'administrateur
        exit();
    } else {
        echo "Erreur lors de l'ajout à la base de données";
    }

    // Fermer la connexion à la base de données
    $conn = null;
}
?>