
<?php
include '../headerFront.php';

include '..\..\Controller\EventC.php';
$eventC = new EventC(); //obtention de f°
$listeEvents = $eventC->afficherEventParCategorie($_GET['id']);

if (isset($_POST['nom'])) {
    $listeEvents = $eventC->rechercheEvent(
        $_POST['nom'],
        $_POST['lieu'],
        $_POST['date'],
        $_POST['description']
    );
}
?>

 <!-- Header Start -->
 <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"> Event List</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page"> Event List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="../../Front/img/header.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
            <form action=""  method="POST">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" name="nom" class="form-control border-0 py-3" placeholder="Keyword about the name">
                                <br>
                                <input type="text" name="lieu" class="form-control border-0 py-3" placeholder="Keyword about the place">
                            </div>
                           
                            <div class="col-md-4">
                                <input type="text" name="date" class="form-control border-0 py-3" placeholder="Keyword about the date">
                          <br>
                                <input type="text" name="description" class="form-control border-0 py-3" placeholder="Keyword about the description">
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-md-2">
                    <input type="submit" href="afficherEventFront.php" name="recherche" class="btn btn-dark border-0 w-100 py-3" value="Search"/>
   
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Search End -->
                          
    <!--==========================
      Hotels Section
    ============================-->
    <section id="hotels" class="section-with-bg wow fadeInUp">

<div class="container">
  <div class="section-header">
    <h2>Events</h2>
    <p>Her are some nearby hotels</p>
  </div>
  <div class="row">
    

  <?php foreach ($listeEvents as $event) { ?>	
    <div class="col-lg-4 col-md-6">
      <div class="hotel">
        <div class="hotel-img">
          <img src="images/<?php echo $event[
                                            'image'
                                        ]; ?>" alt="Hotel 1" class="img-fluid">
        </div>
        <h3><a href="#"><?php echo $event[
                                            'nom'
                                        ]; ?></a></h3>
        <div class="stars">
        <a href="afficherEventFavories.php?event_id=<?php echo $event['id']; ?>&user_id=1&CategorieId=<?php echo $event['categorieId']; ?>" class="heart d-flex justify-content-center align-items-center " name="favs">
                                               <i class="fa fa-heart"></i></a>
          
        </div>
        <p><?php echo $event[
                                            'description'
                                        ]; ?></p>
      </div>
    </div>
  
    <?php } ?>
    
  </div>
</div>

</section>

            
            
            </div>
        </div>
        <!-- Property List End -->

  </div>

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

<?php include '../footerFront.php';
?>
