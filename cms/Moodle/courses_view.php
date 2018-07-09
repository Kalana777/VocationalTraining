<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php $My_Modules="active";?>
<?php include "includes/side_navbar.php";?>
<!-- content here -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    

                    <div class="col-lg-12">
                        <h1 class="page-header">                            
                           <!--header-->
                        </h1>



<!-- ---------------------------content here ---------------------------------->
<?php 
                  $id=$_GET['id'];
                  
                  $uname=$_SESSION['username'];

                  include('includes/courses_view.inc.php');                   
                ?>



                        
                    </div>

                </div>
               

<?php include "includes/footer.php";?>