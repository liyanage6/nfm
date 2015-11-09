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

    public function matchForm() {
        $teams1 = $this->team->getTeams();
        $teams2 = $this->team->getTeams();
        $vue = new Vue("Match");
        $vue->generer(array(
            'teams1' => $teams1,
            'teams2' => $teams2,
        ));
    }

    public function playMatch($team1, $team2) {
        $allPlayers = $this->player->getAllPlayers();
        $teams = $this->team->getTeams()->fetchAll();
        $nbTeams = $this->team->nbTeams();
        echo "<pre>".var_dump($nbTeams)."</pre>";
        echo "<pre>".var_dump($teams)."</pre>";

        if ($team2 == $team1)
        {
            throw new Exception('Impossible de faire jouer une equipe contre elle même.');
        }

        for($i=0; $i<$nbTeams ;$i++){
            if( $teams[$i]['nom'] == $team1)
            {
                echo 'lol';die;
            }
        }

    }

}