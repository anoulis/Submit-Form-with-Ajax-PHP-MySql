<?php
$servername = "localhost";
$username = "root";
$password = "12341234";
$dbname = "ajaxForm";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ajaxForm";
if (!$conn->query($sql) === TRUE) {
  die("Problem with database " . $conn->connect_error);
}
//Create Table
$sql = "CREATE TABLE IF NOT EXISTS ajaxFormProjectTable (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  phone VARCHAR(20),
  email VARCHAR(50),
  selection VARCHAR(255),
  comment TEXT,
  PRIMARY KEY (id)
)";
if (!$conn->query($sql) === TRUE) {
  die("Problem with table " . $conn->connect_error);
}

$output = '';
$sql = "SELECT * FROM ajaxFormProjectTable ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$output .= '
<div class="container">
<h2>Table</h2>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<th>#</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Phone</th>
<th>Selection</th>
<th>Comment</th>
<th>Delete</th>
<th>Edit</th>
</tr>
</thead>';
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
    $output .= '
    <tbody>
    <tr>
    <td>'.$row["id"].'</td>
    <td class="first_name" data-id1="'.$row["id"].'" >'.$row["first_name"].'</td>
    <td class="last_name" data-id2="'.$row["id"].'" >'.$row["last_name"].'</td>
    <td class="first_name" data-id3="'.$row["id"].'" >'.$row["email"].'</td>
    <td class="last_name" data-id4="'.$row["id"].'" >'.$row["phone"].'</td>
    <td class="first_name" data-id5="'.$row["id"].'" >'.$row["selection"].'</td>
    <td class="last_name" data-id6="'.$row["id"].'" >'.$row["comment"].'</td>
    <td><button type="button" class="btn btn-danger btn-sm" name="delete_btn" data-id7="'.$row["id"].'" id="delete">Delete</button></td>
    <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-id8="'.$row["id"].'" id="edit">Edit</button></td>
    </tr>
    </tbody>';
  }
}
else
{
  $output .= '<tr>
  <td>No Data</td>
  <td>No Data</td>
  <td>No Data</td>
  <td>No Data</td>
  <td>No Data</td>
  <td>No Data</td>
  <td>No Data</td>
  </tr>';
}
$output .= '  </table></div></div>';
echo $output;
?>
