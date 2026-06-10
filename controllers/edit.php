<?php
if (in_array(basename($_SERVER['PHP_SELF']), ["edit.php", "edit.html"])) {
    require_once '../config/_config.php';
}
require_once FUNCTIONS_PATH . 'read.php';
$cards = getCards();
$nbrOfCard = count($cards);
require_once VIEWS_PATH . 'edit.php';
