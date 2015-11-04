<?php $this->title = 'NFM'; ?>

<?php foreach ($joueurs as $joueur): ?>
    <article>
        <header>
            <p href="<?= "index.php?action=showJoueur&id=".$joueur['id_joueur'] ?>">
                <h3 class=""><?= $joueur['nom'] ?></h3>
            </p>
            <p>Poste : <?= $joueur['poste'] ?></p>
            <p>Attaque : <?= $joueur['attaque'] ?></p>
            <p>Milieu : <?= $joueur['milieu'] ?></p>
            <p>Defense : <?= $joueur['defense'] ?></p>
        </header>
    </article>
<?php endforeach; ?>

