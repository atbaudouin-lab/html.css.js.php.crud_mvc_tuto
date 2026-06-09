<?php
require_once 'utilities.php';

function createCard($name, $category, $description)
{

    $req = "INSERT INTO cartes (name, category, description) VALUES (:name, :category, :description)";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $result = $stmt->execute();
    $stmt->closeCursor();
    return $result;
}

function readCards()
{
    $req = "SELECT * from cartes ORDER BY name ASC";
    $stmt = setDB()->prepare($req);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function updateCard($id, $name, $category, $description)
{
    $req = "UPDATE cartes SET name=:name , category=:category , description=:description WHERE id=:id";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $result = $stmt->execute();
    $stmt->closeCursor();
    return $result;
}

function deleteCard($id)
{
    $req = "DELETE FROM cartes WHERE id=:id";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();
    return $result;
}