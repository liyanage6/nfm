<?php

require_once 'Modele/Joueur.php';
require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';

class CtrlJoueur {

    private $joueur;
    private $newJoueur;
    private $equipe;

    public function __construct() {
        $this->joueur = new Joueur();
        $this->newJoueur = new Joueur();
        $this->equipe = new Equipe();
    }

    public function joueurForm() {
        $equipes = $this->equipe->getEquipes();
        $vue = new Vue("AddJoueur");
        $vue->generer(array('equipes' => $equipes));
    }

    public function addJ($nom, $club, $poste, $attaque, $milieu, $defense, $tituRempl) {
        $this->newJoueur->addJoueur($nom, $club, $poste, $attaque, $milieu, $defense, $tituRempl);
        $equipes = $this->equipe->getEquipes();
        $vue = new Vue("Accueil");
        $vue->generer(array('equipes' => $equipes));
    }
}