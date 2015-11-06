<?php

require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';

class CtrlAccueil {

    private $equipe;
    private $newEquipe;

    public function __construct() {
        $this->equipe = new Equipe();
        $this->newEquipe = new Equipe();
    }

    public function accueil() {
        $equipes = $this->equipe->getTeams();
        $vue = new Vue("Accueil");
        $vue->generer(array('equipes' => $equipes));
    }

}