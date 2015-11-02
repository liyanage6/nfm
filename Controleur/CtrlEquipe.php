<?php

require_once 'Modele/Joueur.php';
require_once 'Vue/Vue.php';

class CtrlEquipe {

    private $joueurs;
    private $equipe;


    public function showEquipe($idEquipe) {
        $joueurs = $this->joueurs->getJoueurs($idEquipe);
        $vue = new Vue("Joueur");
        $vue->generer(array('joueurs' => $joueurs));
    }
}

