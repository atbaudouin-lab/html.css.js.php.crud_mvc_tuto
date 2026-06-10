<?php
require_once 'config/_config.php';

MyAutoload::start();

$request = $_GET['r'];

$routeur = new Router($request);
$routeur->renderController();