<?php  
session_start();
 include_once('admin/conn.php');
$sql=mysql_query("select * from testattempt where stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']."");
$numrows=mysql_num_rows($sql);
$row=mysql_fetch_assoc($sql);


//echo $numrows;

$sql2=mysql_query("select * from testattempt where stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']." and ans=correctans ");
$numrows2=mysql_num_rows($sql2);
mysql_fetch_assoc($sql2);
$score=$numrows2/$numrows*100;
echo $score.'%';

//echo $numrows2;
mysql_query("Insert into testscore (stdid,testid,score) values(". $_SESSION['stdid'].",".$_SESSION['testid'].",'$score')");

session_destroy();
 ?>