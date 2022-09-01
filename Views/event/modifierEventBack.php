<?php
include '../headerBack.php';

include '..\..\Controller\EventC.php';


include_once '../../Model/Event.php';


if(isset($_POST['fileToUpload'])) {
  
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
  
      // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      // if($check !== false) {
      //   echo "File is an image - " . $check["mime"] . ".";
      //   $uploadOk = 1;
      // } else {
      //   echo "File is not an image.";
      //   $uploadOk = 0;
      // }
    
    
    // Check if file already exists
    // if (file_exists($target_file)) {
    //   echo "Sorry, file already exists.";
    //   $uploadOk = 0;
    // }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }

  
$eventC = new EventC();

$error = '';

// create adherent
$event = null;

$listeCategorie=$eventC->affichercategories(); 
// if(!(isset($_POST['fileToUpload']))){
//   $event = $eventC->recupererEvent($_POST['id']);
//  // var_dump($event['image']);
//   $im=  $event['image'];
//   var_dump($im);
//   $event->setImage($event['image']);
// }
        if (isset($_POST['lieu'])) {
          $image=$_POST['image'];

          if(isset($_POST['fileToUpload'])){
          $image=$_FILES["fileToUpload"]["name"];
          }

            $event = new Event($_POST['nom'],$image,$_POST['lieu'], $_POST['date'],$_POST['description'],$_POST['CategorieId']);
            $eventC->modifierEvent($event, $_POST["id"]);
        }
       
        

    
?>
       



<div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Event</h1>
                            </div>
                            <?php
			if (isset($_POST['id'])){
				$event = $eventC->recupererEvent($_POST['id']);
				
		?>
                            <form class="user"  method="POST" action="" enctype= "multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" style="color :transparent ; background:transparent ; border-color:transparent"  name="id" id="id" class="form-control validate" value="<?php echo $event['id']; ?>" maxlength="20">
                                    <input type="text" style="color :transparent ; background:transparent ; border-color:transparent"  name="image" id="id" class="form-control validate" value="<?php echo $event['image']; ?>" maxlength="20">
                      
                                        <input type="text" name="nom" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nom" value="<?php echo $event['nom']; ?>">
                                    </div>
                                
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="file" name="fileToUpload" id="fileToUpload" maxlength="20"  class="form-control form-control-user" value="<?php echo $event['image']; ?>"></input>

                                    </div>
                                
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                       
                                        <input type="text" name="lieu" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Lieu" value="<?php echo $event['lieu']; ?>">
                                    </div>
                                
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                       
                                        <input type="text" name="date" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Date" value="<?php echo $event['date']; ?>">
                                    </div>
                                
                                </div>
                                <div class="form-group">
                                  
                                    <textarea name="description" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Description" value="<?php echo $event['description']; ?>"> </textarea>
                                </div>
                             
                                <div class="form-group lg-12">
                    <label
                      for="Categorie"
                      >Categorie
                    </label>
                    <select name="CategorieId" id="" class="form-control validate" value="<?php echo $categorie['id']; ?>">
                       
                       <?php   foreach($listeCategorie as $categorie){
                ?>
   
                          <option value="<?php echo $categorie['id']; ?>" name="CategorieId" id=""><?php echo $categorie['titre']; ?></option>
                         
                         
                          <?php } ?>
                      
                  </select>
  


                  </div>

                               <input type="submit" name="submit" href="afficherCategorieBack.php" class="btn btn-primary btn-user btn-block" value="Add Event Now" ></input>
                         
                              </form>

                              <?php } ?>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>