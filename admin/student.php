<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     $students = getAllStudents($conn);
?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Mokiniai</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        include "nav/navbar.php";
        if ($students != 0){
     ?>
     <div class="container1">
        <a href="student-add.php"><button class="grizti add"> Pridėti naują mokinį </button></a>
          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" role="alert"><?=$_GET['error']?></div>
            <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" role="alert"><?=$_GET['success']?></div>
          <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavardė</th>
                    <th scope="col">Vart. vardas</th>
                    <th scope="col">El. paštas</th>
                    <th scope="col">Klasė</th>
                    <th scope="col">Veiksmai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($students as $student){ $i++; ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$student['student_id']?></td>
                    <td><?=$student['fname']?></td>
                    <td><?=$student['lname']?></td>
                    <td><?=$student['username']?></td>
                    <td><?=$student['s_mail']?></td>
                   <td><?=$student['grade']?></td>
                    <td>
                        <a href="student-edit.php?student_id=<?=$student['student_id']?>" class="btn btn-warning">Atnaujinti</a>
                        <a href="student-delete.php?student_id=<?=$student['student_id']?>" class="btn btn-danger">Ištrinti</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php } else { ?>
             <div class="alert alert-info .w-450 m-5" role="alert">Tuščia!</div>
         <?php } ?>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>