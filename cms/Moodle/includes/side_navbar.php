 <div class="collapse navbar-collapse navbar-ex1-collapse" ">
                <ul class="nav navbar-nav side-nav" >
                   <?php  
                  echo "<li class='{$Home}'>"?>
                        <a href="index.php" style='color: #42fff8'><i class="fa fa-home"></i> Home</a>
                    </li>
                    
                     <?php  
                    if($_SESSION['role']=="lecturer"){
                   echo "<li class='{$Assignment}'>
                    <a href='add_assignments.php' style='color: #42fff8'><i class='fa fa-pencil'></i> Add Assignments</a>
                    </li>" ;
                  }?>

                   
                    
                   
                   <?php  
                   echo "<li class='{$My_Modules}'>"?>
                        <a href="My_Modules.php" style='color: #42fff8'><i class="fa fa-fw fa-wrench"></i> My Modules</a>
                    </li>

                     <?php  
                    if($_SESSION['role']=="lecturer"){
                   echo "<li class='{$Upload_results}'>
                    <a href='upload_results.php' style='color: #42fff8'><i class='fa fa-keyboard-o'></i> Upload Results</a>
                    </li>" ;
                  }?>


                     <?php  
                     if($_SESSION['role']=="student"){
                   echo "<li class='{$My_results}'>
                        <a href='My_results.php' style='color: #42fff8'><i class='fa fa-fw fa-trophy'></i> My results</a>
                    </li>";
                  } ?>

<?php
                    if($_SESSION['role']=="student"){

                    echo "<li class='{$Module_registration}'>
                        <a href='Module_registration.php' style='color: #42fff8'><i class='fa fa-fw fa-wrench'></i> Module registration</a>
                    </li>";
                  } ?>
                   
                    <?php                 
                
                   echo "<li class='{$profile}'>"?>
                        <a href="Profile.php" style='color: #42fff8'><i class="fa fa-user"></i> Profile</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
