<?php $this->titre = 'Equipes'; ?>

<a href="?action=match">Lancer un match</a>

<?php foreach ($teams as $team): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=showEquipe&id=".$team['id_equipe'] ?>">
               <h2 class=""><?= $team['nom'] ?></h2>
            </a>
        </header>
    </article>
<?php endforeach; ?>