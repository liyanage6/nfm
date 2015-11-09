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

    public function showTeam($idTeam) {
        $joueurs = $this->joueurs->getPlayers($idTeam);
        $nbJoueurs = $this->equipe->nbPlayers();
        $teamName = $this->equipe->getTeamNameById($idTeam);

        $vue = new Vue("Joueur");
        $vue->generer(array(
            'joueurs' => $joueurs,
            'nbJoueurs' => $nbJoueurs,
            'teamName' => $teamName,
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
                throw new Exception('Cette equipe déja !');
            }
        }
        $this->newEquipe->addTeam($nomEquipe);
        $equipes = $this->equipe->getTeams();
        $vue = new Vue("Accueil");
        $vue->generer(array('equipes' => $equipes));
    }
}

