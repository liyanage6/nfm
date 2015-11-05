<?php $this->titre = 'Joueurs '; ?>

<p>Nombre de joueurs : <?php echo $nbJoueurs["COUNT(id_joueur)"] ?> </p>

<?php foreach ($joueurs as $joueur): ?>
    <article>
        <header>
            <h3 class=""><?= $joueur['nom'] ?></h3>

            <p>Poste : <?= $joueur['poste'] ?></p>
            <p>Attaque : <?= $joueur['attaque'] ?></p>
            <p>Milieu : <?= $joueur['milieu'] ?></p>
            <p>Defense : <?= $joueur['defense'] ?></p>
        </header>
    </article>
<?php endforeach; ?>
