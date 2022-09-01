<?php

include '..\..\Controller\UserC.php';


include_once '../../Model/User.php';
$userC = new UserC();

$error = '';

// create adherent
$user = null;

if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty ($_POST['role']) && !empty($_POST['email']) && !empty ($_POST['tel']) && !empty ($_POST['password']))
     {
        $email=$_POST['email'];
        if ( preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $email ) )
                {
               
                
              
        $user = new user($_POST['nom'], $_POST['prenom'],$_POST['role'],$_POST['email'],$_POST['tel'],$_POST['password']);
        $userC->ajouterUser($user);
         }
        else {
            
                            $message =  "L'adresse eMail est invalide";
                            echo "<script type='text/javascript'>alert('$message');</script>";
            
        }
    } 
    else {
        $error = 'Missing information';
    }
}




?>
       


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../back/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../back/src/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../back/src/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../back/src/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../back/src/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../back/src/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../back/src/assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../back/src/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4">Register</h2>
              <div class="auto-form-wrapper">
                <form action=""  method="POST"enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control"  name="nom" placeholder="Nom" onblur="lett(this)">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control"  name="prenom" placeholder="Prenom" onblur="lett(this)">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control"  name="tel" placeholder="Téléphone" onblur="lett(this)">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control"  name="email" placeholder="Email" onblur="lett(this)">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" placeholder="Password" onblur="lett(this)">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <label>
                                    Quelle est votre statut ?<br> <br>
                                    <select name="role" class="form-control">
                                    
                                        <option name="role" value="participant"> participant</option>
                                        <option name="role" value=" administrateur"> administrateur</option>
                                        <option name="role" value="organisateur"> organisateur</option>
                                    </select>
                                </label><br /><br />
                  <div class="form-group d-flex justify-content-center">
                    <div class="form-check form-check-flat mt-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> I agree to the terms </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block" type="submit">Register</button>
                  </div>
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                    <a href="login.php" class="text-black text-small">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../back/src/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../back/src/assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../back/src/assets/js/shared/off-canvas.js"></script>
    <script src="../back/src/assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <script src="../back/src/assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
  </body>
</html>