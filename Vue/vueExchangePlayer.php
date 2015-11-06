<?php $this->titre = 'Echange de joueur' ?>

<?php foreach ($players as $player): ?>
    <article>
        <header>
            <a href="<?= "?action=exchangeWith&idJoueur=".$player['id_joueur']."&idEquipe=".$player['id_equipe'] ?>"><=></a>  <?= $player['nom'] ?> <br>
            Attaque: <?= $player['attaque']?> -
            Milieu: <?= $player['milieu']?> -
            Defense: <?= $player['defense']?><br><br>
        </header>
    </article>
<?php endforeach?>
