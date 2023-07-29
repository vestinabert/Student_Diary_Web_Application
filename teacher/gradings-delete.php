<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role']) && isset($_GET['grading_id'])){
  if ($_SESSION['role'] == 'Teacher') {
     include "../DB_connection.php";

     $id = $_GET['grading_id'];
     if (removeGrading($id, $conn)){
     	$sm = "Sėkmingai ištrinta";
        header("Location: gradings.php?success=$sm");
        exit;
     } else {
        $em = "Dėl nežinomos klaidos nepavyko ištrinti";
        header("Location: gradings.php?error=$em");
        exit;
     }
  } else {
    header("Location: gradings.php");
    exit;
  } 
} else {
	header("Location: gradings.php");
	exit;
} 