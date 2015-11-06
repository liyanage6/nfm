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

    public function showTeam($idEquipe) {
        $joueurs = $this->joueurs->getPlayers($idEquipe);
        $nbJoueurs = $this->equipe->nbPlayers();

        $vue = new Vue("Joueur");
        $vue->generer(array(
            'joueurs' => $joueurs,
            'nbJoueurs' => $nbJoueurs,
        ));

    }

    public function teamForm() {
        $vue = new Vue("AddEquipe");
        $vue->generer(array());
    }

    public function addT($nomEquipe) {
        $team = $this->equipe->getTeamName();
        $nbTeam = $this->equipe->countAllTeam();

        for($i=0; $i<$nbTeam; $i++){
            if ($team[$i]['nom'] == $_POST['nomEquipe']){
                throw new Exception('Tu es fou même !');
            }
        }
        $this->newEquipe->addTeam($nomEquipe);
        $equipes = $this->equipe->getTeams();
        $vue = new Vue("Accueil");
        $vue->generer(array('equipes' => $equipes));
    }
}

