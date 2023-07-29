<?php  

/////////////// DB PRISIJUNGIMAS ////////////////

$sName = "localhost";
$uName = "root";
$pass  = "";
$db_name = "gimnazija";

try {
	$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeption $e){
	echo "Connection failed: ". $e->getMessage();
	exit;
}



/////////////// MOKYTOJAI ////////////////

// SURASTI MOKYTOJĄ PAGAL ID
function getTeacherById($teacher_id, $conn){
	$sql = "SELECT * FROM teachers WHERE teacher_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$teacher_id]);
 
	if ($stmt->rowCount() == 1) {
	  $teacher = $stmt->fetch();
	  return $teacher;
	}else {
	 return 0;
	}
 }
 
 // VISI MOKYTOJAI
 function getAllTeachers($conn){
	$sql = "SELECT * FROM teachers";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
 
	if ($stmt->rowCount() >= 1) {
	  $teachers = $stmt->fetchAll();
	  return $teachers;
	}else {
		return 0;
	}
 }
 
 // PATIKRINTI AR UNIKALUS MOKYTOJO VARTOTOJO VARDAS
 function unameIsUnique($uname, $conn, $teacher_id=0){
	$sql = "SELECT username, teacher_id FROM teachers WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$uname]);
	
	if ($teacher_id == 0) {
	  if ($stmt->rowCount() >= 1) {
		return 0;
	  }else {
	   return 1;
	  }
	}else {
	 if ($stmt->rowCount() >= 1) {
		$teacher = $stmt->fetch();
		if ($teacher['teacher_id'] == $teacher_id) {
		  return 1;
		}else {
		 return 0;
	   }
	  }else {
	   return 1;
	  }
	}
 }
 
 // IŠTRINTI MOKYTOJĄ
 function removeTeacher($id, $conn){
	$sql  = "DELETE FROM teachers WHERE teacher_id=?";
	$stmt = $conn->prepare($sql);
	$re   = $stmt->execute([$id]);
	if ($re) {
	  return 1;
	}else {
	 return 0;
	}
 }



 /////////////// DALYKAI ////////////////

// VISI DALYKAI
function getAllSubjects($conn){
	$sql = "SELECT * FROM subjects";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
 
	if ($stmt->rowCount() >= 1) {
	  $subjects = $stmt->fetchAll();
	  return $subjects;
	}else {
		return 0;
	}
 }
 
 // SURASTI DALYKĄ PAGAL ID
 function getSubjectById($subject_id, $conn){
	$sql = "SELECT * FROM subjects WHERE subject_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$subject_id]);
 
	if ($stmt->rowCount() == 1) {
	  $subject = $stmt->fetch();
	  return $subject;
	}else {
		return 0;
	}
 }

  // IŠTRINTI DALYKĄ
  function removeSubject($id, $conn){
	$sql  = "DELETE FROM subjects WHERE subject_id=?";
	$stmt = $conn->prepare($sql);
	$re   = $stmt->execute([$id]);
	if ($re) {
	  return 1;
	} else {
	 return 0;
	}
 }


/////////////// ADMIN SLAPTAŽODŽIO PATVIRTINIMAS ////////////////
function adminPasswordVerify($admin_pass, $conn, $admin_id){
	$sql = "SELECT * FROM admin WHERE admin_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$admin_id]);
 
	if ($stmt->rowCount() == 1) {
	  $admin = $stmt->fetch();
	  $pass  = $admin['password'];
 
	  if ($admin_pass == $pass) {
		  return 1;
	  } else {
		  return 0;
	  }
	} else {
	 return 0;
	}
 }



// IŠTRINTI KLASĘ
function removeGrade($id, $conn){
	$sql  = "DELETE FROM grades WHERE grade_id=?";
	$stmt = $conn->prepare($sql);
	$re   = $stmt->execute([$id]);
	if ($re) {
	  return 1;
	} else {
	 return 0;
	}
 }


 /////////////// MOKINIAI ////////////////

