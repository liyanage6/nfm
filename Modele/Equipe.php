<?php

require_once 'Modele.php';

class Equipe extends Modele {

    private $nom;
    private $nbjoueur;
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
    public function getNbjoueur()
    {
        return $this->nbjoueur;
    }

    /**
     * @param mixed $nbjoueur
     */
    public function setNbjoueur($nbjoueur)
    {
        $this->nbjoueur = $nbjoueur;
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
        $sql = 'SELECT id_equipe, nom FROM equipe ORDER BY id_equipe DESC ';
        $equipes = $this->exeReq($sql);
        return $equipes;
    }

    public function getShowEquipe($idEquipe)
    {
        $sql = 'SELECT id_joueur, nom, poste FROM joueur WHERE id_equipe = '.$_GET[$idEquipe];
        $equipe = $this->exeReq($sql, array($idEquipe));
        return $equipe;
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

    public function addEquipe($nomEquipe, $ecusson)
    {
        $sql = 'insert into equipe(nom,ecusson)'.'value(?,?)';
        $this->exeReq($sql, array($nomEquipe, $ecusson));
    }

}