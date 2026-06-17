CREATE TABLE produit(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    designation TEXT NOT NULL,
    prix_unitaire REAL NOT NULL
);

CREATE TABLE type_mouvement(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT NOT NULL UNIQUE, 
    libelle TEXT NOT NULL
);

CREATE TABLE mouvement_stock(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    produit_id INTEGER NOT NULL,
    code_mouvement TEXT NOT NULL,
    quantite INTEGER NOT NULL,
    date_mouvement DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (produit_id) REFERENCES produit(id),
    FOREIGN KEY (code_mouvement) REFERENCES type_mouvement(code)   
);

CREATE TABLE caisse(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero_caisse TEXT NOT NULL UNIQUE
);

CREATE TABLE achat_mere(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    prix_total REAL NOT NULL,
    date_achat DATETIME DEFAULT CURRENT_TIMESTAMP,
    caisse_id INTEGER NOT NULL,
    FOREIGN KEY (caisse_id) REFERENCES caisse(id)
);
CREATE TABLE achat_fille(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    achat_mere_id INTEGER NOT NULL,
    produit_id INTEGER NOT NULL,
    quantite INTEGER NOT NULL,
    prix_unitaire REAL NOT NULL,
    FOREIGN KEY (achat_mere_id) REFERENCES achat_mere(id),
    FOREIGN KEY (produit_id) REFERENCES produit(id)
);