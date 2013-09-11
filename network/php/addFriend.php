<?php
	// Start Connection:
	$key = $_POST['key'];
	$database = $_POST['database'];
	$connection = mysql_connect("sql.byethost5.org:3306", "pennydro_$database", $key) or die("3:".mysql_error());
	mysql_select_db("pennydro_$database", $connection);
	
	// Get User Details:
	$user = cleanInput($_POST['user']);
	$pass = cleanInput($_POST['pass']);
	$cryptpass = crypt(md5($pass), md5($user));
	$userIDTest = "SELECT id FROM users WHERE username='$user' AND password='$cryptpass'";
	$userIDOutput = mysql_query($userIDTest) or die("3:".mysql_error());
	$userIDResult = mysql_fetch_array($userIDOutput);
	$userID = $userIDResult[0];
	$query = cleanInput($_POST['query']);
	$search = cleanInput($_POST['search']);
	
	if(!$userID) {
		echo "2:Incorrect username or password.";
		exit;
	}
	$friendID = cleanInput($_POST['friendID']);
	$friendName = cleanInput($_POST['friendName']);
	
	// Execute:
	$query = "INSERT INTO friends(id, friend_id, friend_name) VALUES('$userID', '$friendID', '$friendName')";
	$output = mysql_query($query) or die("3:".mysql_error());
	$result = mysql_fetch_array($output);
	echo "1:Success.";
	
	mysql_close($connection);

	function cleanInput($input) {
		$clean = substr($input, 0, 256);
		$clean = strip_tags($clean, "");
		$clean = mysql_real_escape_string($clean);
		//$clean = preg_replace("", "", $clean);
		
		return $clean;
	}
?>