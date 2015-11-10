<?php

require_once 'CtrlAccueil.php';
require_once 'CtrlEquipe.php';
require_once 'CtrlJoueur.php';
require_once 'CtrlExchangePlayer.php';
require_once 'CtrlMatch.php';

class Router
{
    private $ctrlAccueil;
    private $ctrlEquipe;
    private $ctrlJoueur;
    private $ctrlExchangePlayer;
    private $ctrlMatch;

    public function __construct() {
        $this->ctrlAccueil = new CtrlAccueil();
        $this->ctrlEquipe = new CtrlEquipe();
        $this->ctrlJoueur = new CtrlJoueur();
        $this->ctrlExchangePlayer = new CtrlExchangePlayer();
        $this->ctrlMatch = new CtrlMatch();
    }

    public function routeRequete() {
        try{
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'showEquipe') {
                    if (isset($_GET['id'])) {
                        $idTeam= intval($_GET['id']);
                        if ($idTeam != 0) {
                            $this->ctrlEquipe->showTeam($idTeam);
                        }
                        else {
                            throw new Exception("Id de l'equipe est incorrète");
                        }
                    }
                    else {
                        throw new Exception("Id de l'equipe n'est pas défini");
                    }
                }
                elseif ($_GET['action'] == 'addEquipe')
                {
                    $this->ctrlEquipe->teamForm();
                }
                elseif ($_GET['action'] == 'addT')
                {
                    $nomEquipe = $this->getParameter($_POST, 'nomEquipe');
                    $this->ctrlEquipe->addT($nomEquipe);
                }

                elseif ($_GET['action'] == 'addJoueur')
                {
                    $this->ctrlJoueur->playerForm();
                }
                elseif ($_GET['action'] == 'addP')
                {
                    $nomJoueur = $this->getParameter($_POST, 'nomJoueur');
                    $club = $this->getParameter($_POST, 'id_equipe');
                    $poste = $this->getParameter($_POST, 'poste');
                    $attaque = $this->getParameter($_POST, 'attaque');
                    $milieu = $this->getParameter($_POST, 'milieu');
                    $defense = $this->getParameter($_POST, 'defense');
                    $tituRempl = $this->getParameter($_POST, 'tituRempl');
                    $this->ctrlJoueur->addP($nomJoueur, $club, $poste, $attaque, $milieu, $defense, $tituRempl);
                }
                elseif ($_GET['action'] == 'echange')
                {
                    $this->ctrlExchangePlayer->playerExchange();
                }
                elseif ($_GET['action'] == 'match')
                {
                    $this->ctrlMatch->matchForm();
                }
                elseif ($_GET['action'] == 'playMatch')
                {
                    $teamMatch1 = $this->getParameter($_POST, 'team1');
                    $teamMatch2 = $this->getParameter($_POST, 'team2');
                    $this->ctrlMatch->playMatch($teamMatch1, $teamMatch2);
                }
            }
            else
            {
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    private function getParameter($tab, $nom)
    {
        if (isset($tab[$nom])) {
            return $tab[$nom];
        }
        else
            throw new Exception('Paramètre '.$nom.' absent');
    }
}