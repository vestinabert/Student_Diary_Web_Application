<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])){
  if ($_SESSION['role'] == 'Admin'){

if (isset($_POST['admin_pass']) && isset($_POST['new_pass']) && isset($_POST['c_new_pass']) &&
    isset($_POST['student_id'])) {
    include '../../DB_connection.php';
    $admin_pass = $_POST['admin_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];
    $student_id = $_POST['student_id'];
    $id = $_SESSION['admin_id'];
    
    $data = 'student_id='.$student_id.'#change_password';

    if (empty($admin_pass)) {
      $em  = "Privalote įvesti administratoriaus slaptažodį";
      header("Location: ../student-edit.php?perror=$em&$data");
      exit;
    } else if (empty($new_pass)) {
      $em  = "Privalote sukurti naują slaptažodį";
      header("Location: ../student-edit.php?perror=$em&$data");
      exit;
    } else if (empty($c_new_pass)) {
      $em  = "Privalote pakartoti naują slaptažodį";
      header("Location: ../student-edit.php?perror=$em&$data");
      exit;
     }else if ($new_pass !== $c_new_pass) {
          $em  = "Nesutampa naujas slaptažodis su pakartotinu";
          header("Location: ../student-edit.php?perror=$em&$data");
          exit;
      } else if (!adminPasswordVerify($admin_pass, $conn, $id)) {
          $em  = "Neteisingas administratoriaus slaptažodis";
          header("Location: ../student-edit.php?perror=$em&$data");
          exit;
      } else {
        $sql = "UPDATE students SET password = ? WHERE student_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_pass, $student_id]);
        $sm = "Sėkmingai atnaujintas slaptažodis";
        header("Location: ../student-edit.php?psuccess=$sm&$data");
        exit;
	}
  } else {
    $em = "Klaida įvyko";
    header("Location: ../student-edit.php?error=$em&$data");
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
