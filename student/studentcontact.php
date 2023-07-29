<?php 
session_start();
if (isset($_SESSION['student_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Student') {
     include "../DB_connection.php";
     $students = getAllStudents($conn);
     $teachers = getAllTeachers($conn);
?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mok. - Kontaktai</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include "nav/navbar.php"; ?>
     <div class="container1 mb-5">
         <?php if ($teachers != 0){ ?>
           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <!-- MOKYTOJU KONTAKTAI -->
                <label><h4> Mokytojų kontaktai </h4></label>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavardė</th>
                     <th scope="col">Dalykas</th>
                    <th scope="col">Klasė</th>
                    <th scope="col">El. paštas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($teachers as $teacher){ $i++; ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$teacher['fname']?></td>
                    <td><?=$teacher['lname']?></td>
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
                    <td><a href="mailto:<?=$teacher['t_mail']?>"><?=$teacher['t_mail']?></a></td>
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