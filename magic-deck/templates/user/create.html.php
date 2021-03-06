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
                        <input value="<?= filter_var($user->getEmail(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                               id="email" type="email" name="email"
                               class="validate <?= array_key_exists("email", $errorList) ? "invalid" : "" ?>"/>
                        <label for="email">Email</label>
                        <?php if (array_key_exists("email", $errorList)): ?>
                            <span class="helper-text" data-error="Email must be available"
                                  data-success="">
                                Email
                            </span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m8">
                        <input value="<?= filter_var($user->getPassword(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                               id="password" type="password" name="password"
                               class="validate <?= array_key_exists("password", $errorList) ? "invalid" : "" ?>"/>
                        <label for="password">Password</label>
                        <?php if (array_key_exists("password", $errorList)): ?>
                            <span class="helper-text" data-error="Password is required" data-success="">
                                Password
                            </span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m8">
                        <input id="confirm" type="password" name="confirm"
                               class="validate <?= array_key_exists("confirm", $errorList) ? "invalid" : "" ?>"/>
                        <label for="confirm">Confirm</label>
                        <?php if (array_key_exists("confirm", $errorList)): ?>
                            <span class="helper-text" data-error="Confirmation must match password" data-success="">
                                Confirm
                            </span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <input class="btn btn-primary" type="submit" name="user-create" value="Create"/>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include __DIR__ . "/../footer.html.php" ?>
