<?php
if (in_array(basename($_SERVER['PHP_SELF']), ["create.php", "create.html"])) {
    require_once '../config/_config.php';
}
require_once FUNCTIONS_PATH . 'read.php';
$categories = getCategories();
require_once VIEWS_PATH . 'create.php';
