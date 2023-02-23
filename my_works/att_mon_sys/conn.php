<?php
	// $conn = new mysqli('localhost', 'root', '', 'att_monitor_sys');
	$conn = new mysqli('databases.000webhost.com', 'id20344400_root_username', 'WI2Rpv5a$qI/5}Nj', 'id20344400_attr_mon_sys');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>