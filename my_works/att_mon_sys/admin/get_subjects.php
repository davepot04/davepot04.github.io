<?php
	include 'includes/session.php';
    
    if (isset($_POST['studentid'])) {
        include './includes/conn.php';
        $studentid = $_POST['studentid'];
        $sql = "SELECT sched.id AS sched_id, sched.subject, sched.sched_start, sched.sched_end, sched.subject_day FROM students s LEFT JOIN schedules sched ON s.year_section_id = sched.year_section_id WHERE s.student_id = '$studentid' ORDER BY sched.subject;";
        $query = $conn->query($sql);
		$data = array();
        while ($row = $query->fetch_assoc()) {
            array_push($data, $row);
        }
        echo json_encode($data);
    }
?>