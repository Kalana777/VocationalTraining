<?php
include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));

$btnName=$dbhandle->real_escape_string($data->btnName);
if($btnName=='Insert'){

$id=$dbhandle->real_escape_string($data->userid);
$name=$dbhandle->real_escape_string($data->approval);

$query="INSERT INTO leave_table VALUES($id,'".$name."')";

$dbhandle->query($query);
	}

	else {

		$id=$dbhandle->real_escape_string($data->userid);
       $name=$dbhandle->real_escape_string($data->approval);
       	$query="UPDATE leave_table SET approval='".$name."'  WHERE uname=$id ";
       	$dbhandle->query($query);



	}

?>