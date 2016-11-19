<?php

// Connexion à notre DB
// Chargement des classes
// Creation d'un objet $manager
require ('init.php');

// On évite l'ajout d'une entrée avec un nom vide dans la table 'compte'
if(isset($_POST['name']) && !empty($_POST['name'])){
// Création d'un nouvel objet 'Compte'. Pour le moment il existe mais n'est pas encore ajouté à la DB. C'est le manager qui s'en occupera.
$compte = new Compte([
  'name' => $_POST['name'],
  'user_id' => 1,  // Valeur à changer avec l'ajout des Users
  'sum' => 80 // Somme présente sur le compte par défaut
]);

// On ajoute les valeurs de notre objet $compte à la DB
$manager->add($compte);
}

header('location: ../views/index.php');
