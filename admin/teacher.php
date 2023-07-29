<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       $teachers = getAllTeachers($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Mokytojai</title>
	<link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap 5 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <!--  Aktyvi nav. Meniu -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php include "nav/navbar.php"; if($teachers != 0){ ?>
     <div class="container1">
        <a href="teacher-add.php"><button class="grizti add"> Pridėti naują mokytoją </button></a>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger mt-3 n-table" role="alert"><?=$_GET['error']?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-info mt-3 n-table" role="alert"><?=$_GET['success']?></div>
        <?php } ?>

          <div class="table-responsive">
            <table class="table table-bordered mt-3 n-table">
              <thead><tr>
                  <th scope="col">#</th>
                  <th scope="col">ID</th>
                  <th scope="col">Vardas</th>
                  <th scope="col">Pavardė</th>
                  <th scope="col">Vart. vardas</th>
                  <th scope="col">El. paštas</th>
                  <th scope="col">Dalykas(-ai)</th>
                  <th scope="col">Klasė</th>
                  <th scope="col">Veiksmai</th>
              </tr></thead>
              <tbody>
                <?php $i = 0; foreach($teachers as $teacher){ $i++; ?>
                <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$teacher['teacher_id']?></td>
                  <td> <?=$teacher['fname']?></td>
                  <td><?=$teacher['lname']?></td>
                  <td><?=$teacher['username']?></td>
                  <td><?=$teacher['t_mail']?></td>
                  <td><?php 
                        $g = '';
                        $subjects = str_split(trim($teacher['subjects']));
                        foreach ($subjects as $subject) {
                          $g_temp = getSubjectById($subject, $conn);
                          if ($g_temp != 0) 
                            $g .=$g_temp['subject'];
                          } 
                          echo $g;
                    ?></td>
                  <td><?=$teacher['grade']?></td>
                  
                   
                    <td>
                      <a href="teacher-edit.php?teacher_id=<?=$teacher['teacher_id']?>" class="btn btn-warning">Atnaujinti</a>
                      <a href="teacher-delete.php?teacher_id=<?=$teacher['teacher_id']?>" class="btn btn-danger">Ištrinti</a>
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
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>