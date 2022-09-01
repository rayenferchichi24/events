<?php
	include '../../config.php'; //connexion bd
	include_once '../../Model/Categorie.php'; //appel model 
	
	class CategorieC {

		function afficherCategorietri(){
			$sql='SELECT * FROM categorie ORDER BY titre ASC  ';
			$db=config::getConnexion();
			
			try{
				$list=$db->query($sql);
				return ($list);
	
			}catch(Exception $e){
				echo 'Erreur'. $e->getMessage();
			}
		}
	
       
		function afficherCategorie(){
			$sql="SELECT * FROM categorie"; //declaration 
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql); 
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
      
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
			//	header('Location: afficherCategorie.php');
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


        function modifierCategorie($categorie, $id){
			try {
				$db = config::getConnexion();
			

				$sql="UPDATE categorie SET titre= :titre,description= :description WHERE id= :id";
			    $db = config::getConnexion();
				$req=$db->prepare($sql);
				$req->bindValue(':titre', $categorie->getTitre());
				$req->bindValue(':id', $id);
				$req->bindValue(':description', $categorie->getDescription());
				$req->execute();
			//	echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
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
				die('Erreur:'. $e->getMessage());
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

		function recherche($titre,$description){
			$sql="SELECT * FROM categorie where titre like '" .$titre."' or description like '".$description."'";
			$db = config::getConnexion();
			
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
	
	

    }






    ?>