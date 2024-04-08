#drop table produit;
create table produit
(
	idProduit smallint NOT NULL auto_increment,
	nomProduit varchar(50) NOT NULL,
	fournisseur varchar(50),
	quantite smallint NOT NULL,
	format varchar(25),
	prix float NOT NULL,
	description varchar(100),
	PRIMARY KEY (idProduit)
);

# drop table panier;
CREATE TABLE panier
(	idPanier varchar(20) NOT NULL,
	noProduit smallint NOT NULL,
	quantite smallint NOT NULL,
	datePanier datetime NOT NULL,
	PRIMARY KEY (idPanier, noProduit)
);


insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Sucette', 'Mondoux' ,  150, '1 kg', 12.99, 'Chaque sucon est enveloppé individuellement.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Caramel', 'Kraft' , 375, '1.5 kg', 15.98, 'Chaque caramel est enveloppé individuellement.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Réglisse', 'LudikCandy', 64, '1 kg', 12.99, 'Les réglisses sont dans un seul paquet.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Guimauve', 'Oscar' , 2000, '900 g', 15.98, 'Les guimauves ont différentes saveurs.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Chocolat', 'Cadbury' , 555, '2 kg', 12.99, 'Ce produit peut contenir des traces d\'arachide.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Canne', 'Bonbons ACME' , 1250, '750 g', 15.98, 'Chaque paquet contient 25 cannes de saveurs variées.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Smarties', 'Mondoux' , 99, '1 kg', 12.99, 'Chaque paquet contient un assortiment varié de couleurs.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Jujube', 'LudikCandy' , 495, '2.5 kg', 15.98, 'Ce produit est enveloppé dans un sac.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Collier', 'Distribution LPD' , 150, '1 kg', 12.99, 'Différentes grandeurs sont disponibles dans chaque emballage.');
insert into produit (nomProduit, fournisseur, quantite, format, prix, description) values ('Tube de Poudre', 'Bensus' , 632, '500 g', 15.98, 'Chaque boite contient 4 saveurs de poudre.');
