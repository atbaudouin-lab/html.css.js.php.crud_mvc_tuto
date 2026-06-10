<?php
ob_start();
?>


<?php
require_once COMPONENTS_PATH.'nbrAnimals.php';
foreach ($cards as $i => $card):
    require COMPONENTS_PATH.'card2.php';
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

require_once VIEWS_PATH.'layout.php';
?>