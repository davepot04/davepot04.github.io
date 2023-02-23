<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, s.id AS sid FROM students s LEFT JOIN year_sections ys ON ys.id=s.year_section_id WHERE s.id = $id;";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>