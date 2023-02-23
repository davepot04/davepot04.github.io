<?php
if (isset($_POST['school_id_num'])) {
	$output = array('error' => false);

	$today = '';

	switch (date('N')) {
		case 1:
			$today = "Monday";
			break;
		case 2:
			$today = "Teusday";
			break;
		case 3:
			$today = "Wednesday";
			break;
		case 4:
			$today = "Thursday";
			break;
		case 5:
			$today = "Friday";
			break;
		case 6:
			$today = "Saturday";
			break;
		default:
			$today = "Sunday";
	}

	include 'conn.php';
	include 'timezone.php';

	$student_id = $_POST['school_id_num'];
	$subjectid = $_POST['subject_list'];
	$status = $_POST['log_type'];
	$lognow = date('H:i:s');

	

	$sql = "SELECT * FROM schedules WHERE id = '$subjectid'";
	$squery = $conn->query($sql);
	$srow = $squery->fetch_assoc();

	$sql = "SELECT * FROM students WHERE student_id = '$student_id'";
	$query = $conn->query($sql);

	if ($query->num_rows > 0) {
		$row = $query->fetch_assoc();

		$id = $row['id'];

		$date_now = date('Y-m-d');

		if ($status == 'in') {
			$sql = "SELECT * FROM attendance WHERE student_id = '$student_id' AND date = '$date_now' AND schedule_id = '$subjectid' AND time_in IS NOT NULL";
			$query = $conn->query($sql);
			if ($query->num_rows > 0) {
				$output['error'] = true;
				$output['message'] = 'You have timed in for today';
			} else {
				//updates
				if ($lognow > $srow['sched_start'] && $lognow <= $srow['sched_end'] && $today == $srow['subject_day']) {
					$logstatus = 1;
				} else if ($lognow < $srow['sched_start'] && $today == $srow['subject_day']) {
					$logstatus = 0;
				} else if ($today != $srow['subject_day']) {
					$logstatus = 2;
				} else {
					$logstatus = 3;
				}
				//
				if ($logstatus == 1 || $logstatus == 0) {
					$sql = "INSERT INTO attendance (student_id, date, time_in, status, schedule_id) VALUES ('$student_id', '$date_now', '$lognow', '$logstatus', '$subjectid')";
					if ($conn->query($sql)) {
						$output['message'] = 'Time in: ' . $row['firstname'] . ' ' . ($row['middlename'] ? ($row['middlename'] . " ") : '') . $row['lastname'];
					} else {
						$output['error'] = true;
						$output['message'] = $conn->error;
					}
				} else if($logstatus == 2) {
					$output['error'] = true;
					$output['message'] = "This Subject is not Today!";
				} else {
					$output['error'] = true;
					$output['message'] = "Subject already ended!";
				}
			}
		} else {
			$sql = "SELECT * FROM attendance a  WHERE a.student_id = '$student_id' AND date = '$date_now' AND a.schedule_id = '$subjectid'";
			$query = $conn->query($sql);

			if ($query->num_rows < 1) {
				$output['error'] = true;
				$output['message'] = 'Cannot Timeout. No time in.';
			} else {
				$rowout = $query->fetch_assoc();
				if ($rowout['time_out'] != '00:00:00' && $today == $srow['subject_day']) {
					$output['error'] = true;
					$output['message'] = 'You have timed out for today';
				} else if ($today == $srow['subject_day']){
					$sql = "UPDATE attendance SET time_out = '$lognow' WHERE id = ".$rowout['id']."";
					if ($conn->query($sql)) {
						$output['message'] = 'Time out: ' . $row['firstname'] . $row['firstname'] . ' ' . ($row['middlename'] ? ($row['middlename'] . " ") : '') . $row['lastname'];
					} else {
						$output['error'] = true;
						$output['message'] = $conn->error;
					}
				}
			}
		}
	} else {
		$output['error'] = true;
		$output['message'] = 'Enter Student ID # first!';
	}
}

echo json_encode($output);
