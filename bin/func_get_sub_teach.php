<?php
header("Content-type:text/javascript");
include "dbconn.php";
$sclid="SUB_".$_POST["clid"];
$qry="SELECT * from `$sclid`";
$arr = array();
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0)
{

   while($r=$rs->fetch_assoc())
   {
       $arr[$r["sub"]]=$r;

   }

}
echo json_encode($arr);
 ?>
