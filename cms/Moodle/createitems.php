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
                  $cid=$_GET['courseId'];
                  echo "<h1><b>Edit the module : $cid <b></h1><hr>";
                  unset($_SESSION['alert']);
                  ?>
 <ul class="list1">
                      <?php 
                      $courseId=$_GET['courseId'];
                       echo "<h2><li><a href=\"createAssignment.php?courseId=$courseId\">*Add Assignment</a></li>";
                      echo "<h2><li><a href=\"addCourseMaterial.php?courseId=$courseId\">*Add course material</a></li>";?>
                    
                      <li><a href="#"><h2>*Create Forum</a></li>
                      <li><a href="#"><h2>*Create Quiz</a></li>
                      <li><a href="#"><h2>*Create Feedback</a></li>

                    </ul>
               

<?php include "includes/footer.php";?>