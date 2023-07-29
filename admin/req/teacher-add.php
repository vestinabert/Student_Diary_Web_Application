<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {  	

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['t_mail']) &&
    isset($_POST['pass']) && isset($_POST['subjects']) && isset($_POST['grade'])){
    include '../../DB_connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];
    $t_mail = $_POST['t_mail'];
    $grade = $_POST['grade'];

    $subjects = "";
    foreach ($_POST['subjects'] as $subject){
    	$subjects .=$subject;
    }

    $data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname.'&t_mail='.$t_mail.'&grade='.$grade;

    if (empty($fname)) {
      $em  = "Privalote įvesti vardą";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    } else if (empty($lname)) {
      $em  = "Privalote įvesti pavardę";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    } else if (empty($uname)) {
      $em  = "Privalote įvesti vartotojo vardą";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    } else if (!unameIsUnique($uname, $conn)) {
      $em  = "Užimtas vartotojo vardas. Sugalvokite kitą";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    } else if (empty($t_mail)) {
      $em  = "Privalote įvesti elektroninį paštą";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    } else if (empty($pass)) {
      $em  = "Privalote sukurti slaptažodį";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    } else if (empty($grade)) {
      $em  = "Privalote nurodyti klasę";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    } else {
        $sql  = "INSERT INTO teachers(username, password, fname, lname, t_mail, subjects, grade) VALUES(?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $t_mail, $subjects, $grade]);
        $sm = "Sėkmingai pridėtas naujas mokytojas";
        header("Location: ../teacher-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Įvyko klaida";
    header("Location: ../teacher-add.php?error=$em");
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
