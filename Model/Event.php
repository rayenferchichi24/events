<?php
class Event{
  
    private $id;
    private $nom;
    private $image;
    private $lieu;
    private $date;
    private $description;
    private $categorieId;
       
    function __construct( $nom, $image, $lieu, $date,$description,$categorieId){
        $this->nom=$nom;
        $this->image=$image;
        $this->lieu=$lieu;
        $this->date=$date;
        $this->description=$description;
        $this->categorieId=$categorieId;
      
    }
//getters

    function getId(){
        return $this->id;
    }
    function getCategorieId(){
        return $this->categorieId;
    }
  
    function getNom(){
        return $this->nom;
    }
    function getImage(){
        return $this->image;
    }
    function getLieu(){
        return $this->lieu;
    }
    function getDate(){
        return $this->date;
    }
    function getDescription(){
        return $this->description;
    }

//setters 
    function setNom(string $nom){
        $this->nom=$nom;
    }
   
    function setCategorieId(string $categorieId){
        $this->categorieId=$categorieId;
    }
    function setImage(string $image){
        $this->image=$image;
    }

    function setLieu(string $lieu){
        $this->lieu=$lieu;
    }
    function setDate(string $date){
        $this->date=$date;
    }

    function setDescription(string $description){
        $this->description=$description;
    }


}



?>