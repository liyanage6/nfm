<?php $this->titre = "Equipe"; ?>

<form method="post" action="?action=addT" enctype="multipart/form-data">
    <legend>Ajouter une equipe:</legend>
    <label>Nom</label>
    <input id="nomEquipe" name="nomEquipe" type="text" placeholder="Nom de l'equipe" required /><br>
    <input type="submit" value="Ajouter"/>
</form>