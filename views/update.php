<?php
ob_start();
?>

<?php

// Initialiser les variables pour éviter les erreurs
$name = $categori = $description = $redirect_to = '';

if (isset($_POST["id"])) {
    // AJOUT : On récupère la page d'origine, ou 'edit.php' par défaut si elle est absente
    $redirect_to = htmlspecialchars($_POST['redirect_to'] ?? 'edit.php');

    // Sécurité (Optionnel mais recommandé) : On valide que la page demandée fait partie des choix autorisés
    $allowed_pages = ['edit.php', 'light.php', 'dark.php'];
    if (!in_array($redirect_to, $allowed_pages)) {
        $redirect_to = 'edit.php';
    }

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
    <form action="../public/functions/update.php" method="post" enctype="multipart/form-data" class="form-column">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="redirect_to" value="<?= $redirect_to ?>">

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
                        <?= htmlspecialchars($category['category']) ?>
                    </option>
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

require_once VIEWS_PATH . 'layout.php';
?>