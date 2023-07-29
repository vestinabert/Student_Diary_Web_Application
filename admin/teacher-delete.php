<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role']) && isset($_GET['teacher_id'])){
  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";

     $id = $_GET['teacher_id'];
     if (removeTeacher($id, $conn)){
     	$sm = "Sėkmingai ištrinta";
        header("Location: teacher.php?success=$sm");
        exit;
     } else {
        $em = "Dėl nežinomos klaidos nepavyko ištrinti";
        header("Location: teacher.php?error=$em");
        exit;
     }
  } else {
    header("Location: teacher.php");
    exit;
  } 
} else {
	header("Location: teacher.php");
	exit;
} 