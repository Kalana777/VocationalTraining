<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php $Home="active";?>
<?php include "includes/side_navbar.php";?><!--Home/Modules/profile/Results/Module_registration  -->


<!-- content here -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            
                            <center><div style="position: center; font-size: 50pt; font-family: verdana; color: #0caf94"  ><font color="black" size="8">Welcome to </font> Moodle</div></center>
                        </h1>
                        <h2><font face="arial" color="#90afaa">News Feed</font></h2>

                        <?php 
                        $role=$_SESSION['role'];
                        echo "You are logged in as $role";
                        ?>
                       
                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>