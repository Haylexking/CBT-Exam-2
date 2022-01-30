<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script>
for (var i = 1, ar = []; i < 10; i++) {
    ar[i] = i;
  }

  // randomize the array
  ar.sort(function () {
      return Math.random() - 0.5;
  });
  console.log(ar.pop());
  console.log(ar);
  console.log(ar[2]);



//var exists = [],
//    randomNumber,
//    max = 5;
//for(var l = 0; l < max; l++) {
//   do {
//       randomNumber = Math.floor(Math.random() * max);  
//   } while (exists[randomNumber]);
//   exists[randomNumber] = true;
//   alert(randomNumber)
//}



//function generateRan(){
//    var max = 20;
//    var random = [];
//    for(var i = 0;i<max ; i++){
//        var temp = Math.floor(Math.random()*max);
//        if(random.indexOf(temp) == -1){
//            random.push(temp);
//        }
//        else
//         i--;
//    }
//    console.log(random)
//}
//
//generateRan();
</script>

//<?php
//$people = array("Peter", "Joe", "Glenn", "Cleveland");
//
//echo current($people) . "<br>";
//$x=0;
//	echo $x=$x+1;
//if (isset($_POST['next'])){
//	echo next($people);
//
//	
//	}

//$array = range(1, 10);
//shuffle($array);
//for ($i=0,$c=count($array); $i<$c; $i++) {
//    echo $array[$i];
//}

 include_once('admin/conn.php');

$qry=mysql_query("select * from test where name='Rapi Test'");
$numrows=mysql_num_rows($qry);
if ($numrows>0){
	$row=mysql_fetch_assoc($qry);
	
	$init=$row['time'];
	$minute=floor(($init/60)%60);
	$sec=$init%60;
echo $minute .':'. $sec;
}




//?>

<input name="next" type="submit" value="Next" />

<body>
</body>
</html>