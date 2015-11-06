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

    public function playerForm() {
        $equipes = $this->equipe->getTeams();
        $vue = new Vue("AddJoueur");
        $vue->generer(array(
            'equipes' => $equipes,
        ));
    }

    public function addP($nom, $id_equipe, $poste, $attaque, $milieu, $defense, $tituRempl) {
        $nbPlayer = $this->joueur->nbPlayersForm();
        $player = $this->joueur->getPlayerName();
        $allPlayer = $this->joueur->countAllPlayer();

        for($i=0; $i<$allPlayer; $i++){
            if( $player[$i]['nom'] == $_POST['nomJoueur']) {
                throw new Exception('Ce joueur existe deja !');
            }
        }

        if ($nbPlayer > 23) {
            throw new Exception('Votre effectif est au complet');
        }
        else{
            $this->newJoueur->addPlayer($nom, $id_equipe, $poste, $attaque, $milieu, $defense, $tituRempl);
            $equipes = $this->equipe->getTeams();
            $vue = new Vue("Accueil");
            $vue->generer(array('equipes' => $equipes));
        }
    }
}