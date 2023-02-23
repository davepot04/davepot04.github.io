<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT s.id, s.subject_day, s.subject, s.sched_start, s.sched_end, ys.year, ys.section, ys.id AS ysid FROM `schedules` s LEFT JOIN `year_sections` ys ON s.year_section_id = ys.id WHERE s.id = $id;";
        $query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
