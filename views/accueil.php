<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../libraries/Session.php');

$title = 'Accueil'; ?>

<?php if(isset($_SESSION['message']['type']) && ($_SESSION['message']['type'] == "success")) { \Session::unset(); } ?>

<section id="image">
    <div id="fullPageImg">
        <div id="textImg">
            <h2>Billet simple pour l'Alaska</h2>
            <p>Un livre de Jean Forteroche.</p>
        </div>
    </div>
</section>

<div id="lastChapters">
<?php

foreach ($chapitres as $chapitre)
{
?>
    <article class="chapter">
        <h3><?php echo $chapitre['title']; ?></h3>
        <p><?php echo $chapitre['body']; ?>..</p>
        <a class="btn btn-info btn-small" href="/chapter/<?= $chapitre['id']; ?>">Lire la suite..</a>
    </article>

<?php } ?>
</div>

<?php \Session::unset(); ?>