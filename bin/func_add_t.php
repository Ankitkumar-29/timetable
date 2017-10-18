<?php

if(isset($_POST["name"]) && isset($_POST["id"])){
include 'dbconn.php';
$name=$_POST["name"];
$id=$_POST["id"];
$cls="null";
$day =array('Monday' , 'Tuesday' ,'Wednesday' , 'Thrusday' ,'Friday','Saturday');
$qry = "SELECT * FROM `teachers` WHERE  `id`='$id'";
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
  echo "failed";
}
else {
 $qry="INSERT into `teachers` values('$id','$name')";
 $conn->query($qry);
 $qry="SELECT * FROM `Classes`";
 $rs=$conn->query($qry);
  if(mysqli_num_rows($rs)>0)
  {
    while($row=$rs->fetch_assoc()){
        $cls=$row['classid'];
        $qry="CREATE Table `$name` like `$cls`";
        $conn->query($qry);
        
        for($count=0;$count<6;$count++)
        {
          $qry="INSERT into `$name`(Day) Values('$day[$count]')";
          $conn->query($qry);
        }
          break;
      }
      echo  "success";
    }
    else {
      echo "error";
    }

}
}
else {
 echo "error";
}

 ?>
