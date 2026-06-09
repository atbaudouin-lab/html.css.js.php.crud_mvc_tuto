<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'public/functions/read.php';
$cards = getCategorieCards("light");
$nbrOfCard = count($cards);
//showArray($cards);
ob_start();
?>


<?php
require_once 'public/components/nbrAnimals.php';
foreach ($cards as $i => $card):
    require 'public/components/card2.php';
endforeach; ?>



<?php
$titre = 'Liste des cartes éclaires';
$content = ob_get_clean();

// 2. On récupère les messages depuis la session
$error_message = $_SESSION['error_message'] ?? '';
$success_message = $_SESSION['success_message'] ?? '';

// 3. On vide la session pour ne pas réafficher le message au prochain rechargement
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);

require_once 'layout.php';
?>