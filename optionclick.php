<?php
session_start();
 include_once('admin/conn.php');
  
 
//$_SESSION['cor']=$fetch['correctanswer'];
$ans=$_POST['RadioGroup1'];
$sate=$conn->prepare("update testattempt set ans='$ans',correctans='".$_SESSION['cor']."' where quid=".$_SESSION['qno']." and stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']."") 

;
$sate->execute();
//echo "1";
