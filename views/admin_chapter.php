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
    <div class="admin col-lg-9" id="adminChapter">
        <h3>Liste des chapitres :</h3>
        <table class="table table-sm table-striped table-bordered">
            <tbody>
                <?php foreach ($chapitres as $chapitre) { ?>
                    <tr class="d-flex">
                        <td class="col-5"><a href="/chapter/<?= $chapitre['id']; ?>"><?php echo $chapitre['title']; ?></a></td>
                        <td class="col-3">
                            <form action="/chapters/edit" method="GET">
                                <input type="hidden" name="id" value="<?= $chapitre['id']; ?>">
                                <a href="/admin_edit"><button class="btn btn-outline-dark btn-sm">Editer</button></a>
                            </form>
                        </td>
                        <td class="col-4">
                            <form action="/chapters/delete/<?= $chapitre['id']; ?>" method="POST" onsubmit="return confirm('Êtes vous sûr de vouloir supprimer ce chapitre ?');">
                                <button type="submit" class="btn btn-outline-dark btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<?php } else { ?>
    <section id="admin">
    <div class="admin col-lg-9" id="adminChapter">
        <h3 class="interdit">Vous n'êtes pas autorisé à voir cette page.</h3>
    </div>
</section>
<?php } ?>