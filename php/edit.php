<?php
$connect = mysqli_connect("localhost", "root", "12341234", "ajaxForm");
if(isset($_POST["id"]))
{
  $sql = "SELECT * FROM ajaxFormProjectTable WHERE id = '".$_POST["id"]."' ";
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_array($result);
  echo json_encode($row);
}
?>
