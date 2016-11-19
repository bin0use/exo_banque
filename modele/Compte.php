<?php

class Compte {

  protected $_id,
            $_name,
            $_sum,
            $_user_id;

  public function hydrate(array $donnees){
    foreach($donnees as $key => $value){
      $method = 'set' . ucfirst($key);
      
      if(method_exists($this, $method)){
        $this->$method($value);
      }
    }
  }

  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  public function ajouter($sum){
    $sum = (int) $sum;
    if(!$sum == 0){
      $this->_sum += $sum;
    }
  }

  public function retirer($sum){
    $sum = (int) $sum;
    if(!$sum == 0){
      $this->_sum -= $sum;
    }
  }

  public function setId($id){
    $id = (int) $id;
    if($id > 0){
      $this->_id = $id;
    }
  }

  public function setName($name){
    if(is_string($name)){
      $this->_name = $name;
    }
  }

  public function setSum($sum){
    $sum = (int) $sum;
    $this->_sum = $sum;
  }

  public function setUser_id($user_id){
    $user_id = (int) $user_id;
    if($user_id > 0){
      $this->_user_id = $user_id;
    }
  }

  public function getId(){
    return $this->_id;
  }

  public function getName(){
    return $this->_name;
  }

  public function getSum(){
    return $this->_sum;
  }

  public function getUser_id(){
    return $this->_user_id;
  }
}
