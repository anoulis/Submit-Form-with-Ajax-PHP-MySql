<?php
$conn = mysqli_connect("localhost", "root", "12341234", "ajaxForm");
$id = $_POST["id"];
$sql = "UPDATE ajaxFormProjectTable SET first_name='".$_POST["first_name"]."',last_name='".$_POST["last_name"]."',
phone='".$_POST["phone"]."',email='".$_POST["email"]."', selection='".$_POST["selection"]."',comment='".$_POST["comment"]."' WHERE id='".$id."'";
if(mysqli_query($conn, $sql))
{
  echo 'Data Updated';
}

?>
