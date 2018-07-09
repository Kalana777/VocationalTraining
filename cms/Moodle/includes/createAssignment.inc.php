<?php 
session_start();
if(isset($_POST['create'])){
$conn=mysqli_connect('localhost','root','','vocational training institute');
$assignmentName=mysqli_real_escape_string($conn,$_POST['name']);
$number=mysqli_real_escape_string($conn,$_POST['attachment_no']);
$maxSize=mysqli_real_escape_string($conn,$_POST['attachment_size']);
$deadline=mysqli_real_escape_string($conn,$_POST['deadline']);
$lecturerId=$_SESSION['username'];
$courseId=$_SESSION['coid'];
$conn=mysqli_connect('localhost','root','','vocational training institute');
$sql="INSERT INTO assignments(course_id,lecturer_id, name, attachment_no, attachment_size, deadline) VALUES('$courseId','$lecturerId','$assignmentName',  '$number', '$maxSize','$deadline');";
mysqli_query($conn, $sql);
header("Location: ../courses_view.php?id=$courseId");
}