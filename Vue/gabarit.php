<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <title><?= $titre ?></title>
</head>
<body>
    <div class="container">
        <div id="header" class="jumbotron">
            <h2>Football Manager </h2>
        </div>
        <div id="menu" class="col-md-3">
            <h3>Les annonces</h3>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?= "index.php" ?>">Accueil</a></li>
                <li><a href="<?= "index.php?action=addEquipe" ?>">Ajouter une equipe</a></li>
                <li><a href="<?= "index.php?action=addJoueur" ?>">Ajouter un joueur</a></li>
            </ul>
        </div>
        <div id="content" class="col-md-9">
            <header>
                <a href="index.php"><h1 id="titreBlog">NFM</h1></a>
                <p>Bienvenue sur football manager low-cost.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div>
            <footer id="piedBlog">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div>
    </div>
</body>
</html>