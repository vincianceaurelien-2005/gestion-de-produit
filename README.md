# 📦 AurelienVinciance — GestionProduit
## Développer une application SPA avec Vue/React/Angular + Backend PHP

---

## ▶️ INSTALLATION EN 3 ÉTAPES

### Étape 1 — Copier le projet
Copier le dossier **AurelienVinciance** dans :
```
C:\xampp\htdocs\AurelienVinciance\
```

### Étape 2 — Créer la base de données
1. Démarrer **XAMPP** → Apache ✅ + MySQL ✅
2. Aller sur → **http://localhost/phpmyadmin**
3. Cliquer sur **SQL** (onglet en haut)
4. Coller tout le contenu de `backend/database.sql`
5. Cliquer **Exécuter** → Base `GestionProduit` créée ✅

### Étape 3 — Ouvrir l'application
```
http://localhost/AurelienVinciance/frontend/index.html
```

---

## 🔑 Connexion
| Login | Mot de passe |
|-------|-------------|
| admin | admin123    |

---

## 🗂️ Structure des fichiers
```
AurelienVinciance/
├── backend/
│   ├── config.php       ← Connexion MySQL
│   ├── auth.php         ← Authentification (vérifie table utilisateur)
│   ├── produits.php     ← API REST CRUD
│   └── database.sql     ← Script BDD (à exécuter dans phpMyAdmin)
│
└── frontend/
    ├── index.html       ← 🔑 Page de connexion
    ├── ajout.html       ← ➕ Menu 1 : Ajouter un produit
    ├── liste.html       ← 📋 Menu 2 : Liste, modifier, supprimer
    ├── bilan.html       ← 📊 Menu 3 : Bilan + graphiques
    ├── style.css        ← Styles partagés
    └── navbar.js        ← Navigation + auth partagées
```

---

## 🛠️ Technologies (aucune installation requise !)
- **Vue.js 3** via CDN
- **Axios** via CDN
- **Chart.js 4** via CDN
- **PHP 8** + **MySQL** via XAMPP

---

## 🗄️ Base de données : GestionProduit
| Table | Colonnes |
|-------|---------|
| **utilisateur** | idUser, login, password (MD5), nom |
| **Produit** | numProduit, design, prix, quantite |

Montant calculé : `prix × quantite` (calculé à la volée, pas stocké)

---

**AurelienVinciance** · Système de Gestion des Produits
