<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />
        <title><?= $title ?></title>
        <link rel="icon" type="image/x-icon" href="img/favicon2.ico" />
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/nlov4nrxcqcnvuipf0v7nro2src9crr9aldtt54spc05h8jy/tinymce/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'#body-article' });</script>
    </head>

    <body>
        <div id="content_wrap">
            <header>
                <div class="navbar">
                    <div id="titre">
                        <h1>Billet simple pour l'Alaska</h1>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="/home">Accueil</a></li>
                            <li><a href="/blog">Chapitres</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li>|</li>
                            <?php if(!isset($_SESSION['connected'])) { ?>
                            <li><a href="/login">Connexion</a></li>
                            <?php } else { ?>
                            <li><a href="/admin/home"><?= $_SESSION['username'] ?></a></li>
                            <li><a href="/logout">Déconnexion</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </header>
            <div id="alert">
                <?php if(isset($_SESSION['message'])) {
                    if($_SESSION['message']['type'] == 'error') {?>
                        <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        <?php echo $_SESSION['message']['message'];
                        foreach($_SESSION['message']['errors'] as $error) {
                            echo $error . '. ' ;
                        } ?>
                        </div>
                    <?php 
                    } else { ?>
                        <div class="alert alert-success alert-dismissable fade show" role="alert">
                        <?php echo $_SESSION['message']['message']; ?>
                        </div>
                    <?php 
                    }
                    unset($_SESSION['message']);
                } ?>
            </div>
            
            <?= $content; ?>
            
            <section id="footer">
                <div id="bio">
                    <a href="/contact"><h3>Jean Forteroche</h3></a>
                    <p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
                </div>
                <div id="socialMedia">
                    <i class="fab fa-twitter fa-2x"></i>
                    <i class="fab fa-facebook-f fa-2x"></i>
                    <i class="fab fa-instagram fa-2x"></i>
                    <i class="fab fa-google-plus-g fa-2x"></i>
                </div>
            </section>
        </div>
    </body>
</html>