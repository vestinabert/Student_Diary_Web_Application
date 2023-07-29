<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])){
  if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       $subjects = getAllSubjects($conn);

       $subj = '';
       if (isset($_GET['subj'])) $subj = $_GET['subj'];
 ?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Pridėti dalyką</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include "nav/navbar.php"; ?>
     <div class="container1 mb-5">
        <a href="subject.php"><button class="grizti add"> Grįžti </button></a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="req/subject-add.php">
        <h3>Pridėti naują dalyką</h3><hr>

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
          <label class="form-label">Dalykas</label>
          <input type="text" class="form-control" value="<?=$subj?>" name="subj">
        </div><hr>
        
      <div class = "mygt"><button type="submit" class="myg1">Pridėti</button></div>

     </form>
     </div><br><br>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(4) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>