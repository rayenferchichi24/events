<?php

class User {
    private $id;
    private $username;
    private $password;
    private $role;


    function __construct($username,$password,$role){

        $this->username=$username;
        $this->password=$password;
        $this->role=$role;

    }


    function getId(){
        return $this->id;
    }

    function setUsername($username){
        $this->username=$username;
    }
    function getUsername(){
        return $this->username;
    }
    function setPassword($password){
        $this->password=$password;
    }
    function getPassword(){
        return $this->password;
    }
    function setRole($role){
        $this->role=$role;
    }
    function getRole(){
        return $this->role;
}
    ?>