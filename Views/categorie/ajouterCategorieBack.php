<?php
include '../headerBack.php';

include '..\..\Controller\CategorieC.php';


include_once '../../Model/Categorie.php';
$categorieC = new CategorieC();

$error = '';

// create adherent
$categorie = null;

if (isset($_POST['titre']) && isset($_POST['description'])) {
    if (!empty($_POST['titre']) && !empty($_POST['description'])) {
        $categorie = new Categorie($_POST['titre'], $_POST['description']);
        $categorieC->ajouterCategorie($categorie);
    } else {
        $error = 'Missing information';
    }
}


?>
       



<div class="row">
                   
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                            </div>
                            <form class="user"  method="POST" action="" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Titre : <br>
                                        <input type="text" name="titre" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Titre">
                                    </div>
                                
                                </div>
                                <div class="form-group">
                                    <br>
                                    Description
                                    <textarea name="description" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Description"> </textarea>
                                </div>
                             
                               <input type="submit" href="afficherCategorieBack.php" class="btn btn-primary btn-user btn-block" value="Add Category Now" ></input>
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>