<?php
if(isset($_POST['x']) && isset($_POST['cid']) && isset($_POST['col_n']))
{
include "dbconn.php";
$day =array('Monday' , 'Tuesday' ,'Wednesday' , 'Thrusday' ,'Friday','Saturday');
$data= $_POST['x'];
$colname=$_POST['col_n'];
$cid = $_POST['cid'];
  $d=0;
  foreach ($data as $key => $value) {
    $i=0;
    foreach ($value as $key1 => $value1) {
      if($colname[$i]!="Day"){
        if($value1=="")
        {
          $value1="-";
        }
      $qry="UPDATE `$cid` SET `$colname[$i]`='".$value1."' WHERE `Day`='".$day[$d]."' ";
      $conn->query($qry);

      }
      $i++;
      }
    $d++;
  }

  $qry="DELETE FROM `dummy`";
  $conn->query($qry);
  $qry="SELECT column_name From information_schema.columns WHERE TABLE_NAME= '$cid'";
  $rs=$conn->query($qry);
  if(mysqli_num_rows($rs)>0)
  {
    while($r=$rs->fetch_assoc())
    {

        $coln=$r["column_name"];
        if($coln!="Day" && $coln!="Lunch")
        {
          $qry="SELECT DISTINCT `$coln` FROM `$cid`";
          $rset=$conn->query($qry);
          if(mysqli_num_rows($rset)>0)
          {
            while($row=$rset->fetch_array())
            {
              $qry="INSERT INTO `dummy`(`sub`) VALUES ('$row[0]')";
              $conn->query($qry);
           }
        }
      }

    }
  }
  $cname="SUB_".$cid;
  $qry="DELETE FROM `$cname`";
  $conn->query($qry);
  $qry="SELECT DISTINCT `sub` From `dummy`";
  $rs=$conn->query($qry);
  if(mysqli_num_rows($rs)>0)
  {
    while($r=$rs->fetch_array())
    {
      if($r[0]!="-"){
       $qry="INSERT INTO `$cname`(`sub`,`name`) VALUES ('$r[0]','-')";
       $conn->query($qry);
     }
    }
  }
 echo "success";
}
else {
  echo "failed";
}

 ?>
