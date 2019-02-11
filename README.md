# Application de Suivi stock 

petit application qui permet de suivre le stock des échasses urbaines pour les clubs **Riser Road** et **Riser Road Fusion** 


_en cours de création_ 

version francais : 

## Table de la BDD  

- **Lending** : table qui contient les locations des Echasses
- **Riser** : liste de tout les Riser du club 
- **Category** : Category de la paire d'échasse ( _baby , junior, aldute_ ) . 
- **State** : status de l'échasse ( _OK, KO, Special_) 
- **RepairCommentary** : commentaire des réparations des échasses urbaine, un commentaire est lier à une paire d'échasse
- **JumpingTilt** : tables qui décrit les paires d'échasse, on a comme info, la dureté des lames d'échasse, une bref description, et la référence, et autre détails . 

## comment installer 

procédure pour l'application web sur un serveur 

### prérequis

- avoir PHP 7.2 ou supérieur 
- avoir [composer](https://getcomposer.org/)  

### procédure 

1. récuperer le dossier en tapant la commande : `git clone https://framagit.org/ponche/riserroad.git` 
_dans le dossier du projet_ 
2. supprimer le dossier `.git`
3. taper : `composer install`
4. modifier le fichier **.env** et modifié la ligne _27_ pour la connexion à la BDD. 
5. mettre le fichier sur le serveur ( **seul le dossier public doit etre accecible par le serveur** ) 
_dans le dossier du projet à la racine_ 
6. taper la commande `php bin/console doctrine:migration:migrate` 
7. vérifier que tous fonctionne, et ajouter des donné. 



