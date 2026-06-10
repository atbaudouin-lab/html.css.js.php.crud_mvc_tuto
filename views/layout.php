<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme SCSS</title>


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">-->

    <link rel="preload" href="public/assets/fonts/inter/Inter-VariableFont_slnt,wght.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="public/assets/fonts/font-awesome/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="public/assets/fonts/font-awesome/webfonts/fa-regular-400.woff2" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="public/assets/fonts/font-awesome/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="stylesheet" href="public/assets/fonts/font-awesome/css/all.min.css">



    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once VIEWS_PATH . 'header.php';

    // Messages de notification
    if ($error_message): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> <span><?php echo $error_message; ?></span>
        </div>
    <?php endif; ?>

    <?php if ($success_message): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <span><?php echo $success_message; ?></span>
        </div>
    <?php endif; ?>

    <h1 class="titre">
        <span>
            <span><?= $titre ?></span>
            <span class="souligne"></span>
        </span>
    </h1>
    <div class="container">
        <?= $content ?>
    </div>

    <?php require_once VIEWS_PATH . 'footer.php'; ?>

    <div id="deleteModal" class="modal-overlay">
        <div class="modal-box">
            <h2>Confirmation</h2>
            <p>Êtes-vous sûr de vouloir supprimer cette carte ? Cette action est irréversible.</p>
            <div class="modal-actions">
                <button id="cancelBtn" class="btn-cancel">Annuler</button>
                <button id="confirmBtn" class="btn-confirm">Oui, supprimer</button>
            </div>
        </div>
    </div>

    <script src="<?= JS_PATH ?>script.js"></script>
</body>

</html>