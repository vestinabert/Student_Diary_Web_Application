<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])){
  if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       $subjects = getAllSubjects($conn);
       
       $fname = '';
       $lname = '';
       $uname = '';
       $t_mail = '';
       $grade = '';

       if (isset($_GET['fname'])) $fname = $_GET['fname'];
       if (isset($_GET['lname'])) $lname = $_GET['lname'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['t_mail'])) $uname = $_GET['t_mail'];
        if (isset($_GET['grade'])) $grade = $_GET['grade'];
 ?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Pridėti mokytoją</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include "nav/navbar.php"; ?>
     <div class="container1">
        <a href="teacher.php"><button class="grizti add"> Grįžti </button></a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="req/teacher-add.php">
        <h3>Pridėti naują mokytoją</h3><hr>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>

        <div class="mb-3">
          <label class="form-label">Vardas</label>
          <input type="text" class="form-control" value="<?=$fname?>" name="fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Pavardė</label>
          <input type="text" class="form-control" value="<?=$lname?>" name="lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Vartotojo vardas</label>
          <input type="text" class="form-control" value="<?=$uname?>"  name="username">
        </div>
        <div class="mb-3">
          <label class="form-label">Elektroninis paštas</label>
          <input type="text" class="form-control" value="<?=$t_mail?>" name="t_mail">
        </div>
        <div class="mb-3">
          <label class="form-label">Slaptažodis</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="pass">
          </div>
        <div class="mb-3">
          <label class="form-label">Klasė (Pvz.: 1a)</label>
          <input type="text" class="form-control" value="<?=$grade?>" name="grade">
        </div>
          
        </div>
        <div class="mb-3">
          <label class="form-label">Dalykas</label>
          <div class="row row-cols-4">
            <?php foreach ($subjects as $subject): ?>
            <div class="col">
              <input type="radio" name="subjects[]" value="<?=$subject['subject_id']?>">
                <?=$subject['subject']?>
            </div>
            <?php endforeach ?>
          </div>
        </div><hr>
      
      <div class = "mygt"><button type="submit" class="myg1">Pridėti</button></div>
     </form>
     </div><br><br>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass() {
          var result = '';
          var passInput = document.getElementById('passInput');
          passInput.value = result;
        }
    </script>

</body>
</html>
<?php }} ?>