
<?php
session_start();
include_once('admin/conn.php');



$qry= $conn->prepare("select * from test where name='Sample'");
$numrows=$qry->rowCount();
if ($numrows>0){
	$row=$sql->fetch(PDO::FETCH_ASSOC);
	
	$sql2=$conn->prepare("update testattempt set time=".$row['time']."-1 where stdid=".$_SESSION['stdid']."") ;
	$sql2->execute();
	
	$init=$row['time'];
	$minute=floor(($init/60)%60);
	$sec=$init%60;
	echo $minute .'Minute';
	echo $sec.' Seconds';
	}


?>
