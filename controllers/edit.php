<?php
require_once '../config/config.php';
require_once FUNCTIONS_PATH.'read.php';
$cards = getCards();
$nbrOfCard = count($cards);
require_once VIEWS_PATH.'edit.php';
