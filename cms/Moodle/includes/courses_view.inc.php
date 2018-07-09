<?php
$myusername = $_SESSION['username'];
$usertype = $_SESSION['role'];

$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','vocational training institute');
$sql="SELECT * FROM course_material WHERE course_id='$id';";
$result=mysqli_query($conn,$sql);
$courseMaterialArray=array();
while($row=mysqli_fetch_assoc($result)){
	$courseMaterialArray[]=$row;
}
	
	

	echo "<ul class=\"list1\">";
	echo "<h1><b>Course materials		:</b></h1><hr>";
	foreach ($courseMaterialArray as $courseMaterial) {
		$materialName=$courseMaterial['material_name'];
		$materialPath=$courseMaterial['material_path'];
		echo "<h2><li> <a href=\"uploadsCourseMaterial/$materialPath\">$materialName</a></li>";

	}


$sql="SELECT * FROM assignments WHERE course_id='$id';";
$result=mysqli_query($conn,$sql);

$assignmentArray=array();
while($row=mysqli_fetch_assoc($result)){
	$assignmentArray[]=$row;
}

echo "<hr><h1><b>Assignments	:</b></h1><hr>";
	
echo "</ul>";
echo "<ul class=\"list1\">";
	foreach ($assignmentArray as $assignment) {
		$assignment_name=$assignment['name'];
		$assignId=$assignment['assignment_id'];
		echo "<h2><li><a href=\"assignment_view.php?assignId=$assignId&courseId=$id\">$assignment_name</a></li>";
	}	

	if($usertype === "lecturer" ){ 
			echo "<hr><h1><b>Edit	:</b></h1><hr>";

		echo "<h2><li><a href=\"CreateItems.php?courseId=$id\">Edit the course materials</a></li>";
	}
	echo "</ul>";



?>