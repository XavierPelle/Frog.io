
-- Data for StatutUICN
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

--------------------------------------------------------------------------------------------

--Data for Users
INSERT INTO `users` (`idUsers`, `mail`, `pseudo`, `pwd`) VALUES (NULL, 'jbouchet71@gmail.com', 'IDK', 'coucou'), (NULL, 'admin@frog.io', 'Admin', 'admin');
