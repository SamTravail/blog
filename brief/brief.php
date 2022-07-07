<?php

//======================================================================
// JOUR 1
//======================================================================

//Un blog permet de :
/*
-	lister des articles;
-	créer et éditer des articles;
-	supprimer des articles;
-	commenter des articles;
-   trier des articles, recherche dans titre de l'article
-   paginer des articles.
-	modérer des commentaires;
-	supprimer des commentaires;
*/


// Il n’y a pas de droit spécifique pour la lecture d’un article ou d’un commentaire.
// Vous devrez créer un back-office (qui sera accessible à tous) mais qui auras un design légèrement différent et un header avec des liens différents
// C'est dans le back-office que vous pouvez créer/modifier/supprimer un article.

// Pour pouvoir créer un commentaire, l’utilisateur peut être anonyme mais il doit renseigner un pseudonyme.

// Pour pouvoir moderer/supprimer un commentaire, Cela se fera dans la partie Back-office.
// Dans la vrai vie, ce back-office serait sécurisé.

// Remarque: Chaque étape devra mettre montré et validé avant d'attaquer l'étape suivante.

// Nous allons initier le projet ensemble pour avoir la même structure. Partie front, partie back.

//======================================================================
// Etape 1: Création de la base de données avec les tables suivantes :
//======================================================================

// articles (id, title(255), content(text), auteur, created_at, modified_at, status)
//	comments (id, id_article, content(text), auteur, created_at(datetime), modified_at, status(varchar 20))

//======================================================================
// Etape 2: Développement du formulaire de création d’un article. (Back-office)
//======================================================================

// création du fichier newpost.php , lien accesible dans back-office
// faire un lien de la page dashboard vers le fichier.
// Cette étape comprend le développement du formulaire en HTML et l’enregistrement des informations en base de données.
// créez si possible des fonctions pour la validation de formulaire. qui vous serviront toujours pour la suite

//======================================================================
// Etape 3: Développement du formulaire d’édition d’un article existant. (Back-office)
//======================================================================

// création du fichier editpost.php, lien accesible dans back-office à partir du listing des articles
// Cette étape comprend le développement du formulaire en HTML et l’update des informations en base de données.

//======================================================================
// Etape 4: Lister les articles créés sur la page d'accueil (Front)
//======================================================================

// le status des article doit etre egale à "publish"
// seulement leurs titres, le nom de l’auteur et la date de publication.

//======================================================================
// Etape 5: Permettre de consulter le détail d’un article.
//======================================================================

// creation fichier single.php
// On y voit le titre de l’article, son contenu, l’auteur, la date de publication et la date de modification si elle existe.

//======================================================================
// Etape 6: Permettre de supprimer un article. (Back-office)
//======================================================================

// La suppression d’un article est fictive. Il s’agit en fait de mettre le status d’un article à "draft".
// Limiter la liste des articles aux articles qui ont un statut à "publish" sur index.php mais lister les tous sur le back-office

//======================================================================
// Etape 7: Ajouter un formulaire pour commenter un article. ( detail.php)
//======================================================================

//======================================================================
// Etape 8: Dans le détail d’un article, ajouter la liste des commentaires publiés.
//======================================================================

//======================================================================
// Etape 9: Création d'une pagination
//======================================================================

// Savoir comment créer des liens vers la page suivante et précédente
// helper paramètre d'URI ?page=2, et "limit" et "offset" MySQL,

//======================================================================
// Creation d'un back-office, creation front-office
//======================================================================
// faire quelque chose de jolie ++

//======================================================================
// Etape 10: SYSTEME DE FILTRE/recherche
//======================================================================

// SQL dynamique requete sécurisé++ , LIKE
// utiliser les parametres d'URL, de type search.php?search=motclef
// creation fichier search.php  à la racine du site et envoyer la recherche vers ce fichier
// creation formulaire method get vers fichier search.php dans le header.php du front
// affichage des articles qui correspondent à la recherche après soumission du formulaire.