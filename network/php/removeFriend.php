<?php
	// Start Connection:
	include $_SERVER['DOCUMENT_ROOT']."/sql/databaseKey.php";
	$connection = mysql_connect("sql.byethost5.org:3306", $databaseUser, $databaseKey) or die("3:".mysql_error());
	mysql_select_db("pennydro_button", $connection);
	
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
	
	// Execute:
	$query = "DELETE FROM friends WHERE friend_id='$friendID'";
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