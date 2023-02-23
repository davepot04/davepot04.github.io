<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$update_sid = $_POST['update_sid'];
		$filename = $_FILES['update_photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['update_photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE students SET photo = '$filename' WHERE id = '$update_sid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student\'s photo updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select student to update photo first';
	}

	header('location: students.php');
?>