<?php
if (in_array(basename($_SERVER['PHP_SELF']), ["light.php", "light.html"])) {
    require_once '../config/_config.php';
}
require_once FUNCTIONS_PATH . 'read.php';
$cards = getCategorieCards("light");
$nbrOfCard = count($cards);
require_once VIEWS_PATH . 'light.php';