<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../libraries/Session.php');

$title = 'Inscription'; ?>

<?php if(isset($_SESSION['message']['type']) && ($_SESSION['message']['type'] == "success")) { Session::unset(); } ?>

<section id="inscription">
    <div id="inscriptionFormulaire">
        <h2>Inscription</h2>
        <form method="POST" action="/inscription_process">
            <div>
                <label for="username">Pseudo :</label><br />
                <input type="text" id="username" name="username" value="<?php echo Session::value('username'); ?>">
            </div>
            <div>
                <label for="email">E-mail :</label><br />
                <input type="email" id="email" name="email" value="<?php echo Session::value('email'); ?>">
            </div>
            <div>
                <label for="userpassword">Mot de passe :</label><br />
                <input type="password" id="userpassword" name="password">
            </div>
            <div>
                <label for="confirm_password">Vérification du mot de passe :</label><br />
                <input type="password" id="confirm_password" name="password_confirm">
            </div>
            <button class="button">S'inscrire</button>
        </form>
    </div>
</section>

<?php Session::unset(); ?>
