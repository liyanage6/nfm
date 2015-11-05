<?php

require_once 'Modele.php';

class Equipe extends Modele {

    public static  $nbJoueursMax = 23;
    private $nom;
    private $ecusson;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getEcusson()
    {
        return $this->ecusson;
    }

    /**
     * @param mixed $ecusson
     */
    public function setEcusson($ecusson)
    {
        $this->ecusson = $ecusson;
    }

    public function getEquipes()
    {
        $sql = 'SELECT id_equipe, nom FROM equipe ORDER BY nom DESC ';
        $equipes = $this->exeReq($sql);
        return $equipes;
    }

    /**
     *  ID present dans l'url
     */
    public function nbJoueurs()
    {
        $sql = 'SELECT COUNT(id_joueur) FROM joueur WHERE id_equipe = '.$_GET['id'];
        $nb = $this->exeReq($sql);
        $nbJoueur = $nb->fetch();

        return $nbJoueur;
    }

    public function addEquipe($nomEquipe)
    {
        $sql = 'INSERT INTO equipe (nom) VALUES (?)';
        $this->exeReq($sql, array($nomEquipe));
    }

}