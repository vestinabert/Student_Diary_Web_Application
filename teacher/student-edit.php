<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role']) && isset($_GET['grading_id'])){
  if ($_SESSION['role'] == 'Teacher'){
      
       include "../DB_connection.php";
       $subjects = getAllSubjects($conn);
       $student_id = $_GET['student_id'];
       $grading_id = $_GET['grading_id'];
       $grading = getGradingById($grading_id, $conn);
       $student = getStudentById($student_id, $conn);
       
      if ($student == 0){
          header("Location: gradings.php");
          exit;
      }
 ?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mok. - Taisyti pažymį </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include "nav/navbar.php"; ?>
     <div class="container1 mb-5">
     <a href="gradings.php"><button class="grizti add"> Grįžti </button></a>
      
     <form method="post" class="shadow p-3 mt-5 form-w" action="req/student-edit.php">
        <h3>Taisyti mokinio pažymį</h3><hr>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert"><?=$_GET['error']?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert"> <?=$_GET['success']?></div>
        <?php } ?>
        
        <div class="mb-3">
          <label class="form-label"> Mokinio vardas ir pavardė: <?=$student['fname']?> <?=$student['lname']?></label>
        </div>
        <input type="text" value="<?=$grading['grading_id']?>" name="grading_id" hidden>
        <input type="text" value="<?=$grading['student_id']?>" name="student_id" hidden>
        <input type="text" value="<?=$grading['subject_id']?>" name="subject_id" hidden>
        <div class="mb-3">
          <label class="form-label">Pažymys</label>
          <input type="text" class="form-control" value="<?=$grading['grading']?>" name="grading">
        </div><hr>
      <div class = "mygt"><button type="submit" class="myg1"> Atnaujinti </button></div>
     </form>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>