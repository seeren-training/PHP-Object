<?php include __DIR__ . "/../header.html.php" ?>

<main>
    <div class="container">
        <div class="row">
            <h1>
                Login
            </h1>
        </div>
        <div class="row">
            <form class="col s12" method="post" action="" novalidate>
                <div class="row">
                    <div class="input-field col s12 m8">
                        <input value="<?= filter_var($user->getEmail(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                               id="email" type="email" name="email"
                               class="validate <?= array_key_exists("email", $errorList)
                               || array_key_exists("user", $errorList) ? "invalid" : "" ?>"/>
                        <label for="email">Email</label>
                        <?php if (array_key_exists("email", $errorList)): ?>
                            <span class="helper-text" data-error="Email must be a valid adress"
                                  data-success="">
                                Email
                            </span>
                        <?php endif ?>
                        <?php if (array_key_exists("user", $errorList)): ?>
                            <span class="helper-text" data-error="Wrong email or password"
                                  data-success="">
                                Account
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
                    <input class="btn btn-primary" type="submit" name="user-login" value="Login"/>
                </div>
            </form>
        </div>
        <div class="row">
            <h6>
                Do not have account? <a href="/user/create">Create an account to manage deck.</a>
            </h6>
        </div>
    </div>
</main>

<?php include __DIR__ . "/../footer.html.php" ?>
