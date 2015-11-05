<?php

require_once 'CtrlAccueil.php';
require_once 'CtrlEquipe.php';
require_once 'CtrlJoueur.php';

class Router
{
    private $ctrlAccueil;
    private $ctrlEquipe;
    private $ctrlJoueur;

    public function __construct() {
        $this->ctrlAccueil = new CtrlAccueil();
        $this->ctrlEquipe = new CtrlEquipe();
        $this->ctrlJoueur = new CtrlJoueur();
    }

    public function routeRequete() {
        try{
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'showEquipe') {
                    if (isset($_GET['id'])) {
                        $idEquipe = intval($_GET['id']);
                        if ($idEquipe != 0) {
                            $this->ctrlEquipe->showEquipe($idEquipe);
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
                    $this->ctrlEquipe->equipeForm();


                }
                elseif ($_GET['action'] == 'addE')
                {
                    $nomEquipe = $this->getParameter($_POST, 'nomEquipe');
                    $this->ctrlEquipe->addE($nomEquipe);
                }

                elseif ($_GET['action'] == 'addJoueur')
                {
                    $this->ctrlJoueur->joueurForm();
                }
                elseif ($_GET['action'] == 'addJ')
                {
                    $nomJoueur = $this->getParameter($_POST, 'nomJoueur');
                    $club = $this->getParameter($_POST, 'id_equipe');
                    $poste = $this->getParameter($_POST, 'poste');
                    $attaque = $this->getParameter($_POST, 'attaque');
                    $milieu = $this->getParameter($_POST, 'milieu');
                    $defense = $this->getParameter($_POST, 'defense');
                    $tituRempl = $this->getParameter($_POST, 'tituRempl');
                    $this->ctrlJoueur->addJ($nomJoueur, $club, $poste, $attaque, $milieu, $defense, $tituRempl);
                }

            }
            else {
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