<?php

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $servername = "eu-cdbr-west-03.cleardb.net";
        $username = "b3b93f93ef4872";
        $password = "21163a70";
        $dbname = "heroku_a9b8c2ad4d5e1ab";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Échec de la connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}


?>
