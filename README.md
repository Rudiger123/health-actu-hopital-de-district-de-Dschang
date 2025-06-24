# Site web de la filiale média de l’hôpital de District de la ville de Dschang

## Description

Ce projet est une application web moderne développée avec Laravel (PHP) pour le backend et un stack JavaScript (Vite, TailwindCSS, Bootstrap, Alpine.js) pour le frontend. Il vise à offrir une plateforme d’information, de communication et de gestion de contenu pour la filiale média de l’hôpital de District de Dschang.

## Fonctionnalités principales

- **Page d’accueil** présentant l’hôpital et ses actualités
- **Gestion des services** proposés par l’hôpital (consultations, spécialités, etc.)
- **Blog** avec articles, catégories, tags, recherche, profils d’auteurs
- **Formulaire de contact** pour joindre l’équipe de la filiale média
- **Newsletter** (si activée)
- **Espace d’administration** pour la gestion des contenus, des messages de contact, etc.
- **Gestion multilingue** (si activée via Laravel Lang)
- **Sécurité** : Authentification, gestion des rôles (si activée)
- **Responsive design** grâce à TailwindCSS et Bootstrap

## Technologies utilisées

- **Backend** : Laravel 11, PHP 8.2+
- **Frontend** : Vite, TailwindCSS, Bootstrap 5, Alpine.js, Livewire
- **Base de données** : MySQL ou SQLite (configurable)
- **Outils de développement** : Composer, NPM, PHPUnit, Pest, Laravel Sail (optionnel)
- **Autres packages** :
  - cviebrock/eloquent-sluggable (SEO)
  - phpmailer/phpmailer (envoi d’emails)
  - sweetalert2 (UI notifications)
  - laravel-vite-plugin (intégration Vite)
  - laravel/breeze (authentification rapide)
  - barryvdh/laravel-debugbar (debug)
  - et autres (voir composer.json et package.json)

## Installation

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js et NPM
- MySQL ou SQLite

### Étapes

1. **Cloner le dépôt**
   ```bash
   git clone <url-du-repo>
   cd <nom-du-dossier>
   ```

2. **Installer les dépendances backend**
   ```bash
   composer install
   ```

3. **Installer les dépendances frontend**
   ```bash
   npm install
   ```

4. **Configurer l’environnement**
   - Copier `.env.example` en `.env` et adapter les variables (DB, mail, etc.)
   - Générer la clé d’application :
     ```bash
     php artisan key:generate
     ```

5. **Migrer la base de données**
   ```bash
   php artisan migrate --seed
   ```

6. **Lancer le serveur de développement**
   ```bash
   npm run dev
   php artisan serve
   ```

   Ou, pour tout lancer en parallèle (si Sail ou `concurrently` est configuré) :
   ```bash
   composer dev
   ```

## Déploiement

- Compiler les assets pour la production :
  ```bash
  npm run build
  ```
- Configurer le serveur web (Apache/Nginx) pour pointer vers le dossier `public/`
- Adapter les variables d’environnement pour la production (`APP_ENV=production`, etc.)
- Configurer les permissions sur `storage/` et `bootstrap/cache/`

## Structure du projet

- `app/` : logique métier (contrôleurs, modèles, etc.)
- `resources/views/` : vues Blade (pages, composants, admin, blog, etc.)
- `routes/` : définitions des routes web et API
- `public/` : fichiers accessibles publiquement (index.php, assets compilés)
- `database/` : migrations, seeders, factories
- `config/` : fichiers de configuration
- `tests/` : tests automatisés

## Tests

- Lancer les tests :
  ```bash
  php artisan test
  ```
  ou
  ```bash
  ./vendor/bin/pest
  ```

## Auteurs

- Feutsop Kenne Rüdiger Dietrich
- feutsoprudiger@gmail.com

## Licence

Ce projet est sous licence MIT.
