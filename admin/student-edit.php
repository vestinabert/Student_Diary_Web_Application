<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role']) && isset($_GET['student_id'])) {
  if ($_SESSION['role'] == 'Admin'){
      
       include "../DB_connection.php";
       $subjects = getAllSubjects($conn);
       
       $student_id = $_GET['student_id'];
       $student = getStudentById($student_id, $conn);
       if ($student == 0){
         header("Location: student.php");
         exit;
       }
 ?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Taisyti mokinio inf.</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include "nav/navbar.php"; ?>
     <div class="container1 mb-5">
     <a href="student.php"><button class="grizti add"> Grįžti </button></a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="req/student-edit.php">
        <h3>Taisyti mokinio informaciją</h3><hr>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert"><?=$_GET['error']?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert"> <?=$_GET['success']?></div>
        <?php } ?>

        <div class="mb-3">
          <label class="form-label">Vardas</label>
          <input type="text" class="form-control" value="<?=$student['fname']?>" name="fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Pavardė</label>
          <input type="text" class="form-control" value="<?=$student['lname']?>" name="lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Vartotojo vardas</label>
          <input type="text" class="form-control" value="<?=$student['username']?>" name="username">
        </div>
        <input type="text" value="<?=$student['student_id']?>" name="student_id" hidden>
        <div class="mb-3">
          <label class="form-label">Elektroninis paštas</label>
          <input type="text" class="form-control" value="<?=$student['s_mail']?>" name="s_mail">
        </div>
        <div class="mb-3">
          <label class="form-label">Klasė (Pvz.: 1a)</label>
           <input type="text" class="form-control" value="<?=$student['grade']?>" name="grade">
        </div><hr>

      <div class = "mygt"><button type="submit" class="myg1"> Atnaujinti </button></div>
     </form>

     <form method="post" class="shadow p-3 my-5 form-w" action="req/student-change.php" id="change_password">
        <h3>Pakeisti slaptažodį</h3><hr>

          <?php if (isset($_GET['perror'])) { ?>
            <div class="alert alert-danger" role="alert"><?=$_GET['perror']?></div>
          <?php } ?>
          <?php if (isset($_GET['psuccess'])) { ?>
            <div class="alert alert-success" role="alert"><?=$_GET['psuccess']?></div>
          <?php } ?>

       <div class="mb-3">
            <label class="form-label">Administratoriaus slaptažodis</label>
                <input type="password" class="form-control" name="admin_pass"> 
          </div>

            <label class="form-label">Naujas slaptažodis</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="new_pass" d="passInput">
            </div>

          <input type="text"value="<?=$student['student_id']?>" name="student_id" hidden>

          <div class="mb-3">
            <label class="form-label">Pakartokite naują slaptažodį</label>
                <input type="text" class="form-control" name="c_new_pass" id="passInput2"> 
          </div><hr>
          <div class = "mygt"><button type="submit" class="myg1"> Pakeisti </button></div>
        </form>
      </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });

        function makePass() {
          var result = '';
          var passInput = document.getElementById('passInput');
          var passInput2 = document.getElementById('passInput2');
          passInput.value = result;
          passInput2.value = result;
        }
    </script>
</body>
</html>
<?php }} ?>