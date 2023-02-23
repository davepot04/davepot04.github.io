<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, students.student_id AS stdntid, attendance.id AS attid FROM attendance LEFT JOIN students ON students.student_id=attendance.student_id LEFT JOIN schedules ON schedules.id = attendance.schedule_id LEFT JOIN year_sections ys ON students.year_section_id=ys.id WHERE attendance.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>