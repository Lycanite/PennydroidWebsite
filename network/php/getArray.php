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
	if(!$userID) {
		echo "2:Incorrect username or password.";
		exit;
	}
	$table = cleanInput($_POST['table']);
	$value = cleanInput($_POST['value']);
	
	// Execute:
	$query = "SELECT $value FROM $table WHERE id='$userID'";
	$output = mysql_query($query) or die("3:".mysql_error());
	$resultArray = array();
	$arrayCount = 0;
	while($resultEntry = mysql_fetch_row($output)) {
		$resultArray[$arrayCount] = $resultEntry[0];
		$arrayCount++;
	}
	$result = join(":", $resultArray);
	echo "1:$result";
	
	mysql_close($connection);

	function cleanInput($input) {
		$clean = substr($input, 0, 256);
		$clean = strip_tags($clean, "");
		$clean = mysql_real_escape_string($clean);
		//$clean = preg_replace("", "", $clean);
		
		return $clean;
	}
?>