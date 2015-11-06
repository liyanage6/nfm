<?php

require_once 'Modele/Joueur.php';
require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';

class CtrlExchangePlayer
{
    private $player;
    private $team;

    public function __construct()
    {
        $this->player = new Joueur();
        $this->team = new Equipe();
    }

    public function playerExchange()
    {
        $team = $this->team->getTeams();
        $players = $this->player->getAllPlayers();
        $nbplayer = $this->player->countAllPlayer();

        $vue = new Vue("ExchangePlayer");
        $vue->generer(array(
            'team' => $team,
            'players' => $players,
            'nbplayer' => $nbplayer,
        ));
    }
}