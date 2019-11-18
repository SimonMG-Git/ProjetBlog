<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = 'Administration'; 
if(isset($_SESSION['connected']) && ($_SESSION['connected'] == TRUE)) { ?>

<section id="admin">
    <div id="adminNav" class="col-lg-1.8">
        <nav>
            <ul>
                <li><a href="/admin/home">Tableau de bord</a></li>
                <li><a href="/admin/chapters/create">Nouveau Chapitre</a></li>
                <li><a href="/admin/chapters">Chapitres</a></li>
                <li><a href="/admin/comments">Commentaires</a></li>
            </ul>
        </nav>
    </div>
    <div class="admin col-lg-9 p-3" id="adminHome">
        <h3>Tableau de bord</h3>
        <p id="text">Le blog a actuellement <?= $chapterNbr['Nbr'] ?> chapitres, <?= $commentsNbr['Nbr'] ?> commentaires et <?= $usersNbr['Nbr'] ?> utilisateurs</p>
        <div id="lastItem">
            <article id="lastChapter">
                <h5><?php echo $chapitre['title']; ?></h5>
                <p><?php echo $chapitre['body']; ?>.. </p>
                <a class="btn btn-info btn-small" href="/chapter/<?= $chapitre['id']; ?>">Voir le chapitre</a>

            </article>
            <div id="lastComment">
                <?php foreach ($comments as $comment) { ?>
                    <h5><?php echo $comment['author']; ?></h5>
                    <p><?php echo $comment['body']; ?></p>
                    <a class="btn btn-info btn-small" href="/chapter/<?= $comment['id_chapter']; ?>">Voir le commentaire</a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php } else { ?>
    <section id="admin">
        <div class="admin col-lg-9" id="adminHome">
            <h3 class="interdit">Vous n'êtes pas autorisé à voir cette page.</h3>
        </div>
    </section>
<?php } ?>