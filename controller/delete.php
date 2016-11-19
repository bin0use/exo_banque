<?php

// Connexion à notre DB
// Chargement des classes
// Creation d'un objet $manager
require ('init.php');

// Si on clique sur Supprimer le compte
if(isset($_POST['delete'])){
  // Creation d'un nouvel objet $compte prenant comme ID l'ID du compte à supprimer
  $compte = new Compte([
    'id' => $_POST['compte_id']
  ]);
  // On demande au manager de supprimer l'entrée en fonction de cet ID
  $manager->delete($compte);
}
// Redirection pour rafraichir la page
header('location: ../views/index.php');;
