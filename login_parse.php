<?php
session_start();
 include_once('admin/conn.php');
 if (isset($_POST['user'])){
$name=$_POST['user'];
$pass= $_POST['password'];
$qry=mysql_query("select * from student where username='$name' and password='$pass' limit 1 ");
$numrows=mysql_num_rows($qry);
if ($numrows==1){
while($fetch=mysql_fetch_assoc($qry)){
	$class=$fetch['class'];
	$qry2=mysql_query("SELECT * FROM test where class='$class'");
	$numrows2=mysql_num_rows($qry2);
	while($fetch2=mysql_fetch_assoc($qry2)){
	$_SESSION['test']=$fetch2['name'];	
	$_SESSION['testid']=$fetch2['id'];	
//header('location:welcome.php');
	}
	
		
	$_SESSION['stdid']=$fetch['id'];
	$_SESSION['user']=$fetch['username'];
	$_SESSION['name']=$fetch['fullname'];
	$_SESSION['class']=$fetch['class'];
	$_SESSION['dept']=$fetch['dept'];
	
	
	$sql=mysql_query("select * from testattempt where stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']."");
$numrows3=mysql_num_rows($sql);
if ($numrows3>0){
	echo 'True';
	
	}
 
else{
	echo 'False';
	
	}
	
	
	
}


}
 }
?>