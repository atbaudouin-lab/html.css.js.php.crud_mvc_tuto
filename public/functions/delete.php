<?php
require_once 'models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = (int) htmlspecialchars($_POST['id'] ?? '');

    // AJOUT : On récupère la page d'origine, ou 'edit.php' par défaut si elle est absente
    $redirect_to = htmlspecialchars($_POST['redirect_to'] ?? 'edit.php');

    // Sécurité (Optionnel mais recommandé) : On valide que la page demandée fait partie des choix autorisés
    $allowed_pages = ['edit.php', 'light.php', 'dark.php'];
    if (!in_array($redirect_to, $allowed_pages)) {
        $redirect_to = 'edit.php';
    }

    if (empty($id)) {
        // 2. On stocke le message dans la session
        $_SESSION['error_message'] = "Erreur : Resélectionnez la carte à supprimer.";
        header("Location: ../controllers/" . $redirect_to);
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

    header("Location: ../controllers/" . $redirect_to);
    exit();
}