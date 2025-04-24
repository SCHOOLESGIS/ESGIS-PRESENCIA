# **📌 ESGIS Presencia**  
_Un système de gestion des émargements des enseignants basé sur Laravel 11 (backend) et Nuxt 3.15.4 (frontend)._  

## 🚀 **Présentation du Projet**  
**ESGIS Presencia** est une application web moderne conçue pour **automatiser et optimiser la gestion des présences des enseignants**. Elle garantit une meilleure transparence et réduit les erreurs humaines liées au suivi des heures de cours.  

## 🏗 **Technologies Utilisées**  
| Côté | Technologie |
|------|------------|
| **Backend** | Laravel 11 (PHP 8.2) |
| **Frontend** | Nuxt.js 3.15.4 (Vue 3) |
| **Base de données** | MySQL |
| **Authentification** | Laravel Sanctum / JWT |
| **UI Components** | PrimeVue |
| **Stylisation** | Tailwind CSS |

---

## 📂 **Structure du Projet**  
```
/esgis-presencia
    |──/app
            │── backend/       # API Laravel 11 (Backend)
            │── frontend/      # Interface Nuxt 3.15.4 (Frontend)
            │── README.md      # Documentation du projet
```

---

## ⚡ **Fonctionnalités**  
### 🎓 **Gestion des Émargements (Sprint 2)**
- Les enseignants peuvent **marquer leur présence** (début et fin du cours).
- Le système détecte **les absences et envoie des notifications**.
- Les administrateurs peuvent **valider ou rejeter les justifications** des absences.

### 📊 **Génération et Gestion des Rapports (Sprint 3)**
- Génération de **rapports individuels et par module**.
- Exportation des rapports en **PDF/CSV**.

### 🔔 **Notifications et Alertes (Sprint 4)**
- **Rappels automatiques** aux enseignants.
- **Alertes administratives** en cas d’anomalie.

### 🛠 **Administration & Sécurité (Sprint 5)**
- **Gestion des utilisateurs et rôles (RBAC)**.
- **Authentification forte (2FA, JWT)**.
- **Journalisation des actions** (traçabilité).

---

## 🛠 **Installation & Configuration**  

### **1️⃣ Backend (Laravel 11 - API REST)**  
#### 📌 Prérequis :  
- PHP **8.2+**, Composer, MySQL  

```bash
# Aller dans le dossier backend
cd backend

# Installer les dépendances
composer install

# Configurer les variables d'environnement
cp .env.example .env
php artisan key:generate

# Configurer la base de données (.env)
php artisan migrate --seed  # Lancer les migrations et insérer les données initiales

# Démarrer le serveur Laravel
php artisan serve
```

---

### **2️⃣ Frontend (Nuxt 3.15.4 - Interface Utilisateur)**  
#### 📌 Prérequis :  
- Node.js **18+**, npm ou yarn  

```bash
# Aller dans le dossier frontend
cd frontend

# Installer les dépendances
npm install  # ou yarn install

# Démarrer le serveur Nuxt
npm run dev  # ou yarn dev
```
🌐 L’application sera accessible sur **`http://localhost:3000`**  

---

## 🛡 **Sécurité et Authentification**  
- **Laravel Sanctum** pour l'authentification API.  
- **JWT Tokens** pour sécuriser les accès.  
- **Gestion des rôles et permissions** (Admin, Enseignant).  

## 📌 **Configuration des Variables d'Environnement**  
Vérifie que les variables suivantes sont bien configurées dans le **backend (.env)** :  

---

## 🐳 **Exécution avec Docker (Optionnel)**  
Si tu souhaites exécuter l’ensemble du projet avec Docker, utilise :  
```bash
# Lancer la stack complète (backend + frontend + base de données)
docker-compose up -d
```

---

## 🤝 **Contribution**  
💡 Contributions bienvenues ! Suis ces étapes :  
1. **Fork le projet** 📌  
2. **Crée une branche** (`git checkout -b feature-nouvelle-fonctionnalité`)  
3. **Fais tes modifications et commits** (`git commit -m "Ajout d'une nouvelle fonctionnalité"`)  
4. **Pousse ta branche** (`git push origin feature-nouvelle-fonctionnalité`)  
5. **Ouvre une Pull Request** 🚀  

---

## 📜 **Licence**  
📌 Ce projet est sous licence **MIT**.  

🔗 **Développé par l’équipe @Ibraum 🚀**  🔥
