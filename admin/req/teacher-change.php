<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
    	
if (isset($_POST['admin_pass']) && isset($_POST['new_pass']) && isset($_POST['c_new_pass']) && isset($_POST['teacher_id'])){
    include '../../DB_connection.php';

    $admin_pass = $_POST['admin_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];
    $teacher_id = $_POST['teacher_id'];
    $id = $_SESSION['admin_id'];
    
    $data = 'teacher_id='.$teacher_id.'#change_password';

  if (empty($admin_pass)) {
		$em  = "Privalote įvesti administratoriaus slaptažodį";
		header("Location: ../teacher-edit.php?perror=$em&$data");
		exit;
	} else if (empty($new_pass)) {
		$em  = "Privalote sukurti naują slaptažodį";
		header("Location: ../teacher-edit.php?perror=$em&$data");
		exit;
	} else if (empty($c_new_pass)) {
		$em  = "Privalote pakartoti naują slaptažodį";
		header("Location: ../teacher-edit.php?perror=$em&$data");
		exit;
	} else if ($new_pass !== $c_new_pass) {
        $em  = "Nesutampa naujas slaptažodis su pakartotiniu";
        header("Location: ../teacher-edit.php?perror=$em&$data");
        exit;
    } else if (!adminPasswordVerify($admin_pass, $conn, $id)) {
        $em  = "Neteisingas administratoriaus slaptažodis";
        header("Location: ../teacher-edit.php?perror=$em&$data");
        exit;
    } else {
        $sql = "UPDATE teachers SET password = ? WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_pass, $teacher_id]);
        $sm = "Sėkmingai pakeistas slaptažodis";
        header("Location: ../teacher-edit.php?psuccess=$sm&$data");
        exit;
	} 
  } else {
  	$em = "Įvyko klaida";
    header("Location: ../teacher-edit.php?error=$em&$data");
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
