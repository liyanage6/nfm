<?php $this->titre = "Match" ?>

<p>ICI placer un select aves les equipe et trouver un algo pour effectuer le match ne pas faire jouer les remplaçant ...</p>

<form name="formMatch" action="?action=playMatch" method="post">
    <label>Equipe 1</label>
    <select name="team1">
        <?php foreach ($teams1 as $team): ?>
            <option value="<?= $team['id_equipe']?>"><?= $team['nom']?></option>
        <?php endforeach ?>
    </select>
    <br>
    <label>Equipe 2</label>
    <select name="team2">
        <?php foreach ($teams2 as $team): ?>
            <option value="<?= $team['id_equipe']?>"><?= $team['nom']?></option>
        <?php endforeach ?>
    </select>
    <br><br>
    <input type="submit" value="Play">
    <br><br>
</form>

<?php if(isset($_GET['action'])) {
        if ($_GET['action'] == 'playMatch') { ?>
            <h3> <?= $nameTeam1[0] . ' ' . $scoreT1 . ' - ' . $scoreT2 . ' ' . $nameTeam2[0] ?>  </h3><br><br>
<?php
        }
    } ?>