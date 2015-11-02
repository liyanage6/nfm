<?php
require_once 'Modele.php';

class Joueur extends Modele {

    private $nom;
    private $poste;
    private $attaque;
    private $milieu;
    private $defense;
    private $titulaire;
    private $remplaçant;

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
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    /**
     * @param mixed $titulaire
     */
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;
    }

    /**
     * @return mixed
     */
    public function getRemplaçant()
    {
        return $this->remplaçant;
    }

    /**
     * @param mixed $remplaçant
     */
    public function setRemplaçant($remplaçant)
    {
        $this->remplaçant = $remplaçant;
    }

    public function getJoueurs($idEquipe)
    {
        $sql = 'SELECT id_joueur, nom, poste, attaque, milieu, defense, titulaire, remplaçant FROM joueur ORDER BY DESC';
        $joueur = $this->exeReq($sql, array($idEquipe));

        return $joueur;
    }

}