<?php
class User{
  
    private $id;
    private $nom;
    private $prenom;
    private $role;
    private $email;
    private $tel;
    private $password;
       
    function __construct( $nom, $prenom, $role, $email, $tel, $password){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->role=$role;
        $this->email=$email;
        $this->tel=$tel;
        $this->password=$password;
      
    }
 //getters
    function getId(){
        return $this->id;
    }
    function getNom(){
        return $this->nom;
    }
    function getPrenom(){
        return $this->prenom;
    }
    function getRole(){
        return $this->role;
    }
    function getEmail(){
        return $this->email;
    }
    function getTel(){
        return $this->tel;
    }
    function getPassword(){
        return $this->password;
    }

//setters
    function setNom(string $nom){
        $this->nom=$nom;
    }
    function setPrenom(string $prenom){
        $this->prenom=$prenom;
    }
    function setRole(string $role){
        $this->role=$role;
    }
    function setEmail(string $email){
        $this->email=$email;
    }
    function setTel( int $tel){
        $this->tel=$tel;
    }
    function setPassword(string $password){
        $this->password=$password;
    }



}



?>