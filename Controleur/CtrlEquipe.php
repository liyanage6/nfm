<?php

require_once 'Modele/Joueur.php';
require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';

class CtrlEquipe {

    private $joueurs;
    private $newEquipe;
    private $equipe;

    public function __construct() {
        $this->newEquipe = new Equipe();
        $this->equipe = new Equipe();
        $this->joueurs = new Joueur();
    }

    public function showEquipe($idEquipe) {
        $joueurs = $this->joueurs->getJoueurs($idEquipe);
        $nbJoueurs = $this->equipe->nbJoueurs();

        $vue = new Vue("Joueur");
        $vue->generer(array(
            'joueurs' => $joueurs,
            'nbJoueurs' => $nbJoueurs,
        ));

    }

    public function equipeForm() {
        $vue = new Vue("AddEquipe");
        $vue->generer(array());
    }

    public function addE($nomEquipe) {
        $this->newEquipe->addEquipe($nomEquipe);
        $equipes = $this->equipe->getEquipes();
        $vue = new Vue("Accueil");
        $vue->generer(array('equipes' => $equipes));
    }
}

