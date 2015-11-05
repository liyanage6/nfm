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
        $vue->generer(array(
            'equipes' => $equipes,
        ));
    }

    public function addJ($nom, $id_equipe, $poste, $attaque, $milieu, $defense, $tituRempl) {
        $nbJoueurs = $this->joueur->nbJoueursForm();
        $joueur = $this->joueur->getPlayerName();
        $allPlayer = $this->joueur->getCountAllPlayer();

        echo'<pre>'.print_r($joueur).'</pre>';

        for($i=0; $i<$allPlayer; $i++){
            if( $joueur[$i]['nom'] == $_POST['nomJoueur']) {
                throw new Exception('Ce joueur existe deja !');
            }
        }
            if ($nbJoueurs > 23) {
                throw new Exception('Votre effectif est au complet');
            }
            else{
                $this->newJoueur->addJoueur($nom, $id_equipe, $poste, $attaque, $milieu, $defense, $tituRempl);
                $equipes = $this->equipe->getEquipes();
                $vue = new Vue("Accueil");
                $vue->generer(array('equipes' => $equipes));
            }

    }
}