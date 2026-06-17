INSERT INTO produit (designation, prix_unitaire) VALUES
('Biscuit', 800.0),
('Bonbon', 100.0),
('Chips', 2000.0),
('Chocolat', 1500.0),
('Yaourt', 700.0);

INSERT INTO type_mouvement (code, libelle) VALUES
('ENTREE', 'Entrée en stock'),
('SORTIE', 'Sortie de stock');

INSERT INTO caisse (numero_caisse) VALUES
('Caisse 1'),
('Caisse 2');

INSERT INTO mouvement_stock (produit_id, code_mouvement, quantite) VALUES
(1, 'ENTREE', 100),
(2, 'ENTREE', 200),
(3, 'ENTREE', 150),
(4, 'ENTREE', 120),
(5, 'ENTREE', 180);