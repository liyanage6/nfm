<?php
require_once 'Modele.php';

class Joueur extends Modele {

    private $nom;
    private $poste;
    private $attaque;
    private $milieu;
    private $defense;
    private $tituRempl;
    private $avg;

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

    public function getPlayers($idEquipe)
    {
        $sql = 'SELECT id_joueur, id_equipe, nom, poste, attaque, milieu, defense, tituRempl, avgPlayer FROM joueur WHERE id_equipe='.$_GET['id'];
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

    public function addPlayer($nomJoueur, $id_equipe, $poste, $attaque, $milieu, $defense, $tituRempl)
    {
        if($poste == 'Attaquant')
        {
            $avg = ($attaque*2 + $milieu + $defense)/3;
            if($avg >= 100)
            {
                throw new Exception('Ce joueur est un extraterrestre, veuillez recommencer svp.');
            }
        }
        elseif ( $poste == 'Milieu')
        {
            $avg = ($attaque + $milieu*2 + $defense)/3;
            if($avg >= 100)
            {
                throw new Exception('Ce joueur est un extraterrestre, veuillez recommencer svp.');
            }
        }
        elseif ($poste == 'Defense')
        {
            $avg = ($attaque + $milieu + $defense*2)/3;
            if($avg >= 100)
            {
                throw new Exception('Ce joueur est un extraterrestre, veuillez recommencer svp.');
            }
        }
        else{
            throw new Exception('Ce poste n\'existe pas');
        }

        $sql = 'INSERT INTO joueur (nom, id_equipe, poste, attaque, milieu, defense, tituRempl, avgPlayer) VALUES (:nom, :id_equipe, :poste,:attaque, :milieu, :defense, :tituRempl, :avgPlayer)';
        $this->exeReq($sql,array(
            ':nom'        => $nomJoueur,
            ':id_equipe'  => $id_equipe,
            ':poste'      => $poste,
            ':attaque'    => $attaque,
            ':milieu'     => $milieu,
            ':defense'    => $defense,
            ':tituRempl'  => $tituRempl,
            ':avgPlayer'  => $avg,
        ));
    }

    public function nbPlayersForm()
    {
        $sql = 'SELECT COUNT(id_joueur) FROM joueur WHERE id_equipe = '.$_POST['id_equipe'];
        $nb = $this->exeReq($sql);
        $nbJoueursForm = $nb->fetch();

        return $nbJoueursForm[0];
    }

    public function countAllPlayer()
    {
        $sql = 'SELECT COUNT(id_joueur) FROM joueur';
        $gap = $this->exeReq($sql);
        $allPlayer = $gap->fetch();
        return $allPlayer[0];
    }

    public function getAllPlayers()
    {
        $sql = 'SELECT * FROM joueur';
        $gap = $this->exeReq($sql);
        $allPlayers = $gap->fetchAll();

        //print'<pre>';print_r($allPlayers);print'</pre>';
        return $allPlayers;
    }

    public function avgTeam()
    {

    }

}