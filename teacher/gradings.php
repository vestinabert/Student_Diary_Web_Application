<?php 
session_start();
if (isset($_SESSION['teacher_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Teacher') {
     include "../DB_connection.php";

     $students = getAllStudents($conn);
     $fetchData = fetch_data($conn);
     $fetchData2 = fetch_data2($conn);
     $teacher = getTeacherById($_SESSION['teacher_id'], $conn);
?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mok. - Pažymiai</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include "nav/navbar.php"; ?>
    <form action="student-gradings.php" method="post" class = "container1">
    <?php if (isset($_GET['error1'])) { ?>
        <div class="alert alert-danger" role="alert"><?=$_GET['error1']?></div>
      <?php } ?>
      
      Vardas:  <input type="text" name="fname">
      Pavardė: <input type="text" name="lname">
      <input type="submit" value="Filtruoti" class = "grizti" style = "margin-top: 10px;">
		</form>

<?php if ($students != 0){ ?>
    <div class="container1">
      <h3> Pažymiai: </h3>
      <div class="table-responsive">
        <table class="table table-bordered mt-3 n-table">
          <thead><tr>
            <th scope="col">#</th>
            <th scope="col">Vardas</th>
            <th scope="col">Pavardė</th>
            <th scope="col">Dalykas</th>
            <th scope="col">Pažymys</th>
            <th scope="col">Veiksmai</th>
          </tr></thead>
          <tbody>
          <?php
              if (is_array($fetchData)){ $sn = 1;
                foreach($fetchData as $data){
                  if ($teacher['subjects'] == $data['subject_id']){  
          ?>
          <tr>
            <td><?= $sn; ?></td>
            <td><?= $data['fname']; ?></td>
            <td><?= $data['lname']; ?></td>
            <td><?= $data['subject']; ?></td>
            <td><?= $data['grading']; ?></td>
            <td>
              <a href="student-edit.php?student_id=<?=$data['student_id']?>&&grading_id=<?=$data['grading_id']?>" class="btn btn-warning">Atnaujinti</a>
              <a href="gradings-delete.php?grading_id=<?=$data['grading_id']?>" class="btn btn-danger">Ištrinti</a>
            </td>
          </tr>
          <?php $sn++; }}} else { ?>
            <tr><td colspan="8"><?= $fetchData; ?></td></tr>
          <?php }  ?>
          </tbody>
        </table><br>
    </div>

    <h3> Pažymių vidurkiai: </h3>
      <div class="table-responsive">
        <table class="table table-bordered mt-3 n-table">
          <thead><tr>
            <th scope="col">#</th>
            <th scope="col">Vardas</th>
            <th scope="col">Pavardė</th>
            <th scope="col">Dalykas</th>
            <th scope="col">Vidurkis</th>
          </tr></thead>
          <tbody>
          <?php
              if (is_array($fetchData2)){ $sn = 1;
                foreach($fetchData2 as $data){
                  if($teacher['subjects']==$data['subject_id']){
          ?>
          <tr>
            <td><?= $sn; ?></td>
            <td><?= $data['fname']; ?></td>
            <td><?= $data['lname']; ?></td>
            <td><?= $data['subject']; ?></td>
            <td><?= $data['round(avg(gradings.grading),2)']; ?></td>
          </tr>
          <?php $sn++; }}} else { ?>
            <tr><td colspan="8"><?= $fetchData2; ?></td></tr>
          <?php }} ?>
          </tbody>
        </table><br>
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