<?php $this->titre = "Joueur"; ?>

<form method="post" action="?action=addP" enctype="multipart/form-data">
    <legend>Ajouter un joueur:</legend>

    <label>Nom</label>
    <input id="nomJoueur" name="nomJoueur" type="text" placeholder="Nom du joueur" required /><br>

    <label>Club</label>
    <select name="id_equipe" id="id_equipe">
        <?php foreach ($equipes as $equipe): ?>
            <option value="<?= $equipe['id_equipe'] ?>"><?= $equipe['nom'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Poste</label>
    <select name="poste" id="poste">
        <option value="Attaquant">Attaquant</option>
        <option value="Milieu">Milieu</option>
        <option value="Defense">Défense</option>
    </select><br>

    Attaque: <input id="attaque" name="attaque" type="number" min="1" max="99"><br>
    Milieu: <input id="milieu" name="milieu" type="number" min="1" max="99"><br>
    Défense: <input id="defense" name="defense" type="number" min="1" max="99"><br>

    <input type="radio" name="tituRempl" value="1"> Titulaire<br>
    <input type="radio" name="tituRempl" value="0"> Remplaçant<br><br>

    <input type="submit" value="Ajouter"/>
</form>