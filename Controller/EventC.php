<?php
	include '../../config.php'; //connexion bd
	include_once '../../Model/Event.php'; //appel model 
	
    class EventC{

		function rechercheEvent($nom,$lieu,$date,$description){
			$sql="SELECT * FROM event where nom like '" .$nom."' or lieu = '".$lieu."or date like ".$date."or description like ".$description."'";
			$db = config::getConnexion();
			
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
    }


		function afficherEventtri(){
			$sql='SELECT * FROM event ORDER BY nom DESC  ';
			$db=config::getConnexion();
			
			try{
				$list=$db->query($sql);
				return ($list);
	
			}catch(Exception $e){
				echo 'Erreur'. $e->getMessage();
			}
		}
	
		

		function afficherCategories(){
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


        function afficherEvent(){
			$sql="SELECT * FROM event "; //declaration 
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql); 
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function afficherEventParCategorie($id){
			$sql="SELECT * FROM event  where categorieId =".$id ." AND accepter = 1"; //declaration 
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql); 
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
        function ajouterEvent($event){

			$sql="INSERT INTO event ( nom, image, lieu, date, description,categorieId) 
			VALUES (:nom,:image,:lieu,:date,:description,:categorieId)";
			$db = config::getConnexion();
			$pname="";
			$tname="";
			// $pname = rand(1000,1000)."-".$_FILES["files"]["name"];
            // 	$tname=$_FILES["files"]["tmp_name"];
            	$uploads_dir ='images';
			try{
				$query = $db->prepare($sql);
				
                move_uploaded_file($tname,$uploads_dir.'/'.$pname);

				$query->execute([
					'nom' => $event->getNom(),
                    'image' => $event->getImage(),
                    'lieu' => $event->getLieu(),
                    'date' => $event->getDate(),
					'description' => $event->getDescription(),
					'categorieId' => $event->getCategorieId()
					
				]);		
		    $message = "Le produit apartient a la liste des favoris";
			echo "<script type='text/javascript'>alert('$message');</script>";	
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


        function modifierEvent($event, $id){
			try {
				$db = config::getConnexion();
			

				$sql="UPDATE event SET nom= :nom,image= :image, lieu= :lieu, date= :date, description= :description ,categorieId= :categorieId WHERE id= :id";
			    $db = config::getConnexion();
				$req=$db->prepare($sql);
				$req->bindValue(':nom', $event->getNom());
                $req->bindValue(':image', $event->getImage());
                $req->bindValue(':lieu', $event->getLieu());
                $req->bindValue(':date', $event->getDate());
				$req->bindValue(':categorieId', $event->getCategorieId());
				$req->bindValue(':id', $id);
				$req->bindValue(':description', $event->getDescription());
				$req->execute();
			//	echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
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

		function afficherEventAccepter(){
			$sql='SELECT * FROM event where  accepter = 1  ';
			$db=config::getConnexion();
			
			try{
				$list=$db->query($sql);
				return ($list);
	
			}catch(Exception $e){
				echo 'Erreur'. $e->getMessage();
			}
		}

        function accepterEvent($id){

            try {
                $db = config::getConnexion();
            
    
                $sql="UPDATE event  SET accepter = 1  WHERE id= ". $id;
                $db = config::getConnexion();
                $req=$db->prepare($sql);
              
                $req->execute();
            //	echo $query->rowCount() . " records UPDATED successfully <br>";
          
            } catch (PDOException $e) {
                $e->getMessage();
            }
    
            
        }

		function ajouterFavories($userId,$eventId){
			$db = config::getConnexion();
			try{
				$result = $db->query("SELECT * FROM favs WHERE userId = '". $userId."' AND eventId = '". $eventId."'");
				$res=$result->fetch();
				
				
				if ($res == 0) {
				$sql="INSERT INTO favs ( userId, eventId) 
				VALUES (:userId,:eventId)";
				
				$query = $db->prepare($sql);
				$query->execute([
					
					'userId' => $userId,
					'eventId' => $eventId
					
				]);
					$message = "L'evenement a été ajouté a la liste des favoris";
		 echo "<script Type='javascript'>alert('JavaScript Alert Box by PHP');</script>";
					   }
				   else {

					$sql="DELETE FROM favs WHERE userId=:userId and eventId=:eventId";
					
					$req=$db->prepare($sql);
					$req->bindValue(':userId', $userId);
					$req->bindValue(':eventId', $eventId);
					try{
						$req->execute();
						$message = "L'evenement a été supprimé de la liste des favoris";
		 echo "<script type='text/javascript'>alert('$message');</script>";
					}
					catch(Exception $e){
						die('Erreur:'. $e->getMeesage());
					}


						   }
				
			// $message = "Le produit apartient a la liste des favoris";
			// echo "<script type='text/javascript'>alert('$message');</script>";
			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


    }
    ?>