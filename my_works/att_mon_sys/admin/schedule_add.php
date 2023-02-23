<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$subject = $_POST['subject'];
		$ysID = $_POST['year_section'];
		$sched_day = $_POST['sched_day'];
		$sched_start = $_POST['sched_start'];
		$sched_end = $_POST['sched_end'];
		$sched_start = date('H:i:s', strtotime($sched_start));
		$sched_end = date('H:i:s', strtotime($sched_end));

		$sql = "INSERT INTO schedules (year_section_id, subject, sched_start, sched_end, subject_day) VALUES ('$ysID', '$subject', '$sched_start', '$sched_end', '$sched_day')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: schedule.php');

?>