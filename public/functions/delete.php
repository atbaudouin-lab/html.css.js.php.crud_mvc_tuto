<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once './models.php';

    $id = (int) htmlentities($_POST['id'] ?? '');

    if (empty($id)) {
        // 2. On stocke le message dans la session
        $_SESSION['error_message'] = "Erreur : Resélectionnez la carte à supprimer.";
        header("Location: ../../edit.php");
        exit();
    }

    try {
        $result = deleteCard($id);
        if ($result) {
            $_SESSION['success_message'] = "Carte bien supprimée !";
        } else {
            $_SESSION['error_message'] = "Erreur lors de la suppression de la carte.";
        }
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Erreur dans la fonction : " . $e->getMessage();
    }

    header("Location: ../../edit.php");
    exit();
}