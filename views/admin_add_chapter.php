<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../libraries/Session.php');

$title = 'Administration'; 
if(isset($_SESSION['connected']) && ($_SESSION['connected'] == TRUE)) { ?>
<?php if(isset($_SESSION['message']['type']) && ($_SESSION['message']['type'] == "success")) { Session::unset(); } ?>

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
    <div class="admin col-lg-9" id="adminAddChapter">
        <form method="POST" action="/chapters" class="p-3">
            <h3 class="mb-4">Nouveau Chapitre : </h3>
            <input type="text" id="title" name ="title" class="form-control mb-2" placeholder="Titre" value="<?php echo Session::value('title'); ?>">
            <div>
                <label for="body">Chapitre : </label>
                <textarea id="body-article" name="body"><?php echo Session::value('body'); ?></textarea>
            </div>
            <div>
                <button class="btn btn-info btn-small" type="submit">Poster</button>
            </div>
        </form>
    </div>
</section>

<?php Session::unset(); ?>

<?php } else { ?>
    <section id="admin">
    <div class="admin col-lg-9" id="adminAddChapter">
        <h3 class="interdit">Vous n'êtes pas autorisé à voir cette page.</h3>
    </div>
</section>
<?php } ?>