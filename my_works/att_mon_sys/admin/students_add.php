<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$student_id_number = $_POST['student_id_number'];
		$student_course = $_POST['student_course'];
		$year_section = $_POST['year_section'];
		$student_firstname = $_POST['student_firstname'];
		$student_middlename = $_POST['student_middlename'];
		$student_lastname = $_POST['student_lastname'];
		$student_address = $_POST['student_address'];
		$student_birthdate = $_POST['student_birthdate'];
		$student_contact = $_POST['student_contact'];
		$student_gender = $_POST['student_gender'];
		$student_guardian_name = $_POST['student_guardian_name'];
		$student_guardian_contact_info = $_POST['student_guardian_contact_info'];
		$filename = $_FILES['student_photo']['name'];
		$lognow = date('Y-m-d');
		if(!empty($filename)){
			move_uploaded_file($_FILES['student_photo']['tmp_name'], '../images/'.$filename);	
		}
		$sql = "INSERT INTO students (student_id, course, year_section_id, firstname, middlename, lastname, address, birthdate, contact_info, gender, photo, created_on, guardian_name, guardian_contact_info) VALUES ('$student_id_number', '$student_course', '$year_section', '$student_firstname', '$student_middlename', '$student_lastname', '$student_address', '$student_birthdate', '$student_contact', '$student_gender', '$filename', '$lognow', '$student_guardian_name', '$student_guardian_contact_info')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: students.php');
?>