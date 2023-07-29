<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {  	

if (isset($_POST['subj'])){
    include '../../DB_connection.php';

    $subj = $_POST['subj'];

    $data = 'subj='.$subj;

    if (empty($subj)) {
      $em  = "Privalote įvesti dalyką";
      header("Location: ../subject-add.php?error=$em&$data");
      exit;
    } else {
        $sql  = "INSERT INTO subjects(subject) VALUES(?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$subj]);
        $sm = "Sėkmingai pridėtas naujas dalykas";
        header("Location: ../subject-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Įvyko klaida";
    header("Location: ../subject-add.php?error=$em");
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
