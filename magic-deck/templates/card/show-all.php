<?php include __DIR__ . "/header.php" ?>

<main>
    <div class="container">
        <div class="row">
            <h1>
                <?php if (!$cardList): ?>
                    Aucune carte disponible
                <?php else: ?>
                    Page <?= $optionList["page"] ?>
                <?php endif ?>
            </h1>
        </div>
        <div class="row">
            <?php foreach ($cardList as $card) : ?>
                <img class="magic-card col s6 m4 l3 xl2" src="<?= $card->getImage() ?>"/>
            <?php endforeach ?>
        </div>
    </div>
</main>

<?php include __DIR__ . "/footer.php" ?>
