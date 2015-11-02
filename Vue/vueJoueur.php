<?php $this->title = 'NFM'; ?>

<?php foreach ($joueurs as $joueur): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=showJoueur&id=".$joueur['id_joueur'] ?>">
                <h3 class=""><?= $joueur['nom'] ?></h3>
            </a>
            <p>Poste : <?= $joueur['poste'] ?></p>
        </header>
    </article>
<?php endforeach; ?>

