<?php
	include '../../config.php';
	include_once '../../Model/Categorie.php';
	class FavsController {



        function afficherFavories(){
			$sql="SELECT * FROM favs";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerFavories($id){
			$sql="DELETE FROM favs WHERE id=:id";
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
		function ajouterFavories($user_id,$event_id){
			$sql="INSERT INTO favs ( user_id, event_id) 
			VALUES (:user_id,:eevnt_id)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'user_id' => $user_id,
					'event_id' => $event_id
					
				]);			
				header('Location: ../event/afficherAllEventFront.php');
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererFavories($id){
			$sql="SELECT * from favs where id=$id";
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

		
		














    }

    ?>