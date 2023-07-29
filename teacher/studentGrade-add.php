<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role'])){
  if ($_SESSION['role'] == 'Teacher'){
       include "../DB_connection.php";
       $grading = '';
       if (isset($_GET['grading'])) $grading = $_GET['grading'];

       $student_id = $_GET['student_id'];
       $student = getStudentById($student_id, $conn);
       $teacher = getTeacherById($_SESSION['teacher_id'], $conn);
       $fetchData = fetch_data($conn);
       if ($teacher == 0){
         header("Location: students.php");
         exit;
       }
 ?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mok. - Pridėti pažymį</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include "nav/navbar.php"; ?>
     <div class="container1 mb-5">
        <a href="students.php"><button class="grizti add"> Grįžti </button></a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="req/studentGrade-add.php">
        <h3>Pridėti naują pažymį</h3><hr>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert"><?=$_GET['error']?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert"><?=$_GET['success']?></div>
        <?php } ?>

        <div class="mb-3">
          <label class="form-label"> Mokinio vardas ir pavardė: <?=$student['fname']?> <?=$student['lname']?></label>
        </div>
        <input type="text" value="<?=$student_id?>" name="student_id" hidden>
        <input type="text" value="<?=$teacher['subjects']?>" name="subject_id" hidden>
        <div class="mb-3">
          <label class="form-label">Pažymys:</label>
          <input type="text" class="form-control" value="<?=$grading?>" name="grading">
        </div><hr>

      <div class = "mygt"><button type="submit" class="myg1">Pridėti</button></div>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass(){
          var result = '';
          var passInput = document.getElementById('passInput');
          passInput.value = result;
        }
    </script>
</body>
</html>
<?php }} ?>