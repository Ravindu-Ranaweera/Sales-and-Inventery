<?php 

$conn = new mysqli('localhost','root','','sales');

if ($conn->connect_error){
	die('Database error:' . $conn->connect_error);
}
?>