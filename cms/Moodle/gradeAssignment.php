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
                include('includes/connectdb.inc.php');
                
                echo "<form style=\"border:1px solid #ccc\" method=\"POST\" action=\"includes/gradeAssignment.inc.php?assignId=$assignId&stuId=$student_id&courseId=$courseId\">
                  <div class=\"container\">
                    <h1 class=\"pad_bot1\"><b>Grade Assignment</b></h1>
                  <br>
                  <ul class=\"list1\">
                  <li><a href=\"uploads/$materialPath\"><h2>$student_id</h2></a></li><br><br>
                  </ul>
                 <b> Marks:</b> 

                 <select name=\"marks\">
                    <option value=\"\">Select...</option>
                    <option value=\"1\">1</option>
                    <option value=\"2\">2</option>
                    <option value=\"3\">3</option>
                    <option value=\"4\">4</option>
                    <option value=\"5\">5</option>
                    <option value=\"6\">6</option>
                    <option value=\"7\">7</option>
                    <option value=\"8\">8</option>
                    <option value=\"9\">9</option>
                    <option value=\"10\">10</option>
                  </select><br>

                 <div class=\"clearfix\"><br>
                  <button type=\"submit\" name=\"grade\" class=\"signupbtn\"><b><h4>Grade</button>
                </div>
                </div>
                </form>";

             
              ?>

                        
                    </div>

                </div>
               

<?php include "includes/footer.php";?>