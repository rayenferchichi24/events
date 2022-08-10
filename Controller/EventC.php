<?php

include '../config.php';
include '../Model/Event.php';


class EventC
{
    function ajouterEvent($event){
        $sql="INSERT INTO event ( titre, description) 
        VALUES (:titre,:description)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                
                'titre' => $event->getTitre(),
                'description' => $event->getDescription()
                
            ]);			
            //header('Location: afficherevent.php');
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
  

    function modifierEvent($event,$id){
        $sql="UPDATE event SET username=:username, password=:password, role=:role WHERE id=:id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
				$req->bindValue(':username', $event->getUsername());
				$req->bindValue(':id', $id);
				$req->bindValue(':password', $event->getPassword());
				$req->bindValue(':role', $event->getRole());
                $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }	
    }


    function afficherEvent() {
        $sql="SELECT * FROM event";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
    }

    function recupererEvent($id){
        $sql="SELECT * from event where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $event=$query->fetch();
            return $event;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
 
    function supprimerEvent($id){
        $sql="DELETE FROM event WHERE id=:id";
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