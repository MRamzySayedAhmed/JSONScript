<?php

// Connecting the DB
$servername = "localhost";
$username = "root";
$password = "";

// Creating Connection
$conn = new mysqli($servername, $username, $password, "json");

// Checking Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM students";
$res = mysqli_query($conn, $query) or die("Query Not Executed " . mysqli_error($conn));

$data_array = array();
while($rows = mysqli_fetch_assoc($res))
{
	$data_array[] = $rows;
}

// Encoding Array into JSON + Writing Data to JSON File
$fp = fopen('students_records.json', 'w');

if(!fwrite($fp, json_encode($data_array)))
{
	die('Error : File Not Opened. ' . mysqli_error($conn));
}
else 
{
	echo "Data Retrieved Successully!!!";
}

fclose($fp);
mysqli_close($conn);

?>
