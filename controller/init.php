<?php

try
{
  $db = new PDO('mysql:host=localhost;dbname=exobanque;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Chargement automatique des classes
function chargerClasse($classname){
  // Les classes sont rangées dans le dossier 'modele'
  require '../modele/' . $classname . '.php';
}
spl_autoload_register('chargerClasse');

// Création d'un manager
$manager = new CompteManager($db);
