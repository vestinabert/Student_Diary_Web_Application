<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Teacher') {
     include "../DB_connection.php";
     $students = getAllStudents($conn);
     $fetchData = fetch_data($conn);
     $fetchData2 = fetch_data2($conn);
     $teacher=getTeacherById($_SESSION['teacher_id'], $conn);
     $grade=$_POST["grade"];

     if (empty($_POST['grade'])){
      header("Location: students.php");
      $em  = "Neįvedėte klasę";
      header("Location: students.php?error1=$em");
      exit;
     }
      
?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mok. - Mokiniai</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        include "nav/navbar.php";
        if ($students != 0){
     ?>
     <div class="container1 mb-5">
     <a href="students.php"><button class="grizti add"> Grįžti </button></a>
          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" role="alert"><?=$_GET['error']?></div>
            <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" role="alert"><?=$_GET['success']?></div>
          <?php } ?>

          <?php if ($students != 0){ ?>
           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <br><br><label><h4> Mokiniai: </h4></label>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavardė</th>
                    <th scope="col">Klasė</th>
                     <th scope="col">Veiksmai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($students as $student){    
                      if ($student['grade']==$grade){ $i++;
                  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$student['fname']?></td>
                    <td><?=$student['lname']?></td>
                    <td><?=$student['grade']?></td>
                    <td>
                      <a href="studentGrade-add.php?student_id=<?=$student['student_id']?>" class="btn btn-warning">Pridėti pažymį</a>
                    </td>
                  </tr>
                <?php }} ?>
                </tbody>
              </table><br>
           </div>
         <?php } else { ?>
             <div class="alert alert-info .w-450 m-5" role="alert">Tuščia!</div>
         <?php }} ?>
     </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>