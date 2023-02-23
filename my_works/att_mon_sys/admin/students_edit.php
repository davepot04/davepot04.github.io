<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$sid = $_POST['sid'];
		$edit_school_id_num = $_POST['edit_school_id_num'];
		$edit_student_course = $_POST['edit_student_course'];
		$edit_year_section = $_POST['edit_year_section'];
		$edit_firstname = $_POST['edit_firstname'];
		$edit_middlename = $_POST['edit_middlename'] ;
		$edit_lastname = $_POST['edit_lastname'];
		$edit_gender = $_POST['edit_gender'];
		$edit_birthdate = $_POST['edit_birthdate'];
		$edit_address = $_POST['edit_address'];
		$edit_guardian_name = $_POST['edit_guardian_name'];
		$edit_guardian_contact = $_POST['edit_guardian_contact'];
		
		$sql = "UPDATE students SET student_id = '$edit_school_id_num', course = '$edit_student_course', year_section_id = '$edit_year_section', firstname = '$edit_firstname', middlename = '$edit_middlename', lastname = '$edit_lastname', gender = '$edit_gender', birthdate = '$edit_birthdate', address = '$edit_address', guardian_name = '$edit_guardian_name', guardian_contact_info = '$edit_guardian_contact' WHERE id = '$sid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student info updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select student to edit first';
	}

	header('location: students.php');
?>