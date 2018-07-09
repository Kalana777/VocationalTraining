

<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php $profile="active";?>
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
 <script>
  function myfun(){
    var psw1=document.getElementById("psw1").value;
    var psw2=document.getElementById("psw2").value;
    
   
    }
    if((psw1.length<4)||(psw1.length>10)){
      document.getElementById("password1").innerHTML="**Password length should be 4 to 10";
      return false;
    }
    if(psw1!=psw2){
      document.getElementById("password2").innerHTML="**Password do not match";
      return false;
    }
  }
</script>
<?php
$uname=$_SESSION['username'];
echo "<h2>Hi! $uname</h2>";
?>
<h1><b>Change your password</b></h1><br><hr>

              <div class="well">
               <form style="border:1px solid #ccc" method="POST" onsubmit="return myfun()">
                
               
                <div class="input-group container">
                     <b>Current Password: </b> <br>
                        <input type="password" name="cu_psw"  class="form-control" required style="width: 500px"><br>
             <br>
                        <b>New Password: </b><br>
                        <input type="password" name="psw1" id="psw1" class="form-control" style="width: 500px" required> <br>
                        <span id="password1" style="color:red"></span> <br>

                        <b>Re-enter the new password </b><br>
                        <input type="password" name="psw2"  id="psw2" class="form-control" style="width: 500px" required> <br>
                        <span id="password2" style="color:red"></span> <br>

                        
                        <button type="submit" name="change_psw" class="signupbtn btn btn-primary">Change password</button></br>
             
            </div>
                
              </form></div>

<?php

$username=$_SESSION['username'];
$cu_psw="";
$psw1="";
$psw2="";
$psw="";

$db = mysqli_connect('localhost', 'root', '', 'vocational training institute');
if (isset($_POST['change_psw'])) {

    $cu_psw = mysqli_real_escape_string($db, $_POST['cu_psw']);
    $psw1 = mysqli_real_escape_string($db, $_POST['psw1']);
    $psw2 = mysqli_real_escape_string($db, $_POST['psw2']);


    $query="SELECT * FROM users WHERE username='$username' AND password='$cu_psw';";
    $result=mysqli_query($db,$query);
    if(mysqli_num_rows($result)==1){
	   
		    if ($psw1==$psw2){
		    	$psw=md5($psw1);
		        $query="UPDATE users SET password='$psw' WHERE username='$username';";
		        mysqli_query($db, $query);
		        
		        header("location: index.php?SuccessfullyChanged");
		    }else{
		       
		        echo "<div class='col-lg-12' style='background-color: rgba(36, 204, 187, .3); padding-top: 2%;border-radius: 10px; width: 500px'><b>Sorry, passwords doesn't match!!!</div><br><br>";
			}
		
	}else{
  	echo "<div class='col-lg-12' style='background-color: rgba(36, 204, 187, .3); padding-top: 2%;border-radius: 10px; width: 500px'><b>Sorry, Your current password is wrong!!!</div><br><br>";
	}

} ?>


                        
                    </div>

                </div>
               

<?php include "includes/footer.php";?>