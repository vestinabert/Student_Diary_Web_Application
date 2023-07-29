<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       $fname = '';
       $lname = '';
       $uname = '';
       $s_mail = '';
       $grade = '';

       if (isset($_GET['fname'])) $fname = $_GET['fname'];
       if (isset($_GET['lname'])) $lname = $_GET['lname'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['s_mail'])) $uname = $_GET['s_mail'];
       if (isset($_GET['s_mail'])) $uname = $_GET['grade'];
 ?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Pridėti mokinį</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include "nav/navbar.php"; ?>
     <div class="container1 mb-5">
        <a href="student.php"><button class="grizti add"> Grįžti </button></a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="req/student-add.php">
        <h3>Pridėti naują mokinį</h3><hr>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert"><?=$_GET['error']?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert"><?=$_GET['success']?></div>
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
          <input type="text" class="form-control" value="<?=$uname?>" name="username">
        </div>
        <div class="mb-3">
          <label class="form-label">Elektroninis paštas</label>
          <input type="text" class="form-control" value="<?=$s_mail?>" name="s_mail">
        </div>
        <div class="mb-3">
          <label class="form-label">Slaptažodis</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="pass" id="passInput">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Klasė (Pvz.: 1a)</label>
          <input type="text" class="form-control" value="<?=$grade?>" name="grade">
        </div><hr>

      <div class = "mygt"><button type="submit" class="myg1">Pridėti</button></div>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
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