// MOKINIAI
function getAllStudents($conn){
	$sql = "SELECT * FROM students";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
 
	if ($stmt->rowCount() >= 1) {
	  $students = $stmt->fetchAll();
	  return $students;
	}else {
		return 0;
	}
 }
 
 // IŠTRINTI MOKINĮ
 function removeStudent($id, $conn){
	$sql  = "DELETE FROM students WHERE student_id=?";
	$stmt = $conn->prepare($sql);
	$re   = $stmt->execute([$id]);
	if ($re) {
	  return 1;
	}else {
	 return 0;
	}
 }
 
 // RASTI MOKINĮ PAGAL ID
 function getStudentById($id, $conn){
	$sql = "SELECT * FROM students WHERE student_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);
 
	if ($stmt->rowCount() == 1) {
	  $student = $stmt->fetch();
	  return $student;
	}else {
	 return 0;
	}
 }
 
 // AR UNIKALUS MOKINIO VARTOTOJO VARDAS
 function StunameIsUnique($uname, $conn, $student_id=0){
	$sql = "SELECT username, student_id FROM students WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$uname]);
	
	if ($student_id == 0) {
	  if ($stmt->rowCount() >= 1) {
		return 0;
	  }else {
	   return 1;
	  }
	}else {
	 if ($stmt->rowCount() >= 1) {
		$student = $stmt->fetch();
		if ($student['student_id'] == $student_id) {
		  return 1;
		}else {
		 return 0;
	   }
	  }else {
	   return 1;
	  }
	}
 }


 /////////////// PAŽYMIAI //////////////// 

// IŠTRINTI PAŽYMĮ
function removeGrading($id, $conn){
	$sql  = "DELETE FROM gradings WHERE grading_id=?";
	$stmt = $conn->prepare($sql);
	$re   = $stmt->execute([$id]);
	if ($re) {
	  return 1;
	} else {
	 return 0;
	}
 }

 // RASTI PAŽYMĮ PAGAL ID
 function getGradingById($grading_id, $conn){
	$sql = "SELECT * FROM gradings WHERE grading_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$grading_id]);
 
	if ($stmt->rowCount() == 1) {
	  $grading = $stmt->fetch();
	  return $grading;
	}else {
	 return 0;
	}
 }

//  function getAllGradings($conn){
// 	$sql = "SELECT * FROM gradings";
   
//    $stmt = $conn->prepare($sql);
//    $stmt->execute();
	
// 	if ($stmt->rowCount() >= 1) {
// 		$students = $stmt->fetchAll();
// 		return $students;
// 	} else {
// 		return 0;
// 	}
// }

 ///////////////////////////////////////

 $db = $conn;
$tables = [ 'students','gradings'];
$columns = [ 'fname', 'lname','subject','grading'];


function fetch_data($conn){
    $sql = "SELECT *
    FROM gradings, students, subjects WHERE gradings.student_id = students.student_id 
    and subjects.subject_id = gradings.subject_id;";

    $result = $conn->prepare($sql);
	$result->execute();
 
	if ($result->rowCount() >= 1) {
	  $row = $result->fetchAll();
	  return $row;
	} else {
		return 0;
	}
}

function fetch_data2($conn){
    $sql = "SELECT subjects.subject,subjects.subject_id, round(avg(gradings.grading),2), students.fname, students.lname, gradings.student_id
    FROM gradings, students, subjects WHERE gradings.student_id = students.student_id 
    and subjects.subject_id = gradings.subject_id group by subject, student_id desc;";

    $result = $conn->prepare($sql);
    $result->execute();

    if ($result->rowCount() >= 1) {
    $row = $result->fetchAll();
	return $row;
	} else {
		return 0;
	}
}

function fetch_data3($db, $tables, $columns){
    $sql = "SELECT subjects.subject,subjects.subject_id, round(avg(gradings.grading),2), students.fname, students.grade, students.lname, gradings.student_id
    FROM gradings, students, subjects WHERE gradings.student_id = students.student_id 
    and subjects.subject_id = gradings.subject_id group by student_id order by round(avg(gradings.grading),2) desc ;";

    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() >= 1) {
    $row = $result->fetchAll();
    return $row;
    } else {
       return 0;
    }
}