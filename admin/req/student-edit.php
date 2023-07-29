<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])){
    if ($_SESSION['role'] == 'Admin'){
        
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['s_mail']) &&
    isset($_POST['student_id']) && isset($_POST['grade'])){
    include '../../DB_connection.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $student_id = $_POST['student_id'];
    $grade = $_POST['grade'];
    $s_mail = $_POST['s_mail'];

    $data = 'student_id='.$student_id;

    if (empty($fname)) {
        $em  = "Privalote įvesti vardą";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    } else if (empty($lname)) {
        $em  = "Privalote įvesti pavardę";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    } else if (empty($uname)) {
        $em  = "Privalote įvesti vartotojo vardą";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    } else if (!StunameIsUnique($uname, $conn, $student_id)) {
        $em  = "Užimtas vartotojo vardas. Sugalvokite kitą";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    } else if (empty($s_mail)) {
        $em  = "Privalote įvesti elektroninį paštą";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    } else {
        $sql = "UPDATE students SET username = ?, fname=?, lname=?, s_mail=?, grade=? WHERE student_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$fname, $lname, $s_mail, $grade, $student_id]);
        $sm = "Sėkmingai atnaujinta";
        header("Location: ../student-edit.php?success=$sm&$data");
        exit;
    }
} else {
    $em = "Klaida įvyko";
  header("Location: ../teacher.php?error=$em");
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
