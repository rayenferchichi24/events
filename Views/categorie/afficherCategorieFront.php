<?php
include '../headerFront.php';


include '..\..\Controller\CategorieC.php';
$categorieC = new CategorieC();
$listeCategories = $categorieC->afficherCategorie();

if (isset($_POST['titre'])) {
    $listeCategories = $categorieC->recherche(
        $_POST['titre'],
        $_POST['description']
    );
}

?>

  <!-- Header Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"> Category </h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page"> Categories</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/header.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
            <form method="POST" action="" id="contactform" class="form-group main-contact-form col-md-12 wow fadeIn" data-wow-delay="0.2s">
                                  
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" name="titre" class="form-control border-0 py-3" placeholder="keyword about title ">
                            </div>
                            <div class="col-md-4">
                                <input type="text"  name="description" class="form-control border-0 py-3" placeholder="keyword about description">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-dark border-0 w-100 py-3" value="Search"  ></input>
                      
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Search End -->


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"> Categories </h1>
                    <p>C'est la liste des différentes catégories d'évènements disponibles sur Evencia Agency. Amusez-vous à choisir le type d'évènement qui convient au plus à votre humeur et besoin.</p>
                </div>
                <div class="row g-4">
                <?php
			    foreach($listeCategories as $categorie){
			?>	

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="../event/afficherEventFront.php?id=<?php echo $categorie['id']?>">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="../front/img/gallery/5.jpg" alt="Icon">
                                </div>
                                <h6><?php echo $categorie['titre']; ?></h6>
                                <span><?php echo $categorie['description']; ?></span>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Category End -->
        

    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<?php 
include '../footerFront.php';
?>