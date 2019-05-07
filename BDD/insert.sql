insert into etatvehicule value(1,'propre');
  insert into etatvehicule value(2,'sale');
    insert into vehicule(idVehicule, modele, kilometrage, marque, nbPlace,immatriculation,datePremiereCirculation,fkEtat)values('1','megane',100000, 'Renaut',5,'DD 153 JJ',curdate(),1)
INSERT INTO pays values('FR','France');
/*Adresse*/
INSERT INTO adresse(idAdresse,numRue,nomRue,ville,codePostal,fkPays,latitude,longitude)
  VALUES('1','1','rue de l eglise','Nantes','44000','FR','1.15','4878')
INSERT INTO adresse(idAdresse,numRue,nomRue,ville,codePostal,fkPays,latitude,longitude)
  VALUES('2','','place de l etoile','Poitiers','86000','FR','1.65','68')
  INSERT INTO adresse(idAdresse,numRue,nomRue,ville,codePostal,fkPays,latitude,longitude)
    VALUES('3','','rue de la mairie','Pouzauges','85400','FR','1.65','68')
  INSERT INTO adresse(idAdresse,numRue,nomRue,ville,codePostal,fkPays,latitude,longitude)
    VALUES('4','','rue de la mairie','Bressuire','79300','FR','1.69','4')


INSERT INTO user(mail, password, dateInscription) VALUES ('mail@mail.fr','aaa',CURDATE())


INSERT INTO trajet(fkUser, adresseDepart, addresseArrive, fkVehicule, dateDepart, dateArrive, kilometrage, commentaireConducteur, commentaireInterne, pointRDVDepart, pointRDVArrive, fkEtat)
VALUES (1,1,4,1,CURDATE(),CURDATE(),'10000','il me faut une camionnette pour le materiel','Ok',null,null,1);
