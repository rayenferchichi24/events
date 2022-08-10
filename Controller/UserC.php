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
     
function ajouterUser($user){
    $sql="INSERT INTO user ( username, password, role) 
    VALUES (:username,:password,:role)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
            
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ]);			
        //header('Location: afficheruser.php');
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }			
}


function modifierUser($user,$id){
    $sql="UPDATE user SET titre=:titre, description=:description WHERE id=:id";
    $db = config::getConnexion();
    try{
        $req=$db->prepare($sql);
            $req->bindValue(':titre', $user->getTitre());
            $req->bindValue(':id', $id);
            $req->bindValue(':description', $user->getDescription());
            $req->execute();
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }	
}


function afficherUser() {
    $sql="SELECT * FROM user";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
}

function recupererUser($id){
    $sql="SELECT * from user where id=$id";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $user=$query->fetch();
        return $user;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

function supprimerUser($id){
    $sql="DELETE FROM user WHERE id=:id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id', $id);
    try{
        $req->execute();
        
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMeesage());
    }
}
}