<?php
require_once 'public/functions/read.php';
$cards = getCards();
$nbrOfCard = count($cards);

require_once 'views/home.php';
?>