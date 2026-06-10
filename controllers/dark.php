<?php
if (in_array(basename($_SERVER['PHP_SELF']), ["dark.php", "dark.html"])) {
    require_once '../config/_config.php';
}
require_once FUNCTIONS_PATH . 'read.php';
$cards = getCategorieCards("dark");
$nbrOfCard = count($cards);
require_once VIEWS_PATH . 'dark.php';