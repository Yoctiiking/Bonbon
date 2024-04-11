#### Serveur mySQL
## Hôte: localhost

## Usager: root

#### BD pour Bonbon.com
## Nom de la base de donnée: bonbon

CREATE DATABASE bonbon;

DEFAULT CHARACTER SET utf8;
USE bonbon;

#drop table usager;

CREATE TABLE usager (
  idUsager SMALLINT NOT NULL AUTO_INCREMENT,
  prenom VARCHAR (25),
  nom VARCHAR (25),
  motPasse VARCHAR (20) NOT NULL,
  courriel varchar(50) NOT NULL,
  PRIMARY KEY (idUsager),
  UNIQUE (courriel)
);

insert into usager (prenom, nom, motPasse, courriel) values ('Jean', 'Bonbons', '4321', 'etudiant.info@collegealma.ca');
insert into usager (prenom, nom, motPasse, courriel) values ('Nancy', 'Bluteau', '1234', 'nancy.bluteau@collegealma.ca');
