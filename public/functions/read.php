<?php
require_once 'models.php';

function getCards()
{
    $data = readCards();
    return $data;
}

function getCategorieCards($categori)
{
    $req = "SELECT * from cartes WHERE category=:categori ORDER BY name ASC";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(':categori', $categori, PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function getCard($id)
{
    $req = "SELECT * from cartes where id=:id";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $carte = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    if (!$carte) {
        $_SESSION['error_message'] = "Carte introuvable.";
    }

    return $carte;
}

function getCategories()
{
    $req = "SELECT * from category ORDER BY category ASC";
    $stmt = setDB()->prepare($req);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}