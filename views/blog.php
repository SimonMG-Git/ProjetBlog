<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = 'Chapitres'; ?>

<div id="introChapter">
    <h3>Chapitres</h3>
    <p>Voici la liste des chapitres déjà parus à ce jour :</p>
</div>

<section id="chapterLine">

<?php
foreach ($chapitres as $chapitre)
{ ?>

    <article class="chapter">
        <h3><?php echo $chapitre['title']; ?></h3>
        <p><?php echo $chapitre['body']; ?> ...</p>
        <a class="btn btn-info btn-small" href="/chapter/<?= $chapitre['id']; ?>">Lire la suite..</a>
    </article>

<?php } ?>
</section>