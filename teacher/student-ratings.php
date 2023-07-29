<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Teacher') {
     include "../DB_connection.php";
     $students = getAllStudents($conn);
     $fetchData2 = fetch_data2($conn);

     $fetchData3 = fetch_data3($db, $tables, $columns);
     $teacher=getTeacherById($_SESSION['teacher_id'], $conn);
     
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
    
  <div style = "margin: 50px">
    <h3> Pažangiausi auklėtiniai: </h3>
      <div class="table-responsive">
        <table class="table table-bordered mt-3 n-table">
          <thead><tr>
            <th scope="col">#</th>
            <th scope="col">Vardas</th>
            <th scope="col">Pavardė</th>
            <th scope="col">Vidurkis</th>
          </tr></thead>
          <tbody>
          <?php
              if (is_array($fetchData3)){ $sn = 1;
              foreach($fetchData3 as $data){
                  if ($data['grade']==$teacher['grade']){    
          ?>
          <tr>
            <td><?= $sn; ?></td>
             
            <td><?= $data['fname']; ?></td>
            <td><?= $data['lname']; ?></td>
            <td><?= $data['round(avg(gradings.grading),2)']; ?></td>
          </tr>
          <?php $sn++; }}
        } 
        else { ?>
            <tr><td colspan="8"><?= $fetchData3; ?></td></tr>
          <?php }} ?>
          </tbody>
        </table><br>
    </div>
  <div>
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