Portfolio
=============

----------
CONSIGNES
-------

 1. À partir d'un template "one page", réaliser une découpe fine des différents blocs du site.
> **CONSEIL** : Inspecter les éléments HTML dans le navigateur pour repérer les blocs
> Refermer les blocs dans Sublime Text et commenter les fermetures de balise sur les gros blocs

 2. Prévoir des fichiers :
	- Pour les variables de config
	- Pour les fonctions
	- Pour la connexion PDO à la base de données

 3. Créer une base de données "portfolio" avec l'encodage approprié

 4. Créer une table "project" avec les colonnes suivantes :
	- id
	- title
	- description
	- client
	- tags
	- picture
	- date

 5. Alimenter des contenus dans la table "projects" (à la main ou en bonus via des scripts automatiques)

 6. Faire une requête qui récupère tous les projets triés par date décroissante

 7. Faire une boucle dans la section "portfolio" pour afficher les miniatures de projets

 8. Identifier la valeur de l'attribut href, il fait référence à l'id d'une div class "portfolio-modal"

 9. Faire une boucle sur les projets pour valoriser l'id et le contenu de chaque modal, et faire correspondre le href identifié précédemment avec l'id de la modal

 10. Créer une table "contact" avec les colonnes suivantes :
	- id
	- name
	- email
	- phone
	- message
	- date

 11. Dans contact.php, réceptionner et contrôler les données du formulaire de contact, insérer le contact en bdd ou renvoyer les erreurs et adapter la variable $status (déjà présente dans le fichier) en fonction du résultat.

----------
BONUS
-------

1. Faire un script qui insert automatiquement 20 projets en bdd, avec du contenu générique (lorem ipsum..etc).
> **CONSEIL** : Utiliser lipsum.com pour générer des paragraphes en latin, puis à partir de chaque paragraphe, utiliser la fonction substr() pour définir les différentes variables (author, title, content,...etc)

2. Dans la config, créer des variables pour le titre du site, la couleur principale ainsi que la couleur secondaire.
Utiliser ces variables pour personnaliser le site.

----------
SUPER BONUS
-------

1. Créer une table ``picture`` avec les colonnes suivantes :
	- id
	- project_id
	- src
	- alt
	- desc
	- date
	- sort

	Alimenter la table ``picture`` en associant plusieurs images à un projet.
	Pour chaque projet, récupérer les images associées depuis la table picture (avec ou sans jointure).

2. Au clic sur un projet, charger le contenu de la modal en ajax