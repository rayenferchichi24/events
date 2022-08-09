<?php

include '../config.php';
include '../Model/Categorie.php';


class CategorieC 
{
    function ajouterCategorie($categorie){
        $sql="INSERT INTO categorie ( titre, description) 
        VALUES (:titre,:description)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                
                'titre' => $categorie->getTitre(),
                'description' => $categorie->getDescription()
                
            ]);			
            //header('Location: afficherCategorie.php');
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
  

    function modifierCategorie($categorie,$id){
        $sql="UPDATE categorie SET titre=:titre, description=:description WHERE id=:id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
				$req->bindValue(':titre', $categorie->getTitre());
				$req->bindValue(':id', $id);
				$req->bindValue(':description', $categorie->getDescription());
				$req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }	
    }


    function afficherCategorie() {
        $sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
    }

    function recupererCategorie($id){
        $sql="SELECT * from categorie where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $categorie=$query->fetch();
            return $categorie;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
 
    function supprimerCategorie($id){
        $sql="DELETE FROM categorie WHERE id=:id";
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
