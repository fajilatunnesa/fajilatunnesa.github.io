<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";
$table_name = 'pharmacy_info';
$inserted = false;
$something_wrong = false;
$id = $_GET['id'];
$rows = null;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM {$table_name} WHERE id='{$id}'";


if (mysqli_query($conn, $sql)) {
  header("Location: index.php");
} else {
  header("Location: index.php");
}
