# README
Une bibliothèque pour le cours de php dans le but d'apprendre une architecture MVC avec des fonctionnalité comme :

* recherche des livre, éditeurs, auteurs.
*  S'inscrire à la base de données et se connecter. 
*  Supprimer, ajouter, modifier des livres si vous etes inscris à la base de données 

## Un livre

* un titre
* un id
* une date de publication
* editor_id
* une catégorie
* un résumé
* un nombre de page
* une cote
* une image
* isbn

## Un auteur
* un nom
* un id
* un prénom
* birth_date
* une biographie
* une cote
* une image

## Un éditeur
* un nom
* un id
* id_author
* id_book
* une description
* une image

##Catégorie

* nom categorie
* id

## author_book
* book_id
* author_id

## Users
* id
* username
* email
* password