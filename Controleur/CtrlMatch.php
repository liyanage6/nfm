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

    public function playMatch($teamMatch1, $teamMatch2) {
        $allPlayers = $this->player->getAllPlayers();
        $teams = $this->team->getTeams()->fetchAll();
        $nbTeams = $this->team->nbTeams();
        $nameTeam1 = $this->team->getTeamOneNameForMatch();
        $nameTeam2 = $this->team->getTeamTwoNameForMatch();
        $teams1 = $this->team->getTeams();
        $teams2 = $this->team->getTeams();

//         print"<pre>";print_r($nbTeams);print"</pre>";
//         print"<pre>";print_r($teams);print"</pre>";
//         print"<pre>";print_r($team1);print"</pre>";
//         print"<pre>";print_r($team2);print"</pre>";

        if ($teamMatch1 == $teamMatch2)
        {
            throw new Exception('Impossible de faire jouer une equipe contre elle même.');
        }

        else
        {
            $avgT1 = $this->player->avgTeam1();
            $avgT2 = $this->player->avgTeam2();
//            print"<pre>";print_r($avgT1);print"</pre>";
//            print"<pre>";print_r($avgT2);print"</pre>";

            if($avgT1 > $avgT2)
            {
                $scoreT1 = rand(0,6);
                $scoreT2 = rand(0,4);
            }
            elseif($avgT1 < $avgT2)
            {
                $scoreT1 = rand(0,4);
                $scoreT2 = rand(0,6);
            }
            else
            {
                $scoreT1 = rand(0,6);
                $scoreT2 = rand(0,6);
            }

            $vue = new Vue("Match");
            $vue->generer(array(
                'teams1' => $teams1,
                'teams2' => $teams2,
                'nameTeam1' => $nameTeam1,
                'nameTeam2' => $nameTeam2,
                'scoreT1' => $scoreT1,
                'scoreT2' => $scoreT2,
            ));
        }
    }
}