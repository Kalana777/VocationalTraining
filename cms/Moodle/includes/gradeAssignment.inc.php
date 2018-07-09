<?php
$assignId=$_GET['assignId'];
$student_id=$_GET['stuId'];
$courseId=$_GET['courseId'];
if(isset($_POST['grade'])){
	$marks=$_POST['marks'];

	$conn=mysqli_connect('localhost','root','','vocational training institute');
	$sql="UPDATE student_assignments SET  marks='$marks', graded_status=1 where student_id='$student_id'&& assignment_id='$assignId';";
	mysqli_query($conn, $sql);
	$result=mysqli_query($conn,$sql);
	header("Location: ../assignment_view.php?assignId=$assignId&courseId=$courseId");
}