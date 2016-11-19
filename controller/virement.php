<?php

// Connexion à notre DB
// Chargement des classes
// Creation d'un objet $manager
require ('init.php');

$sum = $_POST['sum'];
$id1 = $_POST['id1'];
$id2 = $_POST['id2'];


// On vérifie la présence de toutes les infos
if(isset($sum) && !empty($sum) && isset($id1) && !empty($id1) && isset($id2) && !empty($id2)){

  // On utilise la méthode get() du manager pour récupérer les infos d'un compte en fonction de son ID, et on attribue le résultat à une variable

  $compte1 = $manager->get($id1); // Création de l'objet compte à débiter
  $compte2 = $manager->get($id2); // Création de l'objet compte à créditer

  $compte1->retirer($sum); // On retire la somme à l'objet compte à débiter
  $compte2->ajouter($sum); // On ajoute la somme à l'objet compte à créditer

  // On enregistre les modifications dans la DB
  $manager->update($compte1);
  $manager->update($compte2);
}

// Redirection vers l'index
header('location: ../views/index.php');
