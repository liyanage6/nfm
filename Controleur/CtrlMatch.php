<?php

require_once 'Modele/Joueur.php';
require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';

class CtrlMatch
{
    private $player;
    private $team;

    public function __construct(){
        $this->player = new Joueur();
        $this->team = new Equipe();
    }

    public function match() {
        $vue = new Vue("Match");
        $vue->generer(array());
    }
}