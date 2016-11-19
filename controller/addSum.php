<?php

// Connexion à notre DB
// Chargement des classes
// Creation d'un objet $manager
require ('init.php');

// On vérifie si une somme a bien été entrée dans l'input
if(isset($_POST['sum']) && !empty($_POST['sum'])){

  // On crée un nouvel objet à partir des infos envoyées par le formulaire
  $compte = new Compte([
    'id' => $_POST['compte_id'],
    'sum' => $_POST['sumStart'],
  ]);

  // On ajoute la somme si on clique sur le bouton ajouter
  if(isset($_POST['add']) && !empty($_POST['add'])){
    $compte->ajouter($_POST['sum']);
  } else {
    // Sinon on retire la somme du compte
    $compte->retirer($_POST['sum']);
  }

  // On demande au manager d'enregistrer les modifications dans la DB
  $manager->update($compte);

}

// Redirection vers la page d'accueil
header('location: ../views/index.php');
