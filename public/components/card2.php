<div class="item <?= htmlspecialchars($card['category']) ?>">
    <span><?= $i + 1 ?> </span>
    <h2 class="<?= htmlspecialchars($card['category']) ?>"><span><?= htmlspecialchars($card['name']) ?> </span></h2>
    <div class="contient">
        <p><?= htmlspecialchars($card['description']) ?> </p>
        <div>
            <form action="delete.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($card['id']) ?>">
                <!--<input type="button" name="supprimer" value="Supprimer" class="delete"
                    onclick="openDeleteModal(this.form)">-->

                <button type="button" class="botn btn-danger btn-sm delete" name="supprimer"
                    onclick="openDeleteModal(this.form)">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </form>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($card['id']) ?>">
                <!-- <input type="submit" name="modifier" value="Modifier" class="update"> -->


                <button type="submit" class="botn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Modifier
                </button>
            </form>
        </div>
    </div>

</div>