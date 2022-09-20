<?php
session_start();
include_once('admin/conn.php');
if (!$_SESSION['stdid']) {
	header('location:index.php');
}

$testid = $_GET['testid'];
//timer
$qry = $conn->prepare("SELECT * from test where id='$testid'");
$numrows = $qry->rowCount();
$qry->execute();
if ($numrows > 0) {
	$row = $qry->fetch(PDO::FETCH_ASSOC);

	$init = $row['time'];
	$minute = floor(($init / 60) % 60);
	$sec = $init % 60;
}

//$qry3=mysql_query("insert into testattempt(stdid,testid,quid) values(".$_SESSION['stdid'].",'121',".$fetch['id'].")")



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CBT EXAM</title>
	<link href="style/style.css" type="text/css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" type="text/javascript"> </script>
	<script type="text/javascript" src="style/jquery/jquery.countdown.pack.js"></script>
	<style type="text/css">
		body {
			background-image: url(images/img02.png);
		}
	</style>
</head>

<body onload="test()">
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
				<div class="col-md-2">
				</div>
				<div class="col-md-9">
					<div align="center">

						<div class="clock">
							<!--<span class="countdown">0</span>minutes-->
							<span align="center" style="font-size:24px; background:#FFF;"><span style="color:black;" class="min"><?php echo $minute; ?></span><span style="color:white;"> <span style="color:black"> : </span></span><span style="color:black;" class="sec"><?php echo $sec; ?></span></span>

							<!-- <ul class="nav nav-tabs">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">Menu 1</a></li>
    <li><a href="#">Menu 2</a></li>
    <li><a href="#">Menu 3</a></li>
  </ul>-->

							<table class=" table">


								<tr>
									<td>

										<div id="questions">

										</div>
										<form action="process_ans.php" name="form1" class="login" id="form1">
											<input name="qn" type="hidden" id="qn" />
											<input name="qnarray" type="hidden" id="qn1" />
											<input name="qnarray2" type="hidden" id="qn2" />
											<input name="Preview" type="button" class="prev btn btn-primary" value="Previous" onclick="prev()" />
											<input name="next" type="Button" class="nextq btn btn-primary" value="Next" onclick="test()" />
											<input name="Submit" type="button" class="sub btn btn-primary" value="Submit" />
										</form>
									</td>
								</tr>
							</table>

						</div>

					</div>
					<div class="col-md-1">
					</div>
				</div>
			</div>
			<?php





			//to count questions
			$qry2 = $conn->prepare("select * from question where qclass='" . $_SESSION['class'] . "' and test='" . $_SESSION['test'] . "'");
			$numrows = $qry2->rowCount();

			//echo $numrows;
			?>

			<!-- TAB ONE script -->
			<script type="text/javascript">
				var totalq = <?php echo $numrows; ?>

				function countdown() {
					var m = $('.min');
					var s = $('.sec');
					if (m.html() == 0 && parseInt(s.html()) <= 0) {
						$('.clock').html('Time UP.');
						$('#questions').hide();
						$('.nextq').hide();
						$('.prev').hide();
						submittest();
					}
					if (parseInt(s.html()) <= 0) {
						m.html(parseInt(m.html() - 1));
						s.html(60);
					}
					if (parseInt(s.html()) <= 0) {
						$('.clock').html('<span class="sec">59</span> seconds. ');
					}
					s.html(parseInt(s.html() - 1));
				}
				setInterval('countdown()', 1000);



				var inc = -1;

				for (var i = 1, ar = []; i <= totalq; i++) {
					ar[i] = i;
				}

				// randomize the array
				ar.sort(function() {
					return Math.random() - 0.5;
				});
				// console.log(ar.pop());
				//console.log(ar);





				function test() {

					if (inc > totalq - 3) {
						//  code
						//alert("Final")
						$('.nextq').fadeOut()
						// $('.prev').fadeOut()
					}
					inc++;
					$('#qn').val(inc);
					$('#qn1').val(ar);
					console.log(inc);
					$('#qn2').val(ar[inc]);
					//alert(stclass);
					// To process student answer 
					var qn = $('#qn2').val();
					var cor = $('#qn3').val();

					$(document).ready(function(e) {

						//alert(totalq);
						$('.prev').hide()
						var formData = jQuery(this).serialize();
						$.ajax({
							type: "POST",
							url: "questions.php?qno=" + ar[inc],
							data: formData,
							success: function(html) {
								if (html == 0) {

									//alert("something is wrong");

									return false;

								} else {
									//alert("everything is alright");	
									//alert(ar[inc]);
									//alert(html);
									$('#questions').empty(html)
									$('#questions').append(html)

								}
							}
						});



						//to insert values into database on form load before updating on option click

						$.ajax({


							type: "POST",
							url: "process_ans.php?qno=" + ar[inc],
							data: formData,
							success: function(html) {
								if (html == 0) {

									//alert("something is wrong");

									return false;

								} else {
									//alert("everything is alright");	
									//alert(ar[inc]);
									//alert(html);

								}
							}
						});



						jQuery(".nextq").click(function(e) {
							$('.prev').show()
							e.preventDefault();
							//alert(totalq);
							var formData = jQuery(this).serialize();
							$.ajax({

								type: "POST",
								url: "questions.php?qno=" + ar[inc],
								data: formData,
								success: function(html) {
									if (html == 0) {

										//alert("something is wrong");

										return false;

									} else {
										//alert("everything is alright");	
										//alert(ar[inc]);
										//alert(html);
										$('#questions').empty(html)
										$('#questions').append(html)

									}
								}
							});

						});
					});
				}

				//previous

				function prev() {

					if (inc < 2) {
						//  code
						//alert("Final")
						$('.prev').fadeOut()
					}
					inc--;
					$('#qn').val(inc);
					$('#qn1').val(ar);
					console.log(inc);
					$('#qn2').val(ar[inc]);
					//alert(stclass);
					// To process student answer 
					var qn = $('#qn2').val();
					var cor = $('#qn3').val();

					$(document).ready(function(e) {

						//alert(totalq);

						var formData = jQuery(this).serialize();
						$.ajax({
							type: "POST",
							url: "questions.php?qno=" + ar[inc],
							data: formData,
							success: function(html) {
								if (html == 0) {

									//alert("something is wrong");

									return false;

								} else {
									//alert("everything is alright");	
									//alert(ar[inc]);
									//alert(html);
									$('#questions').empty(html)
									$('#questions').append(html)

								}
							}
						});




						//to insert values into database on form load before updating on option click

						$.ajax({


							type: "POST",
							url: "process_ans.php?qno=" + ar[inc],
							data: formData,
							success: function(html) {
								if (html == 0) {

									//alert("something is wrong");

									return false;

								} else {
									//alert("everything is alright");	
									//alert(ar[inc]);
									//alert(html);

								}
							}
						});





						jQuery(".prev").click(function(e) {

							e.preventDefault();
							//alert(totalq);
							$('.nextq').show()
							var formData = jQuery(this).serialize();
							$.ajax({

								type: "POST",
								url: "questions.php?qno=" + ar[inc],
								data: formData,
								success: function(html) {
									if (html == 0) {

										//alert("something is wrong");

										return false;

									} else {
										//alert("everything is alright");	
										//alert(ar[inc]);
										//alert(html);
										$('#questions').empty(html)
										$('#questions').append(html)

									}
								}
							});

						});
					});
				}







				//submit
				jQuery(".sub").click(function(e) {
					$('.prev').hide()
					$('.nextq').hide()
					$('.sub').hide()
					e.preventDefault();
					//alert(totalq);
					var formData = jQuery(this).serialize();
					$.ajax({

						type: "POST",
						url: "Submit.php",
						data: formData,
						success: function(html) {
							if (html == 0) {

								//alert("something is wrong");

								return false;

							} else {
								//alert("everything is alright");	
								//alert(ar[inc]);
								//alert(html);

								$('#questions').fadeIn()
								$('#questions').text("THANKS FOR ATTEMPTING THE TEST, CHECK OUR WEBSITE FOR YOUR SCORE!")

								var delay = 3000;
								setTimeout((function() {
									window.location = 'index.php'
								}), delay);


							}
						}
					});

				});
			</script>

			<!--END OF TAB ONE script -->






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