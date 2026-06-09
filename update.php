<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'public/functions/read.php';
$categories = getCategories();
//showArray($categories);
ob_start();
?>

<?php

// Initialiser les variables pour éviter les erreurs
$name = $categori = $description = '';

if (isset($_POST["id"])) {
    $id = (int) trim($_POST["id"]);
    $carte = getCard($id);
    if ($carte) {
        //Sécuriser l'affichage
        $name = htmlspecialchars($carte["name"]);
        $categori = htmlspecialchars($carte["category"]);
        $description = htmlspecialchars($carte["description"]);
    }
} else {
    $_SESSION['error_message'] = "Aucun identifiant transmis.";
}
?>
<div class="form-container">
    <form action="public/functions/update.php" method="post" enctype="multipart/form-data" class="form-column">
        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="nom" name="name" value="<?= $name ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" required><?= $description ?></textarea>
        </div>

        <div class="form-group">
            <label for="category">category :</label>
            <select name="category" id="category" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= htmlspecialchars($category['category']) ?>"
                        <?= $categori === htmlspecialchars($category['category']) ? "selected" : "" ?>>
                        <?= htmlspecialchars($category['category']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 1rem;">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='edit.php'">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
<?php
$titre = 'Modifier une carte';
$content = ob_get_clean();

// 2. On récupère les messages depuis la session
$error_message = $_SESSION['error_message'] ?? '';
$success_message = $_SESSION['success_message'] ?? '';

// 3. On vide la session pour ne pas réafficher le message au prochain rechargement
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);

require_once 'layout.php';
?>