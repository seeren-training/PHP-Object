<?php include __DIR__ . "/../header.html.php" ?>

<main>
    <div class="container">
        <div class="row">
            <h1>
                Create account
            </h1>
        </div>

        <div class="row">
            <form class="col s12" method="post" action="" novalidate>
                <div class="row">
                    <div class="input-field col s12 m8">
                        <input id="email" type="email" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m8">
                        <input id="password" type="password" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m8">
                        <input id="confirm" type="password" name="confirm">
                        <label for="confirm">Confirm</label>
                    </div>
                </div>
                <div class="row">
                    <input class="btn btn-primary" type="submit" name="user-create"
                           value="Create">
                </div>
            </form>
        </div>

    </div>
</main>

<?php include __DIR__ . "/../footer.html.php" ?>
