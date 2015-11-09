A mettre a jour (Imcoplet)

CREATE TABLE `joueur` (
	`id_joueur` INT(3) NOT NULL AUTO_INCREMENT,
  `id_equipe` INT(4) NOT NULL,
	`nom` VARCHAR(75) NOT NULL,
	`poste` VARCHAR(75) NOT NULL,
	`attaque` INT(2) NOT NULL,
  `milieu` INT(2) NOT NULL,
  `defense` INT(2) NOT NULL,
  `titulaire` BOOLEAN NOT NULL,
  `remplaçant` BOOLEAN NOT NULL,
	PRIMARY KEY (`id_joueur`)
)
	COLLATE='latin1_swedish_ci'
	ENGINE=InnoDB
;


CREATE TABLE `equipe` (
	`id_equipe` INT(4) NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(100) NOT NULL,
  `ecusson` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id_equipe`)
)
	COLLATE='latin1_swedish_ci'
	ENGINE=InnoDB
;
