<?php $this->titre = 'NFM'; ?>

<?php foreach ($equipes as $equipe): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=showEquipe&id=".$equipe['id_equipe'] ?>">
               <h2 class=""><?= $equipe['nom'] ?></h2>
            </a>
            <p>Nombre de joueurs :</p>
        </header>
    </article>
<?php endforeach; ?>