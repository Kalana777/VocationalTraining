<?php
$conn=mysqli_connect('localhost','root','','vocational training institute');
$sql="SELECT * FROM student_assignments WHERE assignment_id='$assignId';";
$result=mysqli_query($conn,$sql);
$assignments=array();
while($row=mysqli_fetch_assoc($result)){
	$assignments[]=$row;
}

echo " <br><ul class=\"list1\">";
	foreach ($assignments as $assignment) {
		$student_id=$assignment['student_id'];
		$gradedStatus=$assignment['graded_status'];
		$marks=$assignment['marks'];
		echo "<hr><b><h2>Not graded:<hr>";
		if($gradedStatus==0){
			echo "<h2><b><li><a href=\"gradeAssignment.php?stuId=$student_id&assignId=$assignId&courseId=$course_id\">$student_id</a></li><br>";
		}echo "<hr><h2>Graded<hr>";
		if($gradedStatus==1){
			echo "<h4><b><li>$student_id-------$marks</li><br>";
		}

	}
echo "</ul></div>";