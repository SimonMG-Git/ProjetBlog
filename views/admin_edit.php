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
    <div class="admin col-lg-9" id="adminEdit">
        <form method="POST" action="/chapters/edit/<?= $chapitre['id']; ?>" class="p-5">
            <h3 class="h1-responsive font-weight-bold text-center mb-4">Modification du chapitre :</h3>
            <input type="text" id="title" name ="title" class="form-control mb-2" value="<?php echo $chapitre['title']; ?>">
            <div>
                <label for="body">Chapitre : </label>
                <textarea id="body-article" name="body"><?php echo $chapitre['body']; ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $chapitre['id']; ?>">
            <div>
                <button class="btn btn-info btn-small" type="submit">Poster</button>
            </div>
        </form>
    </div>
</section>

<?php Session::unset(); ?>

<?php } else { ?>
    <section id="admin">
    <div class="admin col-lg-9" id="adminEdit">
        <h3 class="interdit">Vous n'êtes pas autorisé à voir cette page.</h3>
    </div>
</section>
<?php } ?>