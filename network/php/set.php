<?php
	// Start Connection:
	include $_SERVER['DOCUMENT_ROOT']."/sql/databaseKey.php";
	$connection = mysql_connect("sql.byethost5.org:3306", $databaseUser, $databaseKey) or die("3:".mysql_error());
	mysql_select_db("pennydro_button", $connection);
	
	// Get User Details:
	$user = strtolower(cleanInput($_POST['user']));
	$pass = cleanInput($_POST['pass']);
	$cryptpass = crypt(md5($pass), md5($user));
	$userIDTest = "SELECT id FROM users WHERE username='$user' AND password='$cryptpass'";
	$userIDOutput = mysql_query($userIDTest) or die("3:".mysql_error());
	$userIDResult = mysql_fetch_array($userIDOutput);
	$userID = $userIDResult[0];
	if(!$userID) {
		echo "2:Incorrect username or password.";
		exit;
	}
	$table = cleanInput($_POST['table']);
	$value = cleanInput($_POST['value']);
	$input = cleanInput($_POST['input']);
	
	// Test Value:
	$valueTest = "SELECT $value FROM $table WHERE id='$userID'";
	$valueTestOutput = mysql_query($valueTest) or die("3:".mysql_error());
	$valueResult = mysql_fetch_array($valueTestOutput);
	
	// Execute:
	if(!$valueResult) {
		$query = "INSERT INTO $table(id, $value) VALUES('$userID', '$input')";
	}
	else {
		$query = "UPDATE $table SET $value='$input' WHERE id='$userID'";
	}
	mysql_query($query) or die("3:".mysql_error());
	echo "1:success";
	
	mysql_close($connection);

	function cleanInput($input) {
		$clean = substr($input, 0, 256);
		$clean = strip_tags($clean, "");
		$clean = mysql_real_escape_string($clean);
		//$clean = preg_replace("", "", $clean);
		
		return $clean;
	}
?>