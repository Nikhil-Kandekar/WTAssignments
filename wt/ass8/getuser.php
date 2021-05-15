<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','students');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM academics WHERE roll_no = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table class='table table-sm'>
<tr>
<th>Roll No.</th>
<th>Name</th>
<th>Marks</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['roll_no'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['marks'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</div>
</body>
</html>