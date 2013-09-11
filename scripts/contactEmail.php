<!doctype html>
<html>
<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>

<?php
	$email_to = "info@pennydroid.com";
	$email_subject = "Website Contact: ".$_POST['subject'];
	$email_failed = false;
	
	
	// Check for Required Fields:
	if(
		!isset($_POST['name']) ||
		!isset($_POST['subject']) ||
		!isset($_POST['email'])
	) {
		$error_message = "Please fill in all the required fields.";
		$email_failed = true;
	}
	
	$name = $_POST['name'];
	$company = $_POST['company'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$subject = $_POST['subject'];
	if($subject == "Other") {
		$subjectOther = $_POST['subjectOther'];
	}
	$comments = $_POST['comments'];
	$mailingList = $_POST['mailingList'];
	
	$error_message = "";
	
	
	// Check for Valid Inputs:
	$email_check = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if(!preg_match($email_check, $email)) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	}
	
	$string_check = "/^[A-Za-z .'-]+$/";
	if(!preg_match($string_check, $name)) {
		$error_message .= 'The Name you entered does not appear to be valid.<br />';
	}
	
	if(strlen($error_message) > 0) {
		$email_failed = true;
	}
	
	
	// Send Email:
	if(!$email_failed) {
		
		// Clean Input of Possible Nastyness!
		function clean_string($string) {
			$bad = array("content-type","bcc:","to:","cc:","href");
			return str_replace($bad,"",$string);
		}
		
		// Compose Email:
		$email_message = "Contact Information\nSubject: " . $subject;
		if(strlen($subjectOther) > 0)
			$email_message .= " - " . $subjectOther;
		$email_message .= "\n\nName: " . clean_string($name);
		$email_message .= "\nCompany: " . clean_string($company);
		$email_message .= "\nEmail: " . clean_string($email);
		$email_message .= "\nTelephone: " . clean_string($telephone);
		$email_message .= "\nAdd to Mailing List? ";
		if($mailingList == 'yes') $email_message .= "Yes";
		else $email_message .= "No";
		$email_message .= "\nComments:\n" . clean_string($comments);
		
		$headers = 'From: ' . $email . "\r\n".
				'Reply-To: ' . $email . "\r\n".
				'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);
		
	} ?>

	<?php if(!$email_failed) {
		$headerTitle = "Thank You!";
		include($template.'basic_page_start.php');  ?>
		<p>Thanks for getting in touch <?php echo $name ?>! We'll get back to you shortly!</p>
		<p><a href="/contact.php"> Head back to the Contact Page</a>.</p>
	
	<?php } else {
		$headerTitle = "Oops there was a problem!";
		include($template.'basic_page_start.php'); ?>
		<p><?php echo $error_message ?></p>
		<p>Please head back to the <a href="#" onclick="history.go(-2)">Contact Page</a> and try again.</p>
	<?php } ?>

<?php include($template.'basic_page_end.php');