<?php 
session_start();

if (isset($_POST['myg1']) && isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['role'])){
	include "../DB_connection.php";
	
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];

	if (empty($uname)) {
		$em  = "<p class='pap'> Privalomas vartotojo vardo įvedimas </p>";
		header("Location: ../login.php?error=$em");
		exit;
	} else if (empty($pass)) {
		$em  = "<p class='pap'> Privalomas slaptažodžio įvedimas </p>";
		header("Location: ../login.php?error=$em");
		exit;
	} else if (empty($role)) {
		$em  = "<p class='pap'> Privalomas prisijungimo pasirinkimas </p>";
		header("Location: ../login.php?error=$em");
		exit;
	} else {
        if($role == '1'){
        	$sql = "SELECT * FROM admin WHERE username = ?";
        	$role = "Admin";
        } else if($role == '2'){
        	$sql = "SELECT * FROM teachers WHERE username = ?";
        	$role = "Teacher";
        } else {
        	$sql = "SELECT * FROM students WHERE username = ?";
        	$role = "Student";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
        	$user = $stmt->fetch();
        	$username = $user['username'];
        	$password = $user['password'];
        	
            if ($username == $uname) {
				if ($password == $pass){
            		$_SESSION['role'] = $role;
            		if ($role == 'Admin') {
                        $id = $user['admin_id'];
                        $_SESSION['admin_id'] = $id;
                        header("Location: ../admin/adm_index.php");
                        exit;
                    }
					if ($role == 'Teacher') {
                        $id = $user['teacher_id'];
                        $_SESSION['teacher_id'] = $id;
                        header("Location: ../teacher/teach_index.php");
                        exit;
                    }
					if ($role == 'Student') {
                        $id = $user['student_id'];
                        $_SESSION['student_id'] = $id;
                        header("Location: ../student/student_index.php");
                        exit;
                    }
            	} else {
					$em  = "<p class='pap'> Neteisingas vartotojo arba slaptažodžio įvedimas </p>";
				    header("Location: ../login.php?error=$em");
				    exit;
		        }
            } else {
				$em  = "<p class='pap'> Neteisingas vartotojo arba slaptažodžio įvedimas </p>";
			    header("Location: ../login.php?error=$em");
			    exit;
	        }
        } else {
			$em  = "<p class='pap'> Neteisingas vartotojo arba slaptažodžio įvedimas </p>";
		    header("Location: ../login.php?error=$em");
		    exit;
        }
	}
} else if (isset($_POST['grizti'])){
	header("Location: ../index.php");
	exit;
} else {
	header("Location: ../login.php");
	exit;
}