<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'public/components/navbar_items.php';
require_once 'public/functions/utilities.php';

// Récupérer le nom de la page en cours
$current_page = basename($_SERVER['PHP_SELF']);
?>

<header class="header_nav">
    <nav class="navbar">
        <?php foreach ($navbar_items as $item): ?>
            <?php 
            // On vérifie si le lien correspond exactement à la page en cours
            // OU si on est sur index.php et que le lien est le dossier racine '/testmvc/'
            $isActive = ($current_page === $item['link']) || ($current_page === 'index.php' && $item['link'] === $navbar_items[0]['link']);
            ?>
            <a href="<?= $item['link'] ?>"
                class="navbar_item <?= $isActive ? 'active' : '' ?>">
                <?= $item['text'] ?>
            </a>
        <?php endforeach; ?>
    </nav>
</header>