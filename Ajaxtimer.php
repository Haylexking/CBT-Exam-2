
<?php
session_start();
include_once('admin/Conn.php');

?>
<?php
$qry=mysql_query("select * from test where name='Sample'");
$numrows=mysql_num_rows($qry);
if ($numrows>0){
	$row=mysql_fetch_assoc($qry);
	
	$sql2=mysql_query("update testattempt set time=".$row['time']."-1 where stdid=".$_SESSION['stdid']."") or die (mysql_error());
	
	$init=$row['time'];
	$minute=floor(($init/60)%60);
	$sec=$init%60;
	echo $minute .'Minute';
	echo $sec.' Seconds';
	}


?>
