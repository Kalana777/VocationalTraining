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
                $course_id=$_GET['courseId'];
                echo "<div class=\"input-group container\"><h2><b>Add Course Material : $course_id</b></h2><hr>";
                if(isset($_SESSION['alert'])){
                echo $_SESSION['alert'];}
                echo " <br> <form  method=\"POST\" action=\"includes/uploadCourseMaterial.inc.php?courseId=$course_id\" enctype=\"multipart/form-data\"><br>
                  <input type=\"file\" name=\"file\" class=\"btn btn-primary\"><br>
                  <div class=\"clearfix\">
                  <button type=\"submit\" name=\"submit\" class=\"signupbtn btn btn-primary\">upload</button><br><br>
                  </div>
                  <button type=\"submit\" name=\"back\" class=\"signupbtn btn btn-success\">Back to my modules</button></div>
                </form>";
            
                ?>


                        
                    </div>

                </div>
               

<?php include "includes/footer.php";?>