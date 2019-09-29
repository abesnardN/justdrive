/*source ./././script.sql*/
DROP DATABASE IF EXISTS JustDrive;
CREATE DATABASE JustDrive;

USE JustDrive;

CREATE TABLE user(
	idUser INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	nom VARCHAR(50),
	prenom VARCHAR(50),
	permis DATETIME,
	urlPermis VARCHAR(50),
	dateInscription DATETIME NOT NULL,
	mail VARCHAR(50),
	numTel VARCHAR(13),
	password VARCHAR(32),
	admin TINYINT DEFAULT 0
);

CREATE TABLE pays(
	idPays CHAR(3) PRIMARY KEY NOT NULL,
	libelle VARCHAR(25)
);
CREATE TABLE adresse(
	idAdresse INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	numRue VARCHAR(4),
	nomRue VARCHAR(50),
	ville VARCHAR(50),
	codePostal VARCHAR(5),
	fkPays CHAR(3),
	latitude DECIMAL,
	longitude DECIMAL,
	CONSTRAINT FOREIGN KEY (`fkPays`) REFERENCES `pays` (`idPays`)

);


CREATE TABLE site(
	idSite INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	addresse INT REFERENCES adresse(idAdresse),
	label VARCHAR(150)
);



CREATE TABLE etatvehicule(
	idEtat INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	libelle VARCHAR(50)
);


CREATE TABLE vehicule(
	idVehicule INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	modele VARCHAR(50),
	kilometrage DECIMAL,
	marque VARCHAR(50),
	nbPlace INT NOT NULL,
	immatriculation VARCHAR(12),
	datePremiereCirculation date,
	fkEtat INT,
	CONSTRAINT FOREIGN KEY (`fkEtat`) REFERENCES `etatvehicule` (`idEtat`)
);



CREATE TABLE trajet(
	idTrajet INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	fkUser INT, -- le conducteur
	adresseDepart INT,
	addresseArrive INT,
	fkVehicule INT,
	dateDepart DATETIME NOT NULL,
	dateArrive DATETIME NOT NULL,
	kilometrage DECIMAL,
	commentaireConducteur VARCHAR(150),
	commentaireInterne VARCHAR(150),
	pointRDVDepart INT,
	pointRDVArrive INT,
	fkEtat INT
);
ALTER TABLE `trajet` ADD CONSTRAINT `fk_trajet_conducteur`
     FOREIGN KEY (`fkUser`) REFERENCES `user`(`idUser`);
ALTER TABLE `trajet` ADD CONSTRAINT `fk_trajet_depart`
     FOREIGN KEY (`adresseDepart`) REFERENCES `adresse`(`idAdresse`);
ALTER TABLE `trajet` ADD CONSTRAINT `fk_trajet_arrive`
     FOREIGN KEY (`addresseArrive`) REFERENCES `adresse`(`idAdresse`);
ALTER TABLE `trajet` ADD CONSTRAINT `fk_trajet_vehicule`
     FOREIGN KEY (`fkVehicule`) REFERENCES `vehicule`(`idVehicule`);
ALTER TABLE `trajet` ADD CONSTRAINT `fk_trajet_rdvdepart`
     FOREIGN KEY (`pointRDVDepart`) REFERENCES `adresse`(`idAdresse`);
ALTER TABLE `trajet` ADD CONSTRAINT `fk_trajet_rdvarrive`
     FOREIGN KEY (`pointRDVArrive`) REFERENCES `adresse`(`idAdresse`);
ALTER TABLE `trajet` ADD CONSTRAINT `fk_trajet_etat`
     FOREIGN KEY (`fkEtat`) REFERENCES `etatvehicule`(`idEtat`);



CREATE TABLE occupant(
	fkTrajet INT REFERENCES trajet(idTrajet),
	fkUser INT,
	fkEtat INT,
	PRIMARY KEY(fkTrajet,fkUser)
);
ALTER TABLE `occupant` ADD CONSTRAINT `fk_occupant_rdvarrive`
     FOREIGN KEY (`fkUser`) REFERENCES `user`(`idUser`);
ALTER TABLE `occupant` ADD CONSTRAINT `fk_accupant_etat`
     FOREIGN KEY (`fkEtat`) REFERENCES `etatVehicule`(`idEtat`);







CREATE TABLE cle(
	idCle INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	fkSite INT,
	fkUser INT,
	fkVehicule INT
);
ALTER TABLE cle ADD CONSTRAINT `fk_cle_site`
	FOREIGN KEY (`fkSite`) REFERENCES `site`(`idSite`);
ALTER TABLE cle ADD CONSTRAINT `fk_cle_user`
	FOREIGN KEY (`fkUser`) REFERENCES `user`(`idUser`);
ALTER TABLE cle ADD CONSTRAINT `fk_cle_vehicule`
	FOREIGN KEY (`fkVehicule`) REFERENCES `vehicule`(`idVehicule`);




CREATE TABLE planning(
	idCle INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	planning VARCHAR(265),
	fkVehicule INT,
	annee INT NOT NULL
);
ALTER TABLE planning ADD CONSTRAINT `fk_planning_vehicule`
	FOREIGN KEY (`fkVehicule`) REFERENCES `vehicule`(`idVehicule`);

alter table trajet add column etat varchar(30) null;
