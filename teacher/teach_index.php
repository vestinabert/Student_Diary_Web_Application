<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Teacher') {
 ?>
 
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Mok. pagrindinis puslapis </title>
  <link rel="stylesheet" href="../css/style.css">
  <!-- Bootstrap 5 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <!--  Aktyvi nav. Meniu -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php include "nav/navbar.php"; ?>
    <div class = "container">
      <div classs = "row">
        <a href="students.php" class = "col btn btn-dark m-2 p-4"> Mokiniai </a> 
         <a href="gradings.php" class = "col btn btn-dark m-2 p-4"> Pažymiai</a> 
         <a href="student-ratings.php" class = "col btn btn-dark m-2 p-4"> Reitingai </a>
        <a href="contact.php" class = "col btn btn-dark m-2 p-4"> Kontaktai </a>
      </div>
      <div class = "row mt-5">
        <a href="../logout.php"><button class="grizti" style = "height: 70px;"> Atsijungti </button></a> 
      </div>
    </div>

     <!-- Mobil. ver. meniu -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <!--  Aktyvi nav. -->
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>