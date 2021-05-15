<?php
$host="localhost";
$user="root";
$password="";
$dbname = "students";

$conn = new mysqli($host,$user, $password,$dbname);
$cookie_name = "User";
$cookie_value = "Nikhil";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
	echo'<h1>Database Connected</h1>';
	$sql = "SELECT * FROM academics";
$result = $conn->query($sql);
echo'<h3>Student Details</h3>';
echo'<table border="1" style="border-collapse:collapse;">';
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>Roll no:</td><td>" . $row["roll_no"]. " <td>Name:</td><td>" . $row["name"]. "<td>Marks:</td><td>" . $row["marks"]. "</td></tr>";
  }
  echo'</table><br>';
} else {
  echo "0 results";
}
$conn->close();
if(!isset($_COOKIE[$cookie_name])) {
  echo "<h3>Cookie named '" . $cookie_name . "' is not set!</h3>";
} else {
  echo "<h3>Cookie '" . $cookie_name . "' is set!<br>";
  echo "<h3>Value is: " . $_COOKIE[$cookie_name];
}
}
?>