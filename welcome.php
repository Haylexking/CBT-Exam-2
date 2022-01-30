
<?php
session_start();

if (!$_SESSION['stdid']){
	header('location:index.php');
	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CBT EXAM</title>
<link href="style/style.css" type="text/css" rel="stylesheet" />
<link href="style/bootstrap.min.css" type="text/css" rel="stylesheet" />
<style type="text/css">
body {
	background-image: url(images/img02.png);
}
</style>
</head>

<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 header ">
<div class="col-md-3">
<img src="images/logo.gif" class="logo"/>
</div>
<div class="col-md-6">
<div class="headtext" >
 XYZ International School
 </div>
 </div>
 <div class="col-md-3">
 </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="col-md-2">
</div>
<div class="col-md-9">
<div align="center">
  <h3 class="rapi"><strong> <?php  echo $_SESSION['test']; ?>  </strong></h3>
  
<div class="table ">      
  <table class="table">

      <tr>
          <th>Name:</th> <td>  <?php echo $_SESSION['name']; ?>  </td> </tr>
        <tr>
       <th>Username:</th>  <td>  <?php echo $_SESSION['user']; ?>    </td>
        </tr>
        <tr>
        <th>Class:</th>   <td> <?php echo $_SESSION['class']; ?>   </td>
      </tr>
   <tr>
   <th>Department:</th>  <td> <?php echo $_SESSION['dept']; ?>  </td>
      </tr>
 
  </table>
  
 <button type="button" class="btn btn-primary btn-block" onClick=window.location='TestConductor.php?testid=<?php echo $_SESSION['testid'] ?>'>Start Test</button>
  
</div>

</div>

</div>
<div class="col-md-1">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12 footer">
<div class="col-md-3">

</div>
<div class="col-md-6">
<div class="footertext">
 XYZ International School &copy; 2015
</div>
 </div>
 <div class="col-md-3">
 </div>
</div>
</div>


</div>




</body>
</html>