<?php
include '../headerBack.php';

include '..\..\Controller\UserC.php';
$userC = new UserC(); //obtention de f°
$listeUsers = $userC->afficherUser();

if (isset($_POST['titre'])) {
    $listeUsers = $userC->rechercheUser(
        $_POST['id'],
        $_POST['nom'],
        $_POST['prenom']
    );
}
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
          
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables des Utilisateurs </h1>
                    <p class="mb-4"></p>
                    <a href="afficherUsertri.php"> Trier la liste  </a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">  Users:</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th> Nom</th>
                                            <th> Prénom </th>
                                            <th> Role </th>
                                            <th> email </th>
                                            <th> Téléphone </th>
                                            <th> Mdp </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>id</th>
                                            <th> Nom</th>
                                            <th> Prénom </th>
                                            <th> Role </th>
                                            <th> email </th>
                                            <th> Téléphone </th>
                                            <th> Mdp </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach (
                                        $listeUsers
                                        as $user
                                    ) { ?>	
                                        <tr>
                                        <td><?php echo $user[
                                                'id'
                                            ]; ?></td>
                                            <td><?php echo $user[
                                                'nom'
                                            ]; ?></td>
                                            <td><?php echo $user[
                                                'prenom'
                                            ]; ?></td>
                                               <td><?php echo $user[
                                                'role'
                                            ]; ?></td> 
                                            <td><?php echo $user[
                                                'email'
                                            ]; ?></td>
                                            <td><?php echo $user[
                                                'tel'
                                            ]; ?></td>
                                            <td><?php echo $user[
                                                'password'
                                            ]; ?></td>
                                            
                                        
                                            <td>     
                                                      
                                            <form method="POST" action="modifierUserBack.php">
						<input type="submit" name="Modifier" value="Modifier" class="btn btn-primary btn-block text-uppercase sm-1">
						<input type="hidden" value=<?php echo $user['id']; ?> name="id">
					</form>
                </td>

                <td>
				<a href="supprimerUserBack.php?id=<?php echo $user[
        'id'
    ]; ?>"  > Supprimer
			</a>
			
                    
                    </td>
                                        </tr>
                                        <?php } ?>
                                      
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>