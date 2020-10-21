<div class="nav-extended filter center-align">
    <?php if (1 < $optionList["page"]): ?>
        <a href="?page=<?= $optionList["page"] - 1 ?>" class="waves-effect waves-light btn black">Précédent</a>
    <?php else: ?>
        <a class="disabled waves-effect waves-light btn black">Précédent</a>
    <?php endif ?>
    <?php if ($cardList): ?>
        <a href="?page=<?= $optionList["page"] + 1 ?>" class="waves-effect waves-light btn black">Suivant</a>
    <?php else: ?>
        <a class="disabled waves-effect waves-light btn black">Suivant</a>
    <?php endif ?>
</div>

<?php include __DIR__ . "/../footer.html.php" ?>
