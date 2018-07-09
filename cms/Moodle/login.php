<?php 
include "includes/dbb.php";
session_start();
$message='';

if (isset($_SESSION['role'])) {
    header("Location: index.php");
}

if (isset($_GET['Message'])) {
  if (($_GET['Message'])=='sess_exp') {  
  $message="Sorry, the session has Expired!";
}
}


if (isset($_POST['login'])) {

    $username=$_POST['username'];
    $password=$_POST['password'];
    


    $username=mysqli_real_escape_string($connection_d, $username);
    $password=mysqli_real_escape_string($connection_d, $password);


    
    $query="SELECT * FROM users WHERE username='$username' AND password='$password'";

   /* if($role=='Student'){
     
      $query="SELECT * FROM students WHERE index_no='$username' AND password='$password'";
}

    if($role=='Lecturer'){
      $query="SELECT * FROM lectures WHERE Lecture_id='$username' AND password='$password'";
      
    }

    if($role=='Registrar'){
      $query="SELECT * FROM registrar WHERE registrar_id='$username' AND password='$password'";
      echo 'Registrar';
    }

    if($role=='Admin'){
      $query="SELECT * FROM admin WHERE   username='$username' AND password='$password'";
    }
*/

    $validate=mysqli_query($connection_d, $query);
      $count=mysqli_num_rows($validate);
     
      if ($count==0) {
        $message="username or the password is invalid!";
      }

      else{
        $message="logged in!";
        while($row=mysqli_fetch_assoc($validate)) {
          $role=$row['type'];
          
       }


      $_SESSION['username']=$username;
      $_SESSION['password']=$password;
      $_SESSION['role']=$role;

      $inactive = 7200;
      $_SESSION['expire'] = time() + $inactive;

     
    if($role=='Admin'){
        header("Location: admin/index.php");
    }

    else{
      header("Location: index.php");
    }

    
}
}
    


?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/login.css">


<meta charset="utf-8">
<style type="text/css">
  body{
    background: url("images/bg.jpg");
  }
  .white{
    color: white;
  }
</style>
</head>
<body>

  <div class="container" style="width: 70%; margin-top: 5%; color:white; position: center">
    <font face="verdana" size="10" color="#20e8d0"> Welcome to Moodle </font>
     <hr>
  </div>
 

<div class="container" style="width: 350px; margin-top: 5%; padding-top: 2%;background-color: rgba(32, 232, 208, .2); border-radius: 18px; border: 1px solid white">

                              
                              <div style="color: #3ae820; font-size: 16px "><?php echo $message ?></div>
                              <br/>
                               <form action="login.php" method="post" >

                                

                                <div class="form-group" style="width: 100%">
                                <label for="username" class="white" ><font  size=
                                  "4">Username</font></label>
                                 <input type='text' name='username' class='form-control title' value='' > </div>  

                                 <div class="form-group" style="width: 100%">
                                <label for="password" class="white" ><font  size=
                                  "4">Password</font></label>
                                 <input type='password' name='password' class='form-control title' value='' > </div>  

                               

                              <div class="form-group">
                              <input type="submit" name="login" value="  Login  "  class="button1">
                              </div>

                             
</form>
</div>


  
</div>
</body>
</html>
