<?php include __DIR__ . "/../header.php" ?>

<main>
    <div class="container">
        <h1>
            Card List
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($cardList as $card) : ?>
                <img class="col-2 col-sm-3 col-md-4" src="<?= $card->getImage() ?>"/>
            <?php endforeach ?>
        </div>
    </div>
</main>


<?php include __DIR__ . "/../footer.php" ?>
