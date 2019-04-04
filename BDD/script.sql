/*source ./././script.sql*/
DROP DATABASE IF EXISTS JustDrive;
CREATE DATABASE JustDrive;

USE JustDrive;

CREATE TABLE User(
	idUser INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	nom VARCHAR(50),
	prenom VARCHAR(50),
	permis DATETIME,
	urlPermis VARCHAR(50),
	dateInscription DATETIME NOT NULL,
	mail VARCHAR(50),
	numTel VARCHAR(13),
	password VARCHAR(32)
);

CREATE TABLE Pays(
	idPays CHAR(3) PRIMARY KEY NOT NULL,
	libelle VARCHAR(25)
);
CREATE TABLE Adresse(
	idAdresse INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	numRue VARCHAR(4),
	nomRue VARCHAR(50),
	ville VARCHAR(50),
	codePostal VARCHAR(5),
	fkPays CHAR(3),
	latitude DECIMAL,
	longitude DECIMAL,
	CONSTRAINT FOREIGN KEY (`fkPays`) REFERENCES `Pays` (`idPays`)

);


CREATE TABLE Site(
	idSite INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	addresse INT REFERENCES Adresse(idAdresse),
	label VARCHAR(150)
);



CREATE TABLE EtatVehicule(
	idEtat INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	libelle VARCHAR(50)
);


CREATE TABLE Vehicule(
	idVehicule INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	modele VARCHAR(50),
	kilometrage DECIMAL,
	marque VARCHAR(50),
	nbPlace INT NOT NULL,
	immatriculation VARCHAR(12),
	datePremiereCirculation date,
	fkEtat INT,
	CONSTRAINT FOREIGN KEY (`fkEtat`) REFERENCES `EtatVehicule` (`idEtat`)
);



CREATE TABLE Trajet(
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
ALTER TABLE `Trajet` ADD CONSTRAINT `fk_trajet_conducteur` 
     FOREIGN KEY (`fkUser`) REFERENCES `User`(`idUser`);
ALTER TABLE `Trajet` ADD CONSTRAINT `fk_trajet_depart` 
     FOREIGN KEY (`adresseDepart`) REFERENCES `Adresse`(`idAdresse`);
ALTER TABLE `Trajet` ADD CONSTRAINT `fk_trajet_arrive` 
     FOREIGN KEY (`addresseArrive`) REFERENCES `Adresse`(`idAdresse`);
ALTER TABLE `Trajet` ADD CONSTRAINT `fk_trajet_vehicule` 
     FOREIGN KEY (`fkVehicule`) REFERENCES `Vehicule`(`idVehicule`);
ALTER TABLE `Trajet` ADD CONSTRAINT `fk_trajet_rdvdepart` 
     FOREIGN KEY (`pointRDVDepart`) REFERENCES `Adresse`(`idAdresse`);
ALTER TABLE `Trajet` ADD CONSTRAINT `fk_trajet_rdvarrive` 
     FOREIGN KEY (`pointRDVArrive`) REFERENCES `Adresse`(`idAdresse`);
ALTER TABLE `Trajet` ADD CONSTRAINT `fk_trajet_etat` 
     FOREIGN KEY (`fkEtat`) REFERENCES `EtatVehicule`(`idEtat`);    
     


CREATE TABLE Occupant(
	fkTrajet INT REFERENCES Trajet(idTrajet),
	fkUser INT,
	fkEtat INT,
	PRIMARY KEY(fkTrajet,fkUser)
);
ALTER TABLE `Occupant` ADD CONSTRAINT `fk_occupant_rdvarrive` 
     FOREIGN KEY (`fkUser`) REFERENCES `User`(`idUser`);
ALTER TABLE `Occupant` ADD CONSTRAINT `fk_accupant_etat` 
     FOREIGN KEY (`fkEtat`) REFERENCES `EtatVehicule`(`idEtat`);







CREATE TABLE Cle(
	idCle INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	fkSite INT,
	fkUser INT,
	fkVehicule INT
);
ALTER TABLE Cle ADD CONSTRAINT `fk_cle_site` 
	FOREIGN KEY (`fkSite`) REFERENCES `Site`(`idSite`);
ALTER TABLE Cle ADD CONSTRAINT `fk_cle_user` 
	FOREIGN KEY (`fkUser`) REFERENCES `User`(`idUser`);
ALTER TABLE Cle ADD CONSTRAINT `fk_cle_vehicule` 
	FOREIGN KEY (`fkVehicule`) REFERENCES `Vehicule`(`idVehicule`);




CREATE TABLE Planning(
	idCle INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	planning VARCHAR(265),
	fkVehicule INT,
	annee INT NOT NULL
);
ALTER TABLE Planning ADD CONSTRAINT `fk_planning_vehicule` 
	FOREIGN KEY (`fkVehicule`) REFERENCES `Vehicule`(`idVehicule`);


