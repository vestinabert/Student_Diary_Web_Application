<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {
    	
if (isset($_POST['subj'])){
    include '../../DB_connection.php';

    $subject = $_POST['subj'];
    $subject_id = $_POST['subject_id'];

    $data = 'subject_id='.$subject_id;

    if (empty($subject)) {
      $em  = "Privalote įvesti dalyką";
      header("Location: ../subject-edit.php?error=$em&$data");
      exit;
    } else {
        $sql = "UPDATE subjects SET subject=? WHERE subject_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$subject, $subject_id]);
        $sm = "Sėkmingai atnaujintas dalyko pavadinimas";
        header("Location: ../subject-edit.php?success=$sm&$data");
        exit;
	} 
  } else {
  	$em = "Įvyko klaida";
    header("Location: ../subject.php?error=$em");
    exit;
  }
} else {
  header("Location: ../../logout.php");
  exit;
} 
} else {
header("Location: ../../logout.php");
exit;
} 