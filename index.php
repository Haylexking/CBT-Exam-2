
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CBT EXAM</title>
	<link href="style/style.css" type="text/css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" type="text/javascript"> </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js" type="text/javascript"> </script>
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
					<img src="images/logo.gif" class="logo" />
				</div>
				<div class="col-md-6">
					<div class="headtext">
						XYZ International School
					</div>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3">
				</div>

				<div class="col-md-6 loginform">
					<div align="center">

						<script>
							jQuery(document).ready(function() {
								jQuery(".login").submit(function(e) {
									e.preventDefault();
									var formData = jQuery(this).serialize();
									$.ajax({
										type: "POST",
										url: "login_parse.php",
										data: formData,
										success: function(response) {
											if (response == 'False') {
												//alert(response);
												$.jGrowl("Loading File Please Wait......", {
													sticky: true
												});
												$.jGrowl("Welcome", {
													header: 'Login Successful'
												});
												var delay = 3000;
												setTimeout((function() {
													window.location = 'welcome.php'
												}), delay);

											} else {
												//	alert(response);
												$.jGrowl("You Have Already Taken This Exam", {
													header: 'Access Denied'
												});

											}
										}
									});
									return false;
								});


							});
						</script>



						<h3><strong>Student Login Page</strong></h3>

						<form action="" method="post" name="form1" class="login">
							<label> <strong>Username</strong></label>
							<input name="user" type="email" class="username" required /> <br />
							<label> <strong>Password</strong></label>
							<input name="password" type="password" class="username" required /> <br />
							<input type="submit" name="Button1" class="loginbtn" value="Login" />
						</form>
					</div>

				</div>
				<div class="col-md-3">
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