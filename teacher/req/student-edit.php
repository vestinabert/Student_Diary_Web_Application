<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role'])){
    if ($_SESSION['role'] == 'Teacher'){
        
if (isset($_POST['grading']) && isset($_POST['grading_id']) && isset($_POST['student_id']) && isset($_POST['subject_id'])){
    include '../../DB_connection.php';

    $grading_id = $_POST['grading_id'];
    $grad = $_POST['grading'];
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];

    $data = 'grading_id='.$grading_id;

    if (empty($grad)){
        $em  = "Privalote įvesti pažymį";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    } else {
        $sql = "UPDATE gradings SET grading = ?, student_id = ?, subject_id = ? WHERE grading_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$grad, $student_id, $subject_id, $grading_id]);
        $sm = "Sėkmingai atnaujinta";
        header("Location: ../student-edit.php?success=$sm&$data");
        exit;
    }
} else {
    $em = "Klaida įvyko";
  header("Location: ../student-edit.php?error=$em");
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
