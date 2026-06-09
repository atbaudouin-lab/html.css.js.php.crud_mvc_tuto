<?php 
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="contacts-count<?= $current_page === 'light.php' ? ' light' : ($current_page === 'dark.php' ? ' dark' : '') ?>"><span><?= $nbrOfCard ?> anima<?= ($nbrOfCard > 1) ? 'ux' : 'l' ?></span></div>

