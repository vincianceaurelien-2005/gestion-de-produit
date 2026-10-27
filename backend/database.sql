-- ============================================
--  GestionProduit — Script de création BDD
--  AurelienVinciance
-- ============================================

CREATE DATABASE IF NOT EXISTS GestionProduit
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE GestionProduit;

-- ─── Table utilisateur ───
CREATE TABLE IF NOT EXISTS utilisateur (
    idUser   INT          NOT NULL AUTO_INCREMENT,
    login    VARCHAR(50)  NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nom      VARCHAR(100),
    PRIMARY KEY (idUser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO utilisateur (login, password, nom) VALUES
    ('admin', MD5('admin123'), 'Administrateur');

-- ─── Table Produit ───
CREATE TABLE IF NOT EXISTS Produit (
    numProduit INT           NOT NULL AUTO_INCREMENT,
    design     VARCHAR(150)  NOT NULL,
    prix       DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    quantite   INT           NOT NULL DEFAULT 0,
    PRIMARY KEY (numProduit)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Produit (design, prix, quantite) VALUES
    ('Ordinateur portable Dell', 850000.00, 5),
    ('Souris sans fil Logitech',  25000.00, 20),
    ('Clavier mécanique RGB',     45000.00, 10),
    ('Écran 24 pouces Samsung',  320000.00,  8),
    ('Disque dur externe 1TB',    95000.00, 15),
    ('Câble HDMI 2m',              8000.00, 50),
    ('Webcam HD 1080p',           60000.00, 12),
    ('Casque audio Bluetooth',    75000.00,  7);
