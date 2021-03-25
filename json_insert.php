<?php

// Connecting the DB
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "json");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Getting the Contents of the JSON File
$jsonCont = file_get_contents('students.json');

// Decoding JSON Data to PHP Array
$content = json_decode($jsonCont, true);

// Fetching the Details of Student
$std_id = $content['stdID'];
$std_name = $content['stdData']['stdName'];
$std_age = $content['stdData']['stdAge'];
$std_gender = $content['stdData']['stdGender'];
$std_no = $content['stdData']['stdNo'];
$std_street = $content['stdData']['stdAddress']['stdStreet'];
$std_city = $content['stdData']['stdAddress']['stdCity'];
$std_country = $content['stdData']['stdAddress']['stdCountry'];
$std_postal = $content['stdData']['stdAddress']['stdPostal'];
$std_dept = $content['stdEdu']['stdDept'];
$std_sem = $content['stdEdu']['stdSemester'];
$std_major = $content['stdEdu']['stdMajor'];

// Inserting the Fetched Data into DB
$query = "INSERT INTO students(student_id, student_name, student_age, student_gender, student_num, student_street, student_city, student_country, student_postal, student_department, student_semester, student_major) VALUES('$std_id', '$std_name', '$std_age', '$std_gender', '$std_no', '$std_street', '$std_city', '$std_country', '$std_postal', '$std_dept', '$std_sem', '$std_major')";

if(!mysqli_query($conn,$query))
	{
	die('Error : Query Not Executed. Please Fix the Issue! ' . mysqli_error($conn));
	}
	else {
		echo "Data Added Successully!!!";
		}
	?>