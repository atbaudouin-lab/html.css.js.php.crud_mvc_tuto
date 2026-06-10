<?php
require_once '../config/config.php';
require_once FUNCTIONS_PATH.'read.php';
$categories = getCategories();
require_once VIEWS_PATH.'update.php';