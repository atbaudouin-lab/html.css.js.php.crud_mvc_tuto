<?php
require_once 'config/_config.php';

$request = $_GET['r'];

require_once CLASSES_PATH.'Router.php';

$routeur = new Routeur($request);
$routeur->renderController();