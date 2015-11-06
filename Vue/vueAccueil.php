<?php $this->titre = 'Equipes'; ?>

<a href="?action=match">Lancer un match</a>

<?php foreach ($equipes as $equipe): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=showEquipe&id=".$equipe['id_equipe'] ?>">
               <h2 class=""><?= $equipe['nom'] ?></h2>
            </a>
        </header>
    </article>
<?php endforeach; ?>