<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       $subjects = getAllSubjects($conn);
 ?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adm. - Dalykai</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
  <!--  Aktyvi nav. Meniu -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include "nav/navbar.php"; if($subjects != 0){ ?>
     <div class="container1 mb-5">
        <a href="subject-add.php"><button class="grizti add"> Pridėti naują dalyką </button></a>

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
                 
                  <th scope="col">Dalykas</th>
                  <th scope="col">Veiksmai</th>
              </tr></thead>
              <tbody>
                <?php $i = 0; foreach($subjects as $subject){ $i++; ?>
                <tr>
                  <th scope="row"><?=$i?></th>
                  
                  <td><?php echo $subject['subject'] ?></td>
                    <td>
                      <a href="subject-edit.php?subject_id=<?=$subject['subject_id']?>" class="btn btn-warning">Atnaujinti</a>
                      <a href="subject-delete.php?subject_id=<?=$subject['subject_id']?>" class="btn btn-danger">Ištrinti</a>
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
             $("#navLinks li:nth-child(4) a").addClass('active');
        });
    </script>
</body>
</html>
<?php }} ?>