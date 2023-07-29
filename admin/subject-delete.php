<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role']) && isset($_GET['subject_id'])){
  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";

     $id = $_GET['subject_id'];
     if (removeSubject($id, $conn)){
     	$sm = "Sėkmingai ištrinta";
        header("Location: subject.php?success=$sm");
        exit;
     } else {
        $em = "Dėl nežinomos klaidos nepavyko ištrinti";
        header("Location: subject.php?error=$em");
        exit;
     }
  } else {
    header("Location: subject.php");
    exit;
  } 
} else {
	header("Location: subject.php");
	exit;
} 