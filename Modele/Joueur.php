<?php
require_once 'Modele.php';

class Joueur extends Modele {

    private $nom;
    private $poste;
    private $attaque;
    private $milieu;
    private $defense;
    private $tituRempl;

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
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * @param mixed $poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }

    /**
     * @return mixed
     */
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * @param mixed $attaque
     */
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;
    }

    /**
     * @return mixed
     */
    public function getMilieu()
    {
        return $this->milieu;
    }

    /**
     * @param mixed $milieu
     */
    public function setMilieu($milieu)
    {
        $this->milieu = $milieu;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    /**
     * @return mixed
     */
    public function getTituRempl()
    {
        return $this->tituRempl;
    }

    /**
     * @param mixed $tituRempl
     */
    public function setTituRempl($tituRempl)
    {
        $this->tituRempl = $tituRempl;
    }

    public function getJoueurs($idEquipe)
    {
        $sql = 'SELECT id_joueur, id_equipe, nom, poste, attaque, milieu, defense, tituRempl FROM joueur WHERE id_equipe='.$_GET['id'];
        $joueur = $this->exeReq($sql, array($idEquipe));

        return $joueur;
    }

    public function getPlayerName()
    {
        $sql = 'SELECT nom FROM joueur';
        $j = $this->exeReq($sql);
        $playerName= $j->fetchAll();
        //var_dump($joueur);
        return $playerName;
    }

    public function addJoueur($nomJoueur, $id_equipe, $poste, $attaque, $milieu, $defense, $tituRempl )
    {
        $sql = 'INSERT INTO joueur (nom, id_equipe, poste, attaque, milieu, defense, tituRempl) VALUES (:nom, :id_equipe, :poste,:attaque, :milieu, :defense, :tituRempl) ';
        $this->exeReq($sql,array(
            ':nom'        => $nomJoueur,
            ':id_equipe'  => $id_equipe,
            ':poste'      => $poste,
            ':attaque'    => $attaque,
            ':milieu'     => $milieu,
            ':defense'    => $defense,
            ':tituRempl'  => $tituRempl,
        ));
    }

    public function nbJoueursForm()
    {
        $sql = 'SELECT COUNT(id_joueur) FROM joueur WHERE id_equipe = '.$_POST['id_equipe'];
        $nb = $this->exeReq($sql);
        $nbJoueursForm = $nb->fetch();

        return $nbJoueursForm[0];
    }

    public function getCountAllPlayer()
    {
        $sql = 'SELECT COUNT(id_joueur) FROM joueur';
        $gap = $this->exeReq($sql);
        $allPlayer = $gap->fetch();
        return $allPlayer[0];
    }

}