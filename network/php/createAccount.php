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
	$table = mysql_real_escape_string($_POST['table']);
	
	// Check If Username Already Exits:
	$userTest = "SELECT id FROM users WHERE username='$user'";
	$userTestOutput = mysql_query($userTest) or die("3:".mysql_error());
	$userTestResult = mysql_fetch_array($userTestOutput);
	if($userTestResult) {
		echo "2:Username $user already exists.";
		exit;
	}
	
	// Execute:
	$query = "INSERT INTO $table VALUES(null, '$user', '$cryptpass', null, null)";
	mysql_query($query) or die("3:".mysql_error());
	
	mysql_close($connection);
	echo "1:User $user created successfully.";

	function cleanInput($input) {
		$clean = substr($input, 0, 256);
		$clean = strip_tags($clean, "");
		$clean = mysql_real_escape_string($clean);
		//$clean = preg_replace("", "", $clean);
		
		return $clean;
	}
?>