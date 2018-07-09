<?php 
$conn=mysqli_connect('localhost','root','','vocational training institute');
$sql="SELECT * FROM student_assignments WHERE assignment_id='$assignId' && student_id='$myusername';";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
$assignmentArray=array();
while($row=mysqli_fetch_assoc($result)){
	$assignmentArray[]=$row;
}
foreach ($assignmentArray as $assignment) {
	$mark=$assignment['marks'];
}

$sql1="SELECT * FROM assignments WHERE assignment_id='$assignId';";
$result1=mysqli_query($conn,$sql1);
$assignments=array();
while($row1=mysqli_fetch_assoc($result1)){
	$assignments[]=$row1;
}
foreach ($assignments as $assignment) {
	$deadline=$assignment['deadline'];
}
if($resultCheck==0){
	echo "<table class=\"courses-table\"><tr><td>______________________</td><td>_____________________</td></tr>
	<tr><td \"table-header\"><b>Submission Status</b></td><td \"table-header\">\"Not attempted\"</td></tr>
	<tr><td>______________________</td><td>_____________________</td></tr>
	<tr><td \"table-header\"><b>\"Grading Status\"</b></td><td \"table-header\">\"Not graded\"</td></tr>
	<tr><td>______________________</td><td>_____________________</td></tr>
	<tr><td \"table-header\"><b>Due date</b></td><td>$deadline</td></tr>
	<tr><td>______________________</td><td>_____________________</td></tr></table><br>";
	echo "<form  action=\"includes/upload.inc.php?assignId=$assignId&courseId=$course_id\" method=\"POST\" enctype=\"multipart/form-data\">
	  <div class=\"container\">
      <input type=\"file\" name=\"file\">
      <div class=\"clearfix\"> <br>
      <button type=\"submit\" name=\"submit\" class=\"signupbtn btn btn success\">upload</button>
      </div>
      </div>
    </form>";
} 
else if($resultCheck>0){
	foreach ($assignmentArray as $assignment) {
    	if($assignment['graded_status']){
			$gradingStatus="graded";
		}else{
			$gradingStatus="Not graded";
		}
	}

	echo "
		   <table class= \"courses-table\">
		   <tr><td>______________________</td><td>_____________________</td>
	        <tr>
	          <td class=\"table-header\"><b>Submission Status </b></td>
	          <td class=\"table-header\">Submitted for grading</td>
	        </tr>
	        <tr><td>______________________</td><td>_____________________</td>
	        <tr>
	          <td class=\"table-header\"><b>Grading Status</b></td>
	          <td class=\"table-header\">$gradingStatus</td>
	        </tr>
	        <tr><td>______________________</td><td>_____________________</td>
	        <tr>
	          <td class=\"table-header\"><b>Due date</b></td>
	          <td class=\"table-header\">$deadline</td>
	          <br> 
	        </tr>
	        <tr><td>______________________</td><td>_____________________</td>
	      </table><br>";
	 if(!($assignment['graded_status'])){
	echo "<form  action=\"includes/upload.inc.php?assignId=$assignId&courseId=$course_id\" method=\"POST\" enctype=\"multipart/form-data\">
		<div class=\"container\">
	  <input type=\"file\" name=\"file\">
	  <div class=\"clearfix\"><br>
	  <button type=\"submit\" name=\"submit\" class=\"signupbtn btn btn-success\">Edit submission</button>
	  </div>
	  </div>
	</form>";
}else{
	echo "<table class= \"courses-table\">
		    <tr>
	          <td class=\"table-header\"><b>Grade</b> </td>
	          <td class=\"table-header\"><font color=\"red\"><b>$mark</font></b></td>
	        </tr>
	        <tr><td>______________________</td><td>_____________________</td></table>";
}

}




