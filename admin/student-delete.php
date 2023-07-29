<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role']) && isset($_GET['student_id'])){
  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";

     $id = $_GET['student_id'];
     if (removeStudent($id, $conn)){
     	$sm = "Sėkmingai ištrinta";
        header("Location: student.php?success=$sm");
        exit;
     } else {
        $em = "Dėl nežinomos klaidos nepavyko ištrinti";
        header("Location: student.php?error=$em");
        exit;
     }
  } else {
    header("Location: student.php");
    exit;
  } 
} else {
	header("Location: student.php");
	exit;
} 