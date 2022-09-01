<?php
include '../headerBack.php';

include '..\..\Controller\UserC.php';


include_once '../../Model/User.php';
$userC = new UserC();

$error = '';

// create adherent
$user = null;

if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty ($_POST['role']) && !empty($_POST['email']) && !empty ($_POST['tel']) && !empty ($_POST['password'])) {
        $user = new user($_POST['nom'], $_POST['prenom'],$_POST['role'],$_POST['email'],$_POST['tel'],$_POST['password']);
        $userC->modifierUser($user, $_POST["id"]);
    } else {
        $error = 'Missing information';
    }
}


?>
       



<div class="row">
<?php
			if (isset($_POST['id'])){
				$user = $userC->recupererUser($_POST['id']);
				
		?>
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> Update User </h1>
                            </div>
                            <form class="user"  method="POST" action="" >
                            <input type="text" style="color :transparent ; background:transparent ; border-color:transparent"  name="id" id="id" class="form-control validate" value="<?php echo $user['id']; ?>" maxlength="20">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Nom: <br>
                                        <input type="text" name="nom" class="form-control form-control-user" id="exampleFirstName"
                                        value="<?php echo $user['nom']; ?>">
                                    </div>
                                
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Prénom: <br>
                                        <input type="text" name="prenom" class="form-control form-control-user" id="exampleFirstName"
                                        value="<?php echo $user['prenom']; ?>">
                                    </div>
                                
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Email: <br>
                                        <input type="text" name="email" class="form-control form-control-user" id="exampleFirstName"
                                        value="<?php echo $user['email']; ?>">
                                    </div>
                                
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Téléphone: <br>
                                        <input type="text" name="tel" class="form-control form-control-user" id="exampleFirstName"
                                        value="<?php echo $user['tel']; ?>">
                                    </div>
                                
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Mot de passe <br>
                                        <input type="text" name="password" class="form-control form-control-user" id="exampleFirstName"
                                        value="<?php echo $user['password']; ?>">
                                    </div>
                                
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>
     Rôle: <br />
  
     <select name="role" id="" class="form-control validate" value="<?php echo $user['role']; ?>">
     <option value="participant" name="role"> participant</option>
         <option value=" administrateur" name="role"> administrateur</option>
         <option value="organisateur" name="role"> organisateur</option>
                   
                      
                  </select>
 </label><br /><br />
                                
                                </div>
                             
                               <input type="submit" href="afficherUserBack.php" class="btn btn-primary btn-user btn-block" value="Update User Now" ></input>
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>  
            <?php
		}
		?>
                </div>
            </div>