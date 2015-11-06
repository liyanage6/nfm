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
            <a href="index.php"><h2>Football Manager </h2></a>
        </div>
        <div id="menu" class="col-md-3">
            <h3>Menu</h3>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?= "index.php" ?>">Accueil</a></li>
                <li><a href="<?= "index.php?action=addEquipe" ?>">Ajouter une equipe</a></li>
                <li><a href="<?= "index.php?action=addJoueur" ?>">Ajouter un joueur</a></li>
            </ul>
        </div>
        <div id="content" class="col-md-9">
            <header>
                <h1><?= $titre ?></h1>
                <p>Bienvenue sur football manager low-cost.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div>
            <footer id="piedDePage">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div>
    </div>
</body>
</html>