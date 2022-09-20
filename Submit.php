<?php  
session_start();
 include_once('admin/conn.php');
$sql=$conn->prepare("select * from testattempt where stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']."");
$numrows=$sql->rowCount();
$row=$sql->fetch(PDO::FETCH_ASSOC);


//echo $numrows;

$sql2=$conn->prepare("select * from testattempt where stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']." and ans=correctans ");
$numrows2=$sql2->rowCount();
$sql2->fetch(PDO::FETCH_ASSOC);
$score=$numrows2/$numrows*100;
echo $score.'%';

//echo $numrows2;
$conn->prepare("Insert into testscore (stdid,testid,score) values(". $_SESSION['stdid'].",".$_SESSION['testid'].",'$score')");

session_destroy();
 ?>


