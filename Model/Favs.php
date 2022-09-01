<?php
class Favs{
  
    private $id;
    private $user_id;
    private $article_id;
       
    function __construct( $user_id, $article_id){
        $this->user_id=$user_id;
        $this->article_id=$article_id;
      
    }
    function getId(){
        return $this->id;
    }
    function getUser(){
        return $this->user_id;
    }
    function getArticle(){
        return $this->article_id;
    }
    
    function setUser(int $user_id){
        $this->user_id=$user_id;
    }
    function setArticle(int $article_id){
        $this->article_id=$article_id;
    }
   
    












}



?>