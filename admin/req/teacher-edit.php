<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {
    	
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['t_mail']) &&
    isset($_POST['teacher_id']) && isset($_POST['subjects']) && isset($_POST['grade'])){
    include '../../DB_connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $teacher_id = $_POST['teacher_id'];
    $t_mail = $_POST['t_mail'];
    $grade = $_POST['grade'];
  
    $subjects = "";
    foreach ($_POST['subjects'] as $subject) {
    	$subjects .=$subject;
    }

    $data = 'teacher_id='.$teacher_id;

    if (empty($fname)) {
      $em  = "Privalote įvesti vardą";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    } else if (empty($lname)) {
      $em  = "Privalote įvesti pavardę";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    } else if (empty($uname)) {
      $em  = "Privalote įvesti vartotojo vardą";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    } else if (!unameIsUnique($uname, $conn, $teacher_id)) {
      $em  = "Vartotojo vardas užimtas. Sugalvokite kitą";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    } else if (empty($t_mail)) {
      $em  = "Privalote įvesti elektroninį paštą";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    } else if (empty($grade)) {
      $em  = "Privalote nurodyti klasę";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    } else {
        $sql = "UPDATE teachers SET username = ?, fname=?, lname=?, t_mail=?, subjects=?, grade=? WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$fname, $lname, $t_mail, $subjects, $grade, $teacher_id]);
        $sm = "Sėkmingai atnaujinta informacija";
        header("Location: ../teacher-edit.php?success=$sm&$data");
        exit;
	} 
  } else {
  	$em = "Įvyko klaida";
    header("Location: ../teacher-edit.php?error=$em");
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