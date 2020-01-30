# Application de Suivi stock 

petit application qui permet de suivre le stock des échasses urbaines pour les clubs **Riser Road** 


_en cours de création_ 

version francais : 

## Table de la BDD  

- **Lending** : table qui contient les locations des Echasses
- **Riser** : liste de tout les Riser du club 
- **Category** : Category de la paire d'échasse ( _baby , junior, aldut_ ) . 
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
6. crée un utilisateur manuellement ( directement en BDD en générant le hash sur la table **User** ou désactiver temporairement la sécurité sur la route **/register** afin de crée un nouvel utilisateur ( attention, ne pas oublier de réactiver la sécurité )  
7. taper la commande `php bin/console doctrine:migration:migrate` 
8. vérifier que tous fonctionne, et ajouter des donné. 

9. pour l'envoi des mail planifier un crontable sur la commande : `php bin/console riserroad:verif-lending --mail` ( par défaut, ça envoi sur les adresses mail des membres du bureau Riser Road, modifié si neccesaire dans le code _Service/mailManager.php_ 

## fonctionement 

### accededer à l'espace admin 
pour acceder à l'espace admin : 
acceder à cette adresse : **domain/admin** ( _remplacer **domain** par votre nom de domaine_ )   
enregistrer vous avec vos identifiant et vous acceder à l'espace de _easy-admin_ vous pouvaient modifié chaque element (_element descrite dans la section **table BDD**_)   via cette interface. 


english version:

# Stock Tracking App
small app that tracks stock of urban stilts for **Riser Road** and **Riser Road Fusion** clubs

_being created_

english version:

## Table of BDD

- **Lending** : table that contains the stilt rentals
- **Riser** : list of all Riser of the club
- **Category** : Stilt pair category (baby, junior, aldute).
- **State** : stilt status (OK, KO, Special)
- **RepairCommentary**: commentary on urban stilt repairs, a comment is linking to a pair of stilt
- **JumpingTilt**: tables that describe the pairs of stilt, we have as info, the hardness of stilt blades, a brief description, and reference, and other details.

## how to install


### prerequisites

- have PHP 7.2 or higher
- have [composer](https://getcomposer.org/) 
### procedure

1. retrieve the file by typing the command: git clone https://framagit.org/ponche/riserroad.git in the project folder
2. delete the .git folder
3. type: composer install
modify the .env.local  file and modify line 27 to connect to the database.
4. put the file on the server ( **only the public folder must be accessible by the server** ) in the project folder at the root
5. type the php bin / console doctrine command: migration: migrate
check that all works, and add data.
6. create a user manually (directly in BDD by generating the hash on the table **User** or temporarily deactivate security on the route **/register** in order to create a new user (be careful, do not forget to reactivate Security )
7. type the command `php bin/console doctrine: migration: migrate`
8. check that all works, and add data.

9. for sending emails plan a crontable on the command: `php bin/console riserroad: verif-lending --mail` (by default, this sends to the email addresses of members of the Riser Road office, modified if
 necessary in the _Service/mailManager.php_ code


## FUNCTIONING

go to the admin area
to access the admin space: access this address: domain / admin ( _replace domain with your domain name_ )
register with your username and access to the easy-admin space you could modify each element (element described in the section BDD table) via this interface.

