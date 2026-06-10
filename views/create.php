<?php
ob_start();
?>

<div class="form-container">
    <form action="public/functions/create.php" method="post" enctype="multipart/form-data" class="form-column">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="nom" name="name" placeholder="Nom" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" placeholder="Description" required></textarea>
        </div>

        <div class="form-group">
            <label for="category">category :</label>
            <select name="category" id="category" required>
                <option hidden selected>Choisir une catégorie</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category'] ?>"><?= $category['category'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 1rem;">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>

<?php
$titre = 'Ajouter une carte';
$content = ob_get_clean();

// 2. On récupère les messages depuis la session
$error_message = $_SESSION['error_message'] ?? '';
$success_message = $_SESSION['success_message'] ?? '';

// 3. On vide la session pour ne pas réafficher le message au prochain rechargement
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);

require_once VIEWS_PATH.'layout.php';
?>