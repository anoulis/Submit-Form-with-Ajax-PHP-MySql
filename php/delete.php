<?php
$conn = mysqli_connect("localhost", "root", "12341234", "ajaxForm");
$sql = "DELETE FROM ajaxFormProjectTable WHERE id = '".$_POST["id"]."'";
if(mysqli_query($conn, $sql))
{
  echo 'Data Deleted Successufully!';
}
?>
