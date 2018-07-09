<?php
session_start();
if(isset($_POST['submit'])){
	$file=$_FILES['file'];
	$fileName=$_FILES['file']['name'];
	$fileTmpName=$_FILES['file']['tmp_name'];
	$fileSize=$_FILES['file']['size'];
	$fileError=$_FILES['file']['error'];
	$fileType=$_FILES['file']['type'];
	$fileExtension=explode('.',$fileName);
	$fileActualExt=strtolower(end($fileExtension));
	$file=file_get_contents($fileTmpName);
	$file=base64_encode($file);

	$lecturer_id=$_SESSION['username'];
	$course_id=$_GET['courseId'];
	
	if($fileError===0){
		if($fileSize<=9000000000000000000000000000000000000000000000000000000000000000000000000000){
			$fileNameNew=uniqid('',true).".".$fileActualExt;
			$fileDestination='../uploadsCourseMaterial/'.$fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);
			$conn=mysqli_connect('localhost','root','','vocational training institute');
			$sql1="INSERT INTO course_material(course_id,  lecturer_id, material_path, material_name) VALUES('$course_id','$lecturer_id','$fileNameNew','$fileName')";
			$result=mysqli_query($conn,$sql1);

			header("Location: ../courses_view.php?id=$course_id");
		}else{
			header("Location: ../courses_view.php?id=$course_id");

			//header("Location: ../courses_view.php?id=$course_id");
		}

	}
}