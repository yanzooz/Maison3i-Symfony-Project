
# Maison3i – Boutique en ligne en Symfony 🛍️

**Maison3i** est un site e-commerce développé avec **Symfony**. Il présente une collection de vêtements en édition limitée, proposée lors d’un **Pop-up Store en juillet 2023**.

---

## 🚀 Démo locale

Lancer le site sur votre machine :

```
http://localhost:8000
```

---

## ✨ Fonctionnalités principales

- **Page d'accueil dynamique** avec accès aux produits ou à des collections spécifiques.
- **Navigation fluide et responsive**, adaptée aux formats desktop et mobile.
- **Navbar dynamique** : accès à l’accueil, aux produits et à l’authentification.
- **Pages produits** :
  - Vue par **catégorie** ou **tous les produits**
  - Effets d’animation au scroll
- **Fiches produits détaillées** :
  - Galerie d’images Swiper.js
  - Zoom modal
  - Hover animations
- **Système d’authentification complet** :
  - Inscription, connexion, déconnexion
  - Gestion des rôles : `ROLE_USER`, `ROLE_ADMIN`
- **Back-office administrateur** via **EasyAdmin** :
  - Gestion des produits, catégories, utilisateurs
- **Responsive Design** optimisé pour mobile et desktop

---

## 🛠️ Technologies utilisées

### Back-end
- **Symfony 6**
- **Doctrine ORM**
- **MySQL**
- **VichUploaderBundle**

### Front-end
- **Twig**
- **TailwindCSS**
- **Swiper.js**
- **EasyAdminBundle**

---

## ⚙️ Installation du projet

### 1. Cloner le dépôt

```bash
git clone https://github.com/ton-compte/maison3i.git
cd maison3i
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Configurer l’environnement local

Créer un fichier `.env.local` :

```dotenv
DATABASE_URL="mysql://user:password@127.0.0.1:3306/maison3i"
```

### 4. Créer la base de données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

### 5. Lancer le serveur

```bash
symfony server:start
```

---

## 🧩 Structure du projet

- `src/Entity/` : entités `Product`, `Category`, `Image`, `User`
- `src/Controller/` : `IndexController`, `SecurityController`
- `src/Controller/Admin/` : `DashboardCrudController`, `ProductCrudController`, `CategoryCrudController`, `UserCrudController`
- `src/DataFixtures/` : `AppFixtures`, `UserFixtures`
- `src/Form/` : `RegistrationFormType`, `ImageType`
- `templates/` :
  - `base.html.twig` (navbar + footer)
  - `security/`
  - `index/`
  - `admin/field/`

---

## 👤 Auteur

Projet développé par **Yannick** dans le cadre de la formation **Développeur Web & Web Mobile** chez Human Booster.

- GitHub : [@yanzooz](https://github.com/yanzooz)

---

## 📚 Leçons apprises

Ce projet représente l’aboutissement de mon apprentissage en PHP et Symfony.

Avant Symfony, j’avais des notions du modèle MVC que j’ai pu mettre en pratique ici, même si Symfony apporte sa propre logique.

J’ai rencontré plusieurs difficultés :
- **EasyAdmin** m’a donné du fil à retordre pour comprendre le fonctionnement des champs et des pages.
- Les fichiers **YAML** (sécurité, routes, services) m’ont demandé beaucoup de recherches.
- L’implémentation de **VichUploaderBundle** a été un vrai défi, surtout pour la gestion des images multiples.

Mais c’est justement en affrontant ces obstacles que j’ai beaucoup progressé. J’ai désormais une meilleure compréhension de Symfony, et je suis motivé à développer d’autres projets pour consolider mes bases.

---

## 📈 Roadmap

- [ ] Ajouter une **relation utilisateur ⇄ produit** (produits favoris, historique, etc.)
- [ ] Mettre en place une **newsletter**
- [ ] Développer une **API REST** avec **API Platform**
- [ ] Ajouter une gestion des **commandes/paniers**
- [ ] Déploiement en ligne (avec Docker, Railway ou autre)

---

## 📸 Screenshots

### Page d’accueil
![Homepage Screenshot](public/screens/Screenshot-page-produit.png)

### Page detail
![Product Screenshot](public/screens/Screenshot-page-detail.png)


### Page admin
![Product Screenshot](public/screens/Screenshot-page-admin.png)

### Page admin
![Product Screenshot](public/screens/Screenshot-page-admin-2.png)

### Page authentification
![Product Screenshot](public/screens/Screenshot-page-authentification.png)

## 📄 Licence

[MIT License](https://choosealicense.com/licenses/mit/)


