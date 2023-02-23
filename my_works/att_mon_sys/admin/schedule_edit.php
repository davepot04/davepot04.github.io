<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$subject = $_POST['subject_edit'];
		$ysID = $_POST['year_section_edit'];
		$sched_start = $_POST['sched_start_edit'];
		$sched_end = $_POST['sched_end_edit'];
		$sched_start = date('H:i:s', strtotime($sched_start));
		$sched_end = date('H:i:s', strtotime($sched_end));

		$sql = "UPDATE schedules SET year_section_id = '$ysID', subject = '$subject', sched_start = '$sched_start', sched_end = '$sched_end' WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:schedule.php');

?>