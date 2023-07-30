# StudentDiary
# Table of contents
1. [Introduction](#introduction)
2. [Project Deployment](#deployment)
    1. [Technical Requirements](#technicalrequirements)
    2. [Project Installation](#instalation)
3. [Project files](#projectfiles)
    1. [Administrator's folder](#admin)
    2. [Student's folder](#student)
    3. [Teacher's folder](#techer)
5. [Implemented PHP functions](#functions)
6. [Data Model Description](#datamodel)
7. [GUI](#gui)
  
## The project's goal and a brief description: <a name="introduction"></a>
During my coursework, I created an electronic diary. It is a simple online platform designed to
help a specific high school or school manage student information and academic records. The program
allows storing information about students and teachers. The project has a user-friendly interface and convenient features.

## Project Deployment: <a name="deployment"></a>
#### Technical Requirements: <a name="technicalrequirements"></a>

- The computer must have a local web server installed, for example, XAMPP.
- The source code ZIP file must be downloaded and available on the computer.

#### Project Installation: <a name="instalation"></a>

1. Open the XAMPP control panel and start "Apache" and "MySQL".
2. Extract the downloaded source code ZIP file.
3. Copy the extracted source code folder and paste it into the XAMPP "htdocs" directory.
4. Access PHPMyAdmin by entering "root" in the Username text field. Leave the password field empty.
5. After logging into PHPMyAdmin, create a new database named "gimnazija".
6. Import the provided SQL file named "gimnazija.sql," which can be found in the source code folder.

#### Default Administrator Access:
Username: gg <br>
Password: 123

#### Default Teacher Access:
Username: oliver <br>
Password: 321

#### Default Student Access:
Username: galius <br>
Password: 456

## Project files: <a name="projectfiles"></a>
- DB_connection.php - File responsible for handling the database connection and queries.
- index.php - The main page of the project.
- login.php - The login page for user authentication.
- logout.php - The page for user logout functionality.
- navbar.php - A file containing the page navigation code that is included in other pages.
- style.css - The CSS file for styling the pages in the project.

#### Administrator's folder: <a name="admin"></a>
- adm_index.php - Main administrator's page with various sections:
- contact.php - Contains contact information for students and teachers.
- student.php - Displays a list of students and allows actions related to students.
- student-add.php - Allows adding new students to the system.
- student-delete.php - Enables deleting student records from the system.
- student-edit.php - Allows editing student information.
- subject.php - Provides a list of subjects taught in the school and allows actions related to them.
- subject-add.php - Allows adding new subjects taught in the school.
- subject-delete.php - Enables deleting subjects from the school's curriculum.
- subject-edit.php - Allows editing subject information.
- teacher.php - Displays a list of teachers and allows actions related to teachers.
- teacher-add.php - Allows adding new teachers to the system.
- teacher-edit.php - Allows editing teacher information.
- teacher-delete.php - Enables deleting teacher records from the system.

#### Student's folder: <a name="student"></a>
- student.php - Displays the student's grades and averages.
- student_index.php - The main page for the student.
- student-contact.php - Contains the student's contacts.

#### Teacher's folder: <a name="teacher"></a>
- contact.php - Contains the teacher's contact information.
- gradings.php - Lists students grades.
- gradings-delete.php - Deletes a student's grade.
- student-edit.php - Allows editing a student's grade.
- student-filter.php - Provides a filtered list of students.
- student-gradings.php - Displays filtered students grades.
- student-ratings.php - Displays ratings for supervised students.
- studentGrade-add.php - Allows adding a student's grade.
- students.php - Lists all students.
- teach_index.php - The main page for the teacher.

## Implemented PHP functions: <a name="functions"></a>
- session_start() - Starts a session.
- session_unset() - Unsets all session variables.
- session_destroy() - Destroys a session.
- header() - Sends a raw HTTP header or redirects a browser.
- new PDO() - Creates a new PDO object for executing database queries.
- isset() - Checks if a variable is set and is not null.
- include() - Includes and evaluates the specified file.
- trim() - Removes whitespace or other specified characters from the beginning and end of a string.
- str_split() - Splits a string into an array of characters.
- prepare() - Prepares a statement for execution and returns a statement object.
- execute() - Executes a prepared statement.
- empty() - Checks if a variable is empty.
- is_array() - Checks if a variable is an array.
- PDO::setAttribute() - Sets attributes for the database connection.
- catch() - Catches exceptions.
- getMessage() - Returns the exception message after catching exceptions.
- rowCount() - Returns the number of rows affected by a database operation.
- fetch() - Fetches the next row from a result set.
- fetchAll() - Fetches all remaining rows from a result set.

## Data Model Description: <a name="datamodel"></a>
|Table name of the database|Purpose|
|--------------------------|---------|
|admin                     |To store electronic diary administrator data (administrator ID, first name, last name, username, password, email).|
|teachers                  |To store electronic diary teacher data (teacher ID, first name, last name, username, password, email, subject taught, supervised class).|
|students                  |To store electronic diary student data (student ID, first name, last name, username, password, email, class).|
|gradings                  |To store data about the grades assigned by teachers to students (grade ID, grade value, student ID, subject ID).|
|subjects                  |To store data about the subjects teachers teach (subject ID, subject name).|


## GUI: <a name="gui"></a>

![login](https://github.com/vestinabert/StudentDiary/assets/127593981/5af26a8d-3be3-481f-8708-8c0459b9425a) <br><br>
![mainpage](https://github.com/vestinabert/StudentDiary/assets/127593981/ac974a9d-44b6-4435-891c-28b162e2499f) <br><br>
![teacherslist](https://github.com/vestinabert/StudentDiary/assets/127593981/cb13de78-978f-4afa-87b6-2a287b071fca) <br><br>
![addingstudents](https://github.com/vestinabert/StudentDiary/assets/127593981/0d82726b-9e6b-4a42-97e0-5a681cb0e2b1) <br><br>
![changepassword](https://github.com/vestinabert/StudentDiary/assets/127593981/4a39e172-8786-461f-919e-112491e03709) <br><br>
![update](https://github.com/vestinabert/StudentDiary/assets/127593981/19a4a603-2a84-4cc3-881f-8318aed9f2de) <br><br>
![grades2](https://github.com/vestinabert/StudentDiary/assets/127593981/1eac98c2-d925-4b3b-a734-cba4cb9a03bf)<br><br>
![charts](https://github.com/vestinabert/StudentDiary/assets/127593981/97832475-6de0-4b91-854e-32b9629a94d0)
