<?php 
session_start();
 include_once('/admin/conn.php');
 $qno=$_GET['qno'];
//$sql=mysql_query("insert into testattempt(stdid,testid) values('1','121')") or die (mysql_error());
//$ans=$_POST['correct'];
//$cor=$_POST['RadioGroup1'];
$sql=mysql_query("select stdid,testid from testattempt where quid='$qno' and stdid=".$_SESSION['stdid']."");
$numrows=mysql_num_rows($sql);
$row=mysql_fetch_assoc($sql);
if ($numrows>0){

	}

else {
 //$_SESSION['qno']=$qno;

mysql_query("Insert into testattempt(stdid,testid,quid) values(".$_SESSION['stdid'].",".$_SESSION['testid'].",'$qno')") or die (mysql_error()); 
}
 ?>