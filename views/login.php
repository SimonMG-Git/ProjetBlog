<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../libraries/Session.php');

$title = 'Connexion'; ?>

<?php if(isset($_SESSION['message']['type']) && ($_SESSION['message']['type'] == "success")) { Session::unset(); } ?>

<section id="connexion">
    <div id="connexionFormulaire">
        <form method="POST" action="/login" class="text-center border border-light p-5">
            <p class="h2 mb-4">Connexion</p>
            <div class="md-form mt-3">
                <label for="name">Pseudo :</label>
                <input type="text" id="pseudo" name="username" class="form-control mb-4" value="<?php echo Session::value('username'); ?>">
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="userpassword" class="form-control mb-4">
            </div>
            <button class="btn btn-info btn-block">Connexion</button>
        </form>
    </div>
</section>

<?php Session::unset(); ?>