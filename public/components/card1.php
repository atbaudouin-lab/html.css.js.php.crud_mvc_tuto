<div class="item <?= htmlspecialchars($card['category']) ?>">
    <span><?= $i + 1 ?> </span>
    <h2 class="<?= htmlspecialchars($card['category']) ?>"><span><?= htmlspecialchars($card['name']) ?> </span></h2>
    <div class="contient">
        <p><?= htmlspecialchars($card['description']) ?> </p>
    </div>
</div>