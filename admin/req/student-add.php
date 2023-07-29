<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin'){

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['s_mail']) &&
    isset($_POST['pass']) && isset($_POST['grade'])){ 
    include '../../DB_connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];
    $grade = $_POST['grade'];
    $s_mail = $_POST['s_mail'];
    
    $data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname.'&s_mail='.$s_mail.'&grade='.$grade;

    if (empty($fname)) {
      $em  = "Privalote įvesti vardą";
      header("Location: ../student-add.php?error=$em&$data");
      exit;
    } else if (empty($lname)) {
      $em  = "Privalote įvesti pavardę";
      header("Location: ../student-add.php?error=$em&$data");
      exit;
    } else if (empty($uname)) {
      $em  = "Privalote įvesti vartotojo vardą";
      header("Location: ../student-add.php?error=$em&$data");
      exit;
    } else if (!StunameIsUnique($uname, $conn)) {
      $em  = "Užimtas vartotojo vardas. Sugalvokite kitą";
      header("Location: ../student-add.php?error=$em&$data");
      exit;
    } else if (empty($s_mail)) {
      $em  = "Privalote įvesti elektroninį paštą";
      header("Location: ../student-add.php?error=$em&$data");
      exit;
    } else if (empty($grade)) {
      $em  = "Privalote nurodyti klasę";
      header("Location: ../student-add.php?error=$em&$data");
      exit;
    } else if (empty($pass)) {
      $em  = "Privalote sukurti slaptažodį";
      header("Location: ../student-add.php?error=$em&$data");
      exit;
    } else {
        $sql  = "INSERT INTO students(username, password, fname, lname, s_mail, grade) VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $s_mail, $grade]);
        $sm = "Sėkmingai pridėtas naujas mokinys";
        header("Location: ../student-add.php?success=$sm");
        exit;
	}  
  } else {
      $em = "Įvyko klaida";
      header("Location: ../student-add.php?error=$em");
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
