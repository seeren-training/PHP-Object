<?php include __DIR__ . "/header.php" ?>

<main>
    <div class="container">
        <div class="row">
            <h1>
                <?php if (0 === count($cardList)): ?>
                    Aucune carte asscoiée à cette page
                <?php else: ?>
                    Page <?= $next["page"] - 1 ?>
                <?php endif ?>
            </h1>
        </div>
        <div class="row">
            <?php foreach ($cardList as $card) : ?>
                <img class="magic-card col s6 m4 l3 xl2"
                     src="<?= $card->getImage() ?>"/>
            <?php endforeach ?>
        </div>
    </div>
</main>

<?php include __DIR__ . "/footer.php" ?>
