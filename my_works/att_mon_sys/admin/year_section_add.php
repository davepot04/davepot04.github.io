<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$yearSelect = $_POST['yearSelect'];
		$section = $_POST['sectionEnter'];

		$sql = "INSERT INTO year_sections (year, section) VALUES ('$yearSelect', UPPER('$section'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Year & Section added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: year_section.php');

?>