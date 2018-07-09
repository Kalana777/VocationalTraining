<?php
if(isset($_POST['submit'])){
	session_start();
	$assignId=$_GET['assignId'];
	$student_id=$_SESSION['username'];
	$course_id=$_GET['courseId'];

	$myusername=$_SESSION['username'];
	$conn=mysqli_connect('localhost','root','','vocational training institute');
	$sql="SELECT * FROM student_assignments WHERE assignment_id='$assignId' && student_id='$myusername';";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);

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

	
	
	if($fileError===0){
		if($fileSize<=30000000){
			$fileNameNew=uniqid('',true).".".$fileActualExt;
			$fileDestination='../uploads/'.$fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);
			if($resultCheck==0){
				$sql1="INSERT INTO student_assignments(student_id, course_id, assignment_id, assignment_name, assignment_path) VALUES('$student_id','$course_id','$assignId','$fileName','$fileNameNew');";
				mysqli_query($conn,$sql1);
			}else if($resultCheck >0){
				$sql2="UPDATE student_assignments SET assignment_name='$fileName', assignment_path='$fileNameNew' where assignment_id='$assignId' && student_id='$student_id';";
				mysqli_query($conn,$sql2);
			}
			header("Location: ../courses_view.php?id=$course_id");
		}else{
			header("Location: ../courses_view.php?id=$course_id");
		}

	}else{
		header("Location: ../courses_view.php?id=$course_id");
	}
}