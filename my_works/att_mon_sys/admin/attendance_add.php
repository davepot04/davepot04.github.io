<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$student_id = $_POST['student_id'];
		$sched_id = $_POST['subject_list'];
		$date = $_POST['date'];

		$sql = "SELECT s.student_id, sched.id as schedid FROM students s LEFT JOIN  schedules sched ON s.year_section_id=sched.year_section_id WHERE student_id = '$student_id' AND sched.id='$sched_id'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Student not found';
		}
		else{
			$row = $query->fetch_assoc();
			$stid = $row['student_id'];

			$sql = "SELECT * FROM attendance WHERE student_id = '$stid' AND date = '$date'";
			$query = $conn->query($sql);

			if($query->num_rows > 0){
				$_SESSION['error'] = 'Student attendance for the day exist';
			}else{
				//updates
				$sched = $row['schedid'];
				$sql = "SELECT * FROM schedules WHERE id = '$sched'";
				$squery = $conn->query($sql);
				$scherow = $squery->fetch_assoc();
				$time_in = $scherow['sched_start'];
				$time_out = $scherow['sched_end'];
				$logstatus = 5;
				//5 is equals to added attendance only
				//
				$sql = "INSERT INTO attendance (student_id, date, time_in, time_out, schedule_id, status) VALUES ('$stid', '$date', '$time_in', '$time_out', '$sched_id', '$logstatus')";
				if($conn->query($sql)){
					$_SESSION['success'] = 'Attendance added successfully';
				}
				else{
					$_SESSION['error'] = $conn->error;
				}
			}
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	
	header('location: attendance.php');
