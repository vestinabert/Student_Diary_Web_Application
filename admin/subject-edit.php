<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role']) && isset($_GET['subject_id'])) {
  if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       $subject_id = $_GET['subject_id'];
       $subject = getSubjectById($subject_id, $conn);
       if ($subject == 0) {
         header("Location: subject.php");
         exit;
       }
?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Atnaujinti </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include "nav/navbar.php"; ?>
     <div class="container1 mb-5">
     <a href="subject.php"><button class="grizti add"> Grįžti </button></a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="req/subject-edit.php">
          <h3>Atnaujinti dalyko pavadinimą</h3><hr>

          <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert"><?=$_GET['error']?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert"><?=$_GET['success']?></div>
        <?php } ?>

        <div class="mb-3">
          <label class="form-label">Dalykas</label>
          <input type="text" class="form-control" value="<?=$subject['subject']?>" name="subj">
        </div>
        <input type="text" value="<?=$subject['subject_id']?>" name="subject_id" hidden><hr>

        <div class = "mygt"><button type="submit" class="myg1"> Atnaujinti </button></div>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(4) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>