<?php

class CompteManager{

  private $_db; // Instance PDO

  public function __construct($db){
    $this->setDb($db);
  }

  public function add(Compte $compte){
    $req = $this->_db->prepare('INSERT INTO compte(name,sum,user_id) VALUES (:name, :sum, :user_id)');

    // On enregistre les valeurs de l'objet dans la DB
    $req->bindValue(':name', $compte->getName());
    $req->bindValue(':user_id', $compte->getUser_id());
    $req->bindValue(':sum', $compte->getSum());
    $req->execute();
  }

  public function delete(Compte $compte){
    $this->_db->query('DELETE FROM compte where id =' .$compte->getId());
  }

  public function update(Compte $compte){
    $req = $this->_db->prepare('UPDATE compte SET sum = :sum WHERE id = :id');

    $req->bindValue(':sum', $compte->getSum(), PDO::PARAM_INT);
    $req->bindValue(':id', $compte->getId(), PDO::PARAM_INT);

    $req->execute();
  }

  public function getCompte($user_id){
    $comptes = [];

    // On récupère les infos des comptes appartenant à un User en fonction de user_id
    $q = $this->_db->prepare('SELECT id, name, sum, user_id FROM compte WHERE user_id = :user_id ORDER BY id');
    $q->execute([':user_id' => $user_id]);

    // On crée des objets Compte en fonction de ces infos qu'on range dans un tableau
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comptes[] = new Compte($donnees);
    }

    // On renvoie le tableau
    return $comptes;
  }

  public function get($id){
    // On récupère les infos du compte à partir de son ID
    $req = $this->_db->prepare('SELECT * FROM compte WHERE id = :id');
    $req->bindValue(':id', $id );
    $req->execute();

    // On crée un nouvel object $compte à partir des données récupérées
    while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
      $compte = new Compte($donnees);
    }

    // On retourne l'objet
    return $compte;
  }

  public function setDb(PDO $db){
    $this->_db = $db;
  }
}
