<p align="center"><img src="readme-banner.jpg" alt="Banniere README.md ERP RioTinto"></p>

| Sommaire  |      [À propos](#about)       |  [Installation](#install) | [Utilisation](#use) | [Programmation](#dev) | [Licence](#licenses) |
|:---------:|:-----------------------------:|:--------------------------:|:--------------------------:|:-----------------------------:|:---------------------:|

## À propos de ERP RioTinto<a id="about"></a>

ERP ou Entreprise Ressouce Planning est un logiciel de gestion intégré au système d'information d'une entreprise pour coordonner le pilotage des processus et activités.L'application est sous la forme d'une single-page propulsée en VueJS 3 et alimenté par un back-end Laravel 10(PHP).


## Prérequis
- Minimun PHP 8.1

#### Build les dépendances back-end (php)
Depuis le host (local ou prod) `~/Your-www-project-folder`:
```bash
cd ~/Your-www-project-folder/erp
cp .env.example .env
composer install
```

#### Build les dépendances front-end (assets et VueJS)
Depuis le host (local) `~/Your-www-project-folder/frontend`:
```bash
cd ~/your-www-project-folder/erp/frontend
rm package-lock.json && rm -rf nodes_modules
npm install
```

#### Lancement du projet
Lancer le server back-end:
```bash
cd ~/your-www-project-folder/erp:
php artisan serve
```
Lancer l'affichage front-end en mode developpement:
```bash
cd ~/your-www-project-folder/erp/frontend :
npm run dev
```