<?php
//database settings
include "connectdb.php";

$query="select * from leave_table";
//$data = array();
$rs=$dbhandle->query($query);

while ($row = $rs->fetch_array()) {
  $data[] = $row;
}

	//print_r($data);
    
    print json_encode($data);
?>


