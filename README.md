# AssurLinkBox

## Projet Prérequis
Cette application à besoin de functionner avec : 
~~~
https://github.com/so-mouga/AssurLink
~~~
Assures-toi d'avoir suivi  et qu'aucun service est sur le ports 9999 avant de poursuivre l'installation.



## Installation
Clone le repository

~~~
git clone https://github.com/so-mouga/AssurLink.git
~~~

L'installation est très simple. 

1. Se Placer sur le projet 
~~~
- cd AssurLinkBox
~~~
2. Exécute le Serveur web interne de php
~~~
- php -S localhost:9999
~~~

Une fois le serveur démarrés, ouvrez l'url http://localhost:9999 dans le navigateur.

## Tester l'application
Jeux de donnéex users pour se connecter.
~~~
1. login = Kevin ; password = root 
2. login = mohamad ; password = root 
3. login = marc ; password = root 
4. login = nasri ; password = root 
~~~

- Ouvrir 2 pages internet avec url : http://localhost:9999. 
- Se connecter avec 2 login différents sur chaque page.
- Activer une alerte sur un objet connecté sur un des comptes. 
- les autres compte qui a le même objet connecté sera automatiquement alertés.
