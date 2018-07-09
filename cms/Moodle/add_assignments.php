<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>

<?php $Assignment="active"; ?>

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




<?php  unset($_SESSION['alert1']);     ?>
<?php
                    
                            $db = mysqli_connect('localhost', 'root', '', 'vocational training institute');

                              $user=$_SESSION['username'];
                              $userType = $_SESSION['role'];
                             echo "<h1><b>My modules</b></h1><br><hr><br>";
                              if($userType=='lecturer'){
                                $sql1="SELECT * from courses where lecturerID='$user'";
                                $result1=mysqli_query($db,$sql1);
                                  while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                                    $course_id=$row1['courseID'];
                                    $course_name=$row1['course_name'];
                                    echo "<h2><li><a href=\"createAssignment.php?courseId=$course_id\">$course_id * $course_name</a></li>";
                                   } 
                                echo '</ul>';
                                echo "<br><br><br>";
                              }
                             
                                
                                  echo '</ul>';
                               ?>



                        
                    </div>

                </div>
               

<?php include "includes/footer.php";?>