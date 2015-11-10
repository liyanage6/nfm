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

    public function getTeams()
    {
        $sql = 'SELECT * FROM equipe ORDER BY nom ASC ';
        $equipes = $this->exeReq($sql);
        return $equipes;
    }

    public function nbTeams()
    {
        $sql = 'SELECT COUNT(id_equipe) FROM equipe ';
        $nb = $this->exeReq($sql);
        $nbTeams = $nb->fetch();

        return $nbTeams;
    }

    /**
     *  ID present dans l'url
     */
    public function nbPlayers()
    {
        $sql = 'SELECT COUNT(id_joueur) FROM joueur WHERE id_equipe = '.$_GET['id'];
        $nb = $this->exeReq($sql);
        $nbJoueur = $nb->fetch();

        return $nbJoueur;
    }

    public function addTeam($nomEquipe)
    {
        $sql = 'INSERT INTO equipe (nom) VALUES (?)';
        $this->exeReq($sql, array($nomEquipe));
    }

    public function getTeamName()
    {
        $sql = 'SELECT nom FROM equipe';
        $j = $this->exeReq($sql);
        $teamName= $j->fetchAll();
        //var_dump($teamName);
        return $teamName;
    }

    public function countAllTeam()
    {
        $sql = 'SELECT COUNT(id_equipe) FROM equipe';
        $countTeam = $this->exeReq($sql)->fetch();

        return $countTeam;
    }

    public function  getTeamNameById($idTeam)
    {
        $sql = 'SELECT nom FROM equipe WHERE id_equipe = '.$_GET['id'];
        $tn = $this->exeReq($sql,array($idTeam));
        $teamName = $tn->fetch();

        return $teamName;
    }

    public function getTeamOneNameForMatch()
    {
        $sql = 'SELECT nom FROM equipe WHERE id_equipe = '.$_POST['team1'];
        $tn = $this->exeReq($sql,array());
        $teamName = $tn->fetch();

        return $teamName;
    }

    public function getTeamTwoNameForMatch()
    {
        $sql = 'SELECT nom FROM equipe WHERE id_equipe = '.$_POST['team2'];
        $tn = $this->exeReq($sql,array());
        $teamName = $tn->fetch();

        return $teamName;
    }


}