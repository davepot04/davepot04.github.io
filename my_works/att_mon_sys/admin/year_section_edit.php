<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$yearSelect = $_POST['yearSelect_edit'];
		$section = $_POST['sectionEnter_edit'];

		$sql = "UPDATE year_sections SET year = '$yearSelect', section = UPPER('$section') WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Year & Section updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:year_section.php');

?>