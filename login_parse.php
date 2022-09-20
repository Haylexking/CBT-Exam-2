<?php
session_start();
ob_start();
require('admin/conn.php');


if (isset($_POST['user'])) {
	$name = $_POST['user'];
	$pass = $_POST['password'];

	$query = $conn->prepare("SELECT * FROM student  WHERE username=:username");
	$query->bindParam("username", $name, PDO::PARAM_STR);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
	if (($result)) {
		$password_verify = ($pass === $result['password']) ? true : false;


		if ($password_verify) {

			$result = $result;
			$_SESSION['stdid'] = $result['id'];
			$_SESSION['user'] = $result['username'];
			$_SESSION['name'] = $result['fullname'];
			$_SESSION['class'] = $result['class'];
			$_SESSION['dept'] = $result['dept'];


			$qry = $conn->prepare("SELECT * FROM test where class=:class");
			$qry->bindParam("class", $result['class']);

			$qry->execute();
			$rslt = $qry->fetch(PDO::FETCH_ASSOC);

			if ($rslt) {

				$_SESSION['test'] = $rslt['name'];
				$_SESSION['testid'] = $rslt['id'];
				$sql = $conn->prepare("SELECT * from testattempt where stdid=" . $_SESSION['stdid'] . " and testid=" . $_SESSION['testid'] . "");
				$sql->execute();
				$numrows3 = $sql->fetch(PDO::FETCH_ASSOC);

				if ($numrows3 != '') {

					echo 'True';
				} else {
					echo 'False';
				}
			}
		}
	} else {
		echo 'error';
	}
}
