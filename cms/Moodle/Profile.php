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

<h1><b>Click below to change your password</b></h1><br><hr>
<form method="POST">
<button type="submit" name="change" class="btn btn-primary btn-lg">Change Password</button><br><br>
</form>
<?php 
if(isset($_POST['change'])){
    header("Location:changepassword.php");
}
?>
                        
                    </div>

                </div>
               

<?php include "includes/footer.php";?>