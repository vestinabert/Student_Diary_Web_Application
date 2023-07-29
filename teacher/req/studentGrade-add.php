<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Teacher'){

if (isset($_POST['grading'])){ 
    include '../../DB_connection.php';

    $grading = $_POST['grading'];
    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    
    $data = 'grading='.$grading;

    if (empty($grading)) {
      $em  = "Neįvedėte pažymį";
      header("Location: ../students.php?error=$em&$data");
      exit;
    } else {
        $sql  = "INSERT INTO gradings (grading, student_id, subject_id) VALUES(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$grading, $student_id, $subject_id]);
        $sm = "Sėkmingai pridėtas naujas pažymys. Patikrinkite pažymių skiltyje";
        header("Location: ../students.php?success=$sm");
        exit;
	}  
  } else {
      $em = "Įvyko klaida";
      header("Location: ../students.php?error=$em");
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
