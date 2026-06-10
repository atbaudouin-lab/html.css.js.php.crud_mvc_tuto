<?php

class Home
{
    public function showHome(){
        // if (basename($_SERVER['PHP_SELF']) !== "index.php") {
        //     require_once '../config/_config.php';
        // }

        require_once FUNCTIONS_PATH . 'read.php';
        $cards = getCards();
        $nbrOfCard = count($cards);

        require_once VIEWS_PATH . 'home.php';
    }

    public function showCreate(){
        // if (in_array(basename($_SERVER['PHP_SELF']), ["create.php", "create.html"])) {
        // require_once '../config/_config.php';
        // }
    require_once FUNCTIONS_PATH . 'read.php';
    $categories = getCategories();
    require_once VIEWS_PATH . 'create.php';
    }

    public function showEdit(){
//         if (in_array(basename($_SERVER['PHP_SELF']), ["edit.php", "edit.html"])) {
//     require_once '../config/_config.php';
// }
require_once FUNCTIONS_PATH . 'read.php';
$cards = getCards();
$nbrOfCard = count($cards);
require_once VIEWS_PATH . 'edit.php';
    }

    public function showDark(){
//         if (in_array(basename($_SERVER['PHP_SELF']), ["dark.php", "dark.html"])) {
//     require_once '../config/_config.php';
// }
require_once FUNCTIONS_PATH . 'read.php';
$cards = getCategorieCards("dark");
$nbrOfCard = count($cards);
require_once VIEWS_PATH . 'dark.php';
    }

    public function showLight(){
//         if (in_array(basename($_SERVER['PHP_SELF']), ["light.php", "light.html"])) {
//     require_once '../config/_config.php';
// }
require_once FUNCTIONS_PATH . 'read.php';
$cards = getCategorieCards("light");
$nbrOfCard = count($cards);
require_once VIEWS_PATH . 'light.php';
}

    public function showDelete(){
//require_once '../config/_config.php';
require_once '../public/functions/delete.php';
}

public function showUpdate(){
//     if (in_array(basename($_SERVER['PHP_SELF']), ["update.php", "update.html"])) {
//     require_once '../config/_config.php';
// }
require_once FUNCTIONS_PATH . 'read.php';
$categories = getCategories();
require_once VIEWS_PATH . 'update.php';
}

}

