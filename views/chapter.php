<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../libraries/Session.php');

$title = $chapitre['title']; ?>

<section id="oneChapter">
    <h3><?php echo $chapitre['title']; ?></h3>
    <p><?php echo $chapitre['body']; ?></p>
</section>

<div id="commentTitle">
    <h2>Commentaires :</h2>
</div>

<?php 
foreach ($comments as $comment) {
?>

<section id="comments">
    <div id="commentsContent">
        <p><?php echo $comment['body']; ?></p>
        <p>Commentaire écrit par <?php echo $comment['author']; ?></p>
    </div>
    
    <div id="reportButton">
        <form action="/comments/report" method="POST">
            <input type="hidden" name="comment_id" value="<?= $comment['id']; ?>">
            <input type="hidden" name="id_chapter" value="<?= $comment['id_chapter']; ?>">
            <button class="reportButton" type="submit"><i class="fas fa-exclamation-triangle"></i></button>
        </form>
    </div>
</section>

<?php } ?>
<?php if(isset($_SESSION['message']['type']) && ($_SESSION['message']['type'] == "success")) { Session::unset(); } ?>

<section id="newComments">
    <form method="POST" action="/comments" class="border border-light p-3">
        <div>
            <label for="author">Auteur :</label><br />
            <input type="text" id="author" name="author" class="form-control mb-1" value="<?php echo Session::value('author'); ?>"/>
        </div>
        <div class="form-group">
            <label for="body">Commentaire :</label><br />
            <textarea type="text" class="form-control rounded-0" id="body" name="body" rows="4"><?php echo Session::value('body'); ?></textarea>
        </div>
        <div>
        <button class="btn btn-info btn-block">Poster</button>
        </div>
        <input type="hidden" name="id_chapter" value="<?= $chapitre['id'] ?>">
    </form>
</section>

<?php Session::unset(); ?>
