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
    <h2><b>Submission View</b></h2><hr>
 <?php
                $myusername = $_SESSION['username'];
                $userType = $_SESSION['role'];
                $assignId=$_GET['assignId'];
                $course_id=$_GET['courseId'];
                if($userType=='student'){
                  include('includes/assignment_view.inc.php');
                
                }
              else if($userType=='lecturer'){
                include('includes/assignmentList.inc.php');
                
              } 
            ?>

                        
                    </div>

                </div>
               

<?php include "includes/footer.php";?>