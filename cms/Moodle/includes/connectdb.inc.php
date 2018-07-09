<?php
$myusername = $_SESSION['username'];
$usertype = $_SESSION['role'];
$assignId=$_GET['assignId'];
$student_id=$_GET['stuId'];
$courseId=$_GET['courseId'];
$conn=mysqli_connect('localhost','root','','vocational training institute');
$sql="SELECT * FROM student_assignments WHERE assignment_id='$assignId' && student_id='$student_id';";
$result=mysqli_query($conn,$sql);
$assignmentArray=array();
while($row=mysqli_fetch_assoc($result)){
	$assignmentArray[]=$row;
}
foreach ($assignmentArray as $assignment) {
	$materialPath=$assignment['assignment_path'];
}
