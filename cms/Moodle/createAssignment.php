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
                           
                        </h1>



<!-- ---------------------------content here ---------------------------------->
  <?php 
                  $cid=$_GET['courseId'];
                  echo "<h1><b>Create Assignment :$cid</h1></b>";
                  $_SESSION['coid']=$cid;
                  ?>
   <script>
  function myfun(){
    var name=document.getElementById("fname").value;
    var num=document.getElementById("num").value;
    var max=document.getElementById("max").value;
    if((name.length<=2)||(name.length>20)){
                document.getElementById("pname").innerHTML="**Assignment name should be 3-20";
                return false;
    }
    if(isNaN(num)){
                document.getElementById("attnum").innerHTML="**Enter only numeric values";
                return false;
    }
    if(num>3){
                document.getElementById("attnum").innerHTML="**Attachments can be 1 to 3";
                return false;
    }
    if(num<0){
                document.getElementById("attnum").innerHTML="**Enter a positive number";
                return false;
    }if(isNaN(max)){
                document.getElementById("mmax").innerHTML="**Enter only numeric values";
                return false;
    }
    if(max<100){
                document.getElementById("mmax").innerHTML="**Minimum size is 100";
                return false;
    }

  }
</script>                
              
 
           


              <div class="well">
               <form style="border:1px solid #ccc" method="POST" action="includes/createAssignment.inc.php" onsubmit="return myfun()">
                
               
                <div class="input-group container">
                     <b>Assignment Name: </b> <br>
                        <input type="text" name="name" id="fname" class="form-control" required style="width: 500px"><br>
                        <span id="pname" style="color:red"></span> <br>
                        <b>No of Attachments: </b><br>
                        <input type="number" name="attachment_no" id="num" class="form-control" min="0" max="5" style="width: 500px" required> <br>
                        <span id="attnum" style="color:red"></span> <br>
                        <b>Max size of Attachment: </b><br>
                        <input type="number" name="attachment_size" class="form-control" style="width: 500px" min="100" max="1000" placeholder="Enter size in bytes" id="max" required > <br>
                        <span id="mmax" style="color:red"></span> <br>

                        <b>Deadline:</b> <br>
                        <input type="date" name="deadline" class="form-control" style="width: 500px" required > <br>
                       </br>
                        <button type="submit" name="create" class="signupbtn btn btn-primary">Create</button></br>
             
            </div>
                
              </form>;</div>


                        
                    </div>

                </div>
            </div>
        </div>

               

<?php include "includes/footer.php";?>