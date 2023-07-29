<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VILNIUS TECH prisijungimas</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body class = "body-home">
    <div class = "black-fill">
    	<form method = "post" action = "req/login.php">
		<img src = "logo_vgtu.png">
		
		<!-- Klaidos nustatymas -->
		<?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger" role="alert"><?=$_GET['error']?></div>
		<?php } ?>
		
<pre class="form-la">
<label> Vartotojo vardas:   </label><input type = "text" name = "uname">

<label> Slaptažodis:          </label><input type = "password"  name = "pass">

<label> Prisijungti kaip:      </label><select name = "role">
		    <option value = "1"> Administratorius </option>
		    <option value = "3"> Mokinys </option>
		    <option value = "2"> Mokytojas </option>
</select>
</pre><br>
		<div class = "mygt">
		  <button type = "submit" class = "myg1" name = "myg1"> Prisijungti </button>
		  <button class = "grizti" name = "grizti"> Grįžti </button>
		</div>
		</form>
    </div>
</body>
</html>