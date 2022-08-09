<?php

class Categorie {
    private $id;
    private $titre;
    private $description;
    


    function __construct($titre,$description){

        $this->titre=$titre;
        $this->description=$description;
        

    }


    function getId(){
        return $this->id;
    }

    function setDescription($description){
        $this->description=$description;
    }
    function getDescription(){
        return $this->description;
    }
    function setTitre($titre){
        $this->titre=$titre;
    }
    function getTitre(){
        return $this->titre;
    }
}
    ?>