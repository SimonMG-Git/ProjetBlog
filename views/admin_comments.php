<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = 'Administration'; 
if(isset($_SESSION['connected']) && ($_SESSION['connected'] == TRUE)) { ?>

<section id="admin">
    <div id="adminNav" class="col-lg-1.">
        <nav>
            <ul>
                <li><a href="/admin/home">Tableau de bord</a></li>
                <li><a href="/admin/chapters/create">Nouveau Chapitre</a></li>
                <li><a href="/admin/chapters">Chapitres</a></li>
                <li><a href="/admin/comments">Commentaires</a></li>
            </ul>
        </nav>
    </div>
    <div class="admin col-lg-9" id="adminComments">
        <h3>Liste des commentaires :</h3>
        <table class="table table-sm table-striped table-bordered">
            <tbody>
                <?php foreach ($comments as $comment) { ?>
                    <tr class="d-flex">
                        <td class="col-3"><?php echo $comment['author']; ?></td>
                        <td class="col-3"><?php echo $comment['body']; ?></td>
                        <!-- Si le commentaire est report, icone en rouge, sinon icone en gris clair -->
                        <?php if($comment['report'] == 1) { ?>
                            <form action="/comments/approve" method="POST">
                                <td class="col-2">
                                    <input type="hidden" name="comment_id" value="<?= $comment['id']; ?>">
                                    <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fas fa-exclamation-triangle" id="isReported"></i></button>
                                </td>
                            </form>
                        <?php } else { ?>
                            <td class="col-2"><i class="fas fa-exclamation-triangle" id="notReported"></i></td>
                        <?php }; ?>
                        <td class="col-4">
                            <form action="/comments/<?= $comment['id']; ?>" method="POST" onsubmit="return confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?');">
                                <input type="hidden" name="id" value="<?= $comment['id']; ?>">
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
        <div class="admin col-lg-9" id="adminComments">
            <h3 class="interdit">Vous n'êtes pas autorisé à voir cette page.</h3>
        </div>
    </section>
<?php } ?>