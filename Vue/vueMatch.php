<?php $this->titre = "Match" ?>

<h2>ICI placer un select aves les equipe et trouver un algo pour effectuer le match ( chaque equipe doit avoir 11 ou 7
joueur minimun ) ne pas faire jouer les remplaçant ...</h2>

<form name="formMatch" action="?action=playMatch" method="post">
    <label>Equipe 1</label>
    <select name="team1">
        <?php foreach ($teams1 as $team): ?>
            <option value="<?= $team['nom']?>"><?= $team['nom']?></option>
        <?php endforeach ?>
    </select>
    <br>
    <label>Equipe 2</label>
    <select name="team2">
        <?php foreach ($teams2 as $team): ?>
            <option value="<?= $team['nom']?>"><?= $team['nom']?></option>
        <?php endforeach ?>
    </select>
    <br><br>
    <input type="submit" value="Play">
    <br><br>
</form>
