<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once './models.php';

    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? '');

    if (empty($name) || empty($description) || empty($category)) {
        // 2. On stocke le message dans la session
        $_SESSION['error_message'] = "Veuillez remplir tous les champs";
        header("Location: ../../create.php");
        exit();
    }

    try {
        
        $result = createCard($name, $category, $description);

        if ($result) {
            $_SESSION['success_message'] = "Carte bien ajoutée !";
        } else {
            $_SESSION['error_message'] = "Erreur lors de l'insertion de la carte.";
        }
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Erreur dans la fonction : " . $e->getMessage();
    }

    header("Location: ../../create.php");
    exit();
}