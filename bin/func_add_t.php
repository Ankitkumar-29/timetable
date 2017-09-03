<?php

if(isset($_POST["name"]) && isset($_POST["id"])){
include 'dbconn.php';
$name=$_POST["name"];
$id=$_POST["id"];
$qry = "SELECT * FROM `teachers` WHERE `name`='$name' and `id`='$id'";
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
  echo "failed";
}
else {
 $qry="INSERT into `teachers` values('$id','$name')";
 $conn->query($qry);
 echo  "success";
}


}
else {
 echo "error";
}

 ?>
