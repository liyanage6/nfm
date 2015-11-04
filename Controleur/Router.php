<?php

require_once 'CtrlAccueil.php';
require_once 'CtrlEquipe.php';

class Router
{
    private $ctrlAccueil;
    private $ctrlEquipe;

    public function __construct() {
        $this->ctrlAccueil = new CtrlAccueil();
        $this->ctrlEquipe = new CtrlEquipe();
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
                elseif ($_GET['action'] = 'addEquipe')
                {
                    $this->ctrlEquipe->addEquipe($nomEquipe, $ecusson);
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
}