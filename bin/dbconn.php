<?php
$dbserver="localhost";
$dbusername="root"
$dbpass="";
$dbname="timetable";

$conn = new mysqli($dbserver,$dbusername,$dbpass,$dbname);
if($conn->$connect_error)
{
  echo 'Something went wrong';
}
 ?>
