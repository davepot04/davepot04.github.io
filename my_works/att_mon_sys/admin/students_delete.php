<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$del_sid = $_POST['del_sid'];
		$sql = "DELETE FROM students WHERE id = '$del_sid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select a student to delete first';
	}

	header('location: students.php');
	
?>