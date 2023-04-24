CREATE TABLE Famille(
   id INT AUTO_INCREMENT,
   nomFamille VARCHAR(30),
   PRIMARY KEY(id)
);

CREATE TABLE StatutUICN(
   id INT AUTO_INCREMENT,
   statut VARCHAR(30),
   iconeStatut VARCHAR(100),
   codeStatut VARCHAR(10),
   descriptionStatut VARCHAR(150),
   PRIMARY KEY(id)
);

CREATE TABLE Users(
   id INT AUTO_INCREMENT,
   mail VARCHAR(50),
   pseudo VARCHAR(20),
   pwd VARCHAR(60),
   PRIMARY KEY(id)
);

CREATE TABLE Espece(
   id INT AUTO_INCREMENT,
   nomScientifique VARCHAR(50),
   altitude DOUBLE,
   taille DOUBLE,
   image VARCHAR(100),
   idStatut INT NOT NULL,
   idFamille INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idStatut) REFERENCES StatutUICN(id),
   FOREIGN KEY(idFamille) REFERENCES Famille(id)
);

CREATE TABLE Parents(
   idParent INT,
   idEspece INT,
   PRIMARY KEY(idParent, idEspece),
   FOREIGN KEY(idEspece) REFERENCES Espece(id),
   FOREIGN KEY(idParent) REFERENCES Espece(id)
);

CREATE TABLE Nom_Vernaculaire(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   idEspece INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(nom),
   FOREIGN KEY(idEspece) REFERENCES Espece(id)
);

CREATE TABLE Collection(
   id INT AUTO_INCREMENT,
   nomCollection VARCHAR(100),
   especeEnValeur INT,
   idUsers INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idUsers) REFERENCES Users(id)
);

CREATE TABLE stocke(
   idCollection INT,
   idEspece INT,
   PRIMARY KEY(idCollection, idEspece),
   FOREIGN KEY(idCollection) REFERENCES Collection(id),
   FOREIGN KEY(idEspece) REFERENCES Espece(id)
);


INSERT INTO famille (nomFamille) VALUES
('Bufonidae'),
('Dendrobatidae'),
('Hylidae'),
('Leptodactylidae'),
('Microhylidae'),
('Ranidae'),
('Rhacophoridae'),
('Sooglossidae');

INSERT INTO `statutuicn` (`statut`, `iconeStatut`, `codeStatut`, `descriptionStatut`) VALUES

('Eteint', 'ex.png', 'EX', 'Aucun individu survivant connu.'),
('Éteint à l\'état sauvage', 'ew.png', 'EW', 'Survivants connus uniquement en captivité, ou vivant en dehors de leur habitat d\'origine.'),
('En danger critique', 'cr.png', 'CR', 'Risque d\'extinction dans la nature extrêmement élevé.'),
('En danger', 'en.png', 'EN', 'Haut risque d\'extinction dans la nature.'),
('Vulnérable', 'vu.png', 'VU', 'Haut risque de mise en danger.'),
('Quasi menacé', 'nt.png', 'NT', 'Probabilité d\'être en danger dans un futur proche.'),
('Préoccupation mineure', 'lc.png', 'LC', 'Ne remplit pas les critères d\'une catégorie en danger. Les animaux répandus et abondants appartiennent à cette catégorie.'),
('Données insuffisantes', 'dd.png', 'DD', 'Pas assez de données pour évaluer le risque d\'extinction.'),
('Non évalué', 'ne.png', 'NE', 'N\'a pas encore été évaluée.');

INSERT INTO espece (nomScientifique, altitude, taille, image, idStatut, idFamille) VALUES
('Bufo bufo', 1000, 15, NULL, 6, 1),
('Rhinella marina', 1200, 22, NULL, 6, 1),
('Oophaga pumilio', 200, 2.5, NULL, 7, 2),
('Dendrobates tinctorius', 200, 5, NULL, 7, 2),
('Hyla arborea', 800, 5, NULL, 6, 3),
('Litoria caerulea', 1200, 10, NULL, 7, 3),
('Leptodactylus fuscus', 1500, 7, NULL, 6, 4),
('Eleutherodactylus coqui', 1000, 3.5, NULL, 7, 4),
('Gastrophryne carolinensis', 500, 3, NULL, 6, 5),
('Kaloula pulchra', 300, 6, NULL, 7, 5),
('Rana temporaria', 2000, 9, NULL, 6, 6),
('Lithobates catesbeianus', 1500, 18, NULL, 7, 6),
('Polypedates leucomystax', 800, 8, NULL, 6, 7),
('Rhacophorus nigropalmatus', 1000, 10, NULL, 7, 7),
('Sooglossus thomasseti', 500, 2, NULL, 6, 8),
('Pelophylax perezi', 700, 9, NULL, 6, 6),
('Pelophylax ridibundus', 500, 12, NULL, 6, 6),
('Pelophylax kl. grafi', 600, 10, NULL, 6, 6);


INSERT INTO nom_vernaculaire (nom, idEspece) VALUES
('Crapaud commun', 1),
('Crapaud buffle', 2),
('Grenouille venimeuse à points bleus', 3),
('Dendrobate azuré', 4),
('Rainette verte', 5),
('Grenouille arboricole australienne', 6),
('Leptodactyle brun', 7),
('Coqui', 8),
('Grenouille assourdissante de Caroline', 9),
('Kaloula', 10),
('Grenouille rousse', 11),
('Grenouille taureau', 12),
('Rainette à ventouse commune', 13),
('Rhacophore à palettes noires', 14),
('Sooglosse de Thomasset', 15),
('Grenouille de Pérez',16),
('Grenouille rieuse',17),
('Grenouille de Graf', 18);

INSERT INTO parents (idParent, idEspece) VALUES
((SELECT id FROM espece WHERE nomScientifique = 'Pelophylax perezi'), 
(SELECT id FROM espece WHERE nomScientifique = 'Pelophylax kl. grafi')),
((SELECT id FROM espece WHERE nomScientifique = 'Pelophylax ridibundus'), 
(SELECT id FROM espece WHERE nomScientifique = 'Pelophylax kl. grafi'));

INSERT INTO `users` (`id`, `mail`, `pseudo`, `pwd`) VALUES 

(NULL, 'jbouchet71@gmail.com', 'IDK', 'coucou'), 
(NULL, 'admin@frog.io', 'Admin', 'admin');

UPDATE espece set image="uploads/Bufo_bufo.jpg" where id=1;
UPDATE espece set image="uploads/rhinella_marina.jpg" where id=2;
UPDATE espece set image="uploads/ophaga pumilio.jpg" where id=3;
UPDATE espece set image ="uploads/dendrobates tinctorius.jpg" where id=4;
UPDATE espece set image="uploads/hyla arborea.jpg" where id=5;
UPDATE espece set image ="uploads/litoria caerulea.JPG" where id=6;
UPDATE espece set image ="uploads/leptodactylus fuscus.jpg" where id=7;
UPDATE espece set image = "uploads/eleutherodactylus coqui.JPG" where id=8;
UPDATE espece set image ="uploads/gastrophryne carolinensis.jpg" where id=9;
UPDATE espece set image= "uploads/kaloula pulchra.jpg" where id=10;
UPDATE espece set image ="uploads/rana temporaria.jpg" where id=11;
UPDATE espece set image ="uploads/lithobates catesbeianus.jpg" where id=12;
UPDATE espece set image ="uploads/polypedates leucomystax.jpg" where id=13;
UPDATE espece set image ="uploads/rhacophorus nigropalmatus.jpg" where id=14;
UPDATE espece set image ="uploads/sooglossus thomasseti.jpeg" where id=15;
UPDATE espece set image ="uploads/pelophylax perezi.jpg" where id=16;
UPDATE espece set image ="uploads/pelophylax ridibundus.jpg" where id=17;
UPDATE espece set image ="uploads/pelophylax kl. grafi.jpg" where id=18;