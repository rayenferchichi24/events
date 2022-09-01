<?php
class Categorie{
  
    private $id;
    private $titre;
    private $description;
       
    function __construct( $titre, $description){
        $this->titre=$titre;
        $this->description=$description;
      
    }
//getters
    function getId(){
        return $this->id;
    }
    function getTitre(){
        return $this->titre;
    }
    function getDescription(){
        return $this->description;
    }
    
//setters
    function setTitre(string $titre){
        $this->titre=$titre;
    }
    function setDescription(string $description){
        $this->description=$description;
    }



}



?>