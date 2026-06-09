<?php
require_once 'utilities.php';
//showArray($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);

    if (empty($id) || empty($name) || empty($description) || empty($category)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs";
        header('Location: ../../edit.php');
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
    }else{
        $_SESSION['success_message'] = "La carte a bien été mise à jour";
    }
    header('Location: ../../edit.php');
    exit();
}