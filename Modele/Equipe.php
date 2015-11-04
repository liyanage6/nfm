<?php

require_once 'Modele.php';

class Equipe extends Modele {

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
        $sql = 'SELECT id_equipe, nom FROM equipe ORDER BY id_equipe ASC ';
        $equipes = $this->exeReq($sql);
        return $equipes;
    }

    /**
     *  Trouver comment effectuer le compte sur une seul et mm equipe
     */
    public function nbJoueur($idEquipe)
    {
        $sql = 'SELECT COUNT(id_joueur) FROM joueur WHERE id_equipe = '.$_GET[$idEquipe];
        $nbjoueur = $this->exeReq($sql, array($idEquipe));
        return $nbjoueur;
    }

    public function addEquipe($nomEquipe)
    {
        $sql = 'INSERT INTO equipe (nom) VALUES (?)';
        $this->exeReq($sql, array($nomEquipe));
    }

}