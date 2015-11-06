<?php $this->titre = 'Joueurs '; ?>

<p>Nombre de joueurs : <?php echo $nbJoueurs[0] ?> </p>

<?php foreach ($joueurs as $joueur): ?>
    <article>
        <header>
            <h3 class=""><?= $joueur['nom'] ?>  <a href="<?= "?action=echange&idJoueur=".$joueur['id_joueur']."&idEquipe=".$joueur['id_equipe'] ?>"><=></a></h3>

            <p>Poste : <?= $joueur['poste'] ?></p>
            <p>Attaque : <?= $joueur['attaque'] ?></p>
            <p>Milieu : <?= $joueur['milieu'] ?></p>
            <p>Defense : <?= $joueur['defense'] ?></p>
        </header>
    </article>
<?php endforeach; ?>
