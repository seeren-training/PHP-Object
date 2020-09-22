<div class="nav-extended filter center-align">

    <?php if ($previous["page"]): ?>
        <a href="?<?= http_build_query($previous) ?>" class="waves-effect waves-light btn black">Précédent</a>
    <?php else: ?>
        <a class="disabled waves-effect waves-light btn black">Précédent</a>
    <?php endif ?>
    <?php if (0 < count($cardList)): ?>
        <a href="?<?= http_build_query($next) ?>" class="waves-effect waves-light btn black">Suivant</a>
    <?php else: ?>
        <a class="disabled waves-effect waves-light btn black">Suivant</a>
    <?php endif ?>

</div>

<?php include __DIR__ . "/../footer.php" ?>
