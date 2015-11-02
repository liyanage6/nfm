<?php

class Vue
{
    private $fichier;
    private $titre;

    public function __construct($action) {
        $this->fichier = "Vue/vue".$action.".php";
    }

    public function generer($donnee) {
        $contenu = $this->genererFichier($this->fichier, $donnee);
        $vue = $this->genererFichier('Vue/gabarit.php', array(
            'titre' => $this->titre,
            'contenu' => $contenu
        ));
        echo $vue;
    }

    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier))
        {
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier ".$fichier." introuveble");
        }
    }
}