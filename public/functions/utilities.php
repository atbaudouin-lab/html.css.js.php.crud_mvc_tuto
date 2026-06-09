<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function setDB()
{
    static $pdo;
    if ($pdo === null) {
        // Paramètres de connexion
        $serveur = "localhost";
        $utilisateur = "root";
        $motDePasse = "";
        $baseDeDonnees = "test_mvc";

        // Connexion avec PDO
        try {
            $pdo = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees;charset=utf8mb4", $utilisateur, $motDePasse);
            // Configurer PDO pour lancer des exceptions en cas d'erreur
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connecté avec succès à la BDD : $baseDeDonnees";
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
    return $pdo;
}
;

function showArray($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}