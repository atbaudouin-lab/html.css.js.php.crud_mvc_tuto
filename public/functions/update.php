<?php
require_once 'utilities.php';
//showArray($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // AJOUT : On récupère la page d'origine, ou 'edit.php' par défaut si elle est absente
    $redirect_to = htmlspecialchars($_POST['redirect_to'] ?? 'edit.php');

    // Sécurité (Optionnel mais recommandé) : On valide que la page demandée fait partie des choix autorisés
    $allowed_pages = ['edit.php', 'light.php', 'dark.php'];
    if (!in_array($redirect_to, $allowed_pages)) {
        $redirect_to = 'edit.php';
    }

    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);

    if (empty($id) || empty($name) || empty($description) || empty($category)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs";
        header("Location: ../../controllers/" . $redirect_to);
        exit();
    }

    $req = "UPDATE cartes SET name=:name, description=:description, category=:category WHERE id=:id";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $result = $stmt->execute();
    $stmt->closeCursor();


    if (!$result) {
        $_SESSION['error_message'] = "Erreur lors de la mise à jour de la carte";
    } else {
        $_SESSION['success_message'] = "La carte a bien été mise à jour";
    }
    header("Location: ../../controllers/" . $redirect_to);
    exit();
}