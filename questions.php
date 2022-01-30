<?php

session_start();
 include_once('admin/conn.php');
  $qno= $_GET['qno'];
 // echo $qno;
		$qry2=mysql_query("select * from question where qclass='".$_SESSION['class']."' and id='$qno' order by Rand() limit 1 ");
$numrows=mysql_num_rows($qry2);
$fetch=mysql_fetch_assoc($qry2);
//echo '1';
$_SESSION['qno']=$fetch['qno'];
  $_SESSION['question']=$fetch['question'];
  $_SESSION['opt1']=$fetch['option1'];
$_SESSION['opt2']=$fetch['option2'];
$_SESSION['opt3']=$fetch['option3'];
$_SESSION['opt4']=$fetch['option4'];
$_SESSION['cor']=$fetch['correctanswer'];



$sql=mysql_query("select * from testattempt where stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']." and quid='$qno'") or die (mysql_error());
$numrows2=mysql_num_rows($sql);
$row=mysql_fetch_assoc($sql);
if ($row['ans']===$_SESSION['opt1']){
$opt1="checked";
}
else{
	$opt1="";
	}
	
	if ($row['ans']===$_SESSION['opt2']){
$opt2="checked";
}
else{
	$opt2="";
	}
	
	if ($row['ans']===$_SESSION['opt3']){
$opt3="checked";
}
else{
	$opt3="";
	}
	
	if ($row['ans']===$_SESSION['opt4']){
$opt4="checked";
}
else{
	$opt4="";
	}

 echo '<table class="table">
 <tr><td>	

<div id="questions"> <b> '.$_SESSION['question'].'</b>
 
 </td></tr>
 <tr><td>
     <label>
       <input type="radio" name="RadioGroup1" '.$opt1.' value="'.$_SESSION['opt1'].'" id="RadioGroup1_0" />
     '.$_SESSION['opt1'].' </label>
     </td></tr>
     <tr><td>
     <label>
       <input type="radio" name="RadioGroup1" '.$opt2.' value="'.$_SESSION['opt2'].'" id="RadioGroup1_1" />
     '.$_SESSION['opt2'].'</label></td></tr>
     <br />
     <tr> <td>
     <label>
       <input type="radio" name="RadioGroup1" '.$opt3.' value="'.$_SESSION['opt3'].'" id="RadioGroup1_2" />
        '.$_SESSION['opt3'].'</label></td></tr>
     <br /><tr><td>
     <label>
       <input type="radio" name="RadioGroup1" '.$opt4.' value="'.$_SESSION['opt4'].'" id="RadioGroup1_3" />
       '.$_SESSION['opt4'].'</label></td></tr>
     <br />
	    <input name="correct" type="hidden" id="qn3" value='.$_SESSION['cor'].' />
  <tr><td>
  
   </div>
   </div>
   </td></tr>
   </table>
 '
 
 
 
 
	//$qry3=mysql_query("insert into testattempt(stdid,testid,quid) values(".$_SESSION['stdid'].",'121',".$fetch['id'].")")
	?>
	<script src="style/jquery/jquery-2.1.3.min.js" > </script>
<script type="text/javascript" src="style/jquery/jquery.countdown.pack.js"></script>
    
    <script type="text/javascript">
    
    //on option click

jQuery("#RadioGroup1_0,#RadioGroup1_1,#RadioGroup1_2,#RadioGroup1_3").change(function(e){
	//alert("clicked")
								e.preventDefault();
								
								var formData = jQuery(this).serialize();
								$.ajax({
									
									type:"POST",
									url:"optionclick.php",
									data:formData,
									success: function(html){			
									if(html==0){
								
										//alert("No");
										
										return false;
											
										}else{
											//alert("Yes");	
											//alert(ar[inc]);
											//alert(html);
										}
								}
							});		
});
</script>