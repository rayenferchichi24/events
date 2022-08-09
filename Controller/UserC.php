<?php

include '../config.php';
include '../Model/User.php';


class UserC
{
    function login($username,$password){
        $sql="SELECT * FROM user WHERE username = '$username' and password = '$password'";
        $db=config::getConnexion();
        try{
        
  
            $query=$db->prepare($sql);
            $query->execute();
            $user=$query->fetch();
           // var_dump($user['email']);
            $username=$user['username'];
            $password=$user['password'];
            $role=$user['role'];
            $id=$user['id'];
            $count= $query->rowCount();
            if($count == 1) {
              
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['role'] =$role;
                
                if($role == 'ADMIN'){
                    //header("location:listeutilisateur.php");
                }else if ($role == 'ORGANISATEUR'){
                    //header("location:listeutilisateur.php");}
                else
                    //header("location:my-profile.php?username=$username&id=$id&email=$email&password=$password");
             }else {
                $error = "Your Login Name or Password is invalid";
             }
           
        }catch(Exception $e){
            echo 'Erreur'. $e->getMessage();
        }
    }

}