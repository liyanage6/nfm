<?php

require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';

class CtrlAccueil {

    private $team;
    private $newEquipe;

    public function __construct() {
        $this->team = new Equipe();
        $this->newEquipe = new Equipe();
    }

    public function accueil() {
        $teams = $this->team->getTeams();
        $vue = new Vue("Accueil");
        $vue->generer(array('teams' => $teams));
    }

}