<?php 
session_start();
 include_once('admin/conn.php');
 $qno=$_GET['qno'];
//$sql=mysql_query("insert into testattempt(stdid,testid) values('1','121')") or die (mysql_error());
//$ans=$_POST['correct'];
//$cor=$_POST['RadioGroup1'];
$sql=$conn->prepare("select stdid,testid from testattempt where quid='$qno' and stdid=".$_SESSION['stdid']."");
$numrows=$sql->rowCount();
$sql->execute();
$row=$sql->fetch(PDO::FETCH_ASSOC);
if ($numrows>0){

	}

else {
 //$_SESSION['qno']=$qno;

$srs=$conn->prepare("Insert into testattempt(stdid,testid,quid) values(".$_SESSION['stdid'].",".$_SESSION['testid'].",'$qno')");

$srs->execute(); 
}
 ?>