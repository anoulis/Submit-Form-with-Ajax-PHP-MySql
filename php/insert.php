<?php
$conn = mysqli_connect("localhost", "root", "12341234", "ajaxForm");
$sql = "INSERT INTO ajaxFormProjectTable(first_name, last_name,phone,email,selection,comment)
VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."','".$_POST["phone"]."', '".$_POST["email"]."','".$_POST["selection"]."', '".$_POST["comment"]."')";
if(mysqli_query($conn, $sql))
{
  echo 'Record Inserted Successfully!';
}
?>
