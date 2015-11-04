<?php

require_once 'Modele/Joueur.php';
require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';

class CtrlEquipe {

    private $joueurs;
    private $equipe;

    public function __construct() {
        $this->equipe = new Equipe();
        $this->joueurs = new Joueur();
    }

    public function showEquipe($idEquipe) {
        $joueurs = $this->joueurs->getJoueurs($idEquipe);
        $vue = new Vue("Joueur");
        $vue->generer(array('joueurs' => $joueurs));
    }

    public function addEquipe($nomEquipe,$ecusson) {
        $this->equipe->addEquipe($nomEquipe,$ecusson);
        $vue = new Vue("AddEquipe");
        $vue->generer();
    }
}

