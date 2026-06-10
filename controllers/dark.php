<?php
require_once '../config/config.php';
require_once FUNCTIONS_PATH.'read.php';
$cards = getCategorieCards("dark");
$nbrOfCard = count($cards);
require_once VIEWS_PATH.'dark.php';