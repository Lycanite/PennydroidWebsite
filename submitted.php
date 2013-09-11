<?php
	if(isset($_POST['type'])) {
		$type = $_POST['type'];
		
		if($type == "Order") {
			$rawBundle = explode(',', $_POST['bundle']);
			$bundle["name"] = $rawBundle[0];
			$bundle["price"] = $rawBundle[1];
			
			$addonsString = $_POST['addons'];
			$addons = array();
			foreach(explode('|', $addonsString) as $rawAddon) {
				$rawAddonDetails = explode('#', $rawAddon);
				$addons[$rawAddonDetails[0]] = array();
				for($i = 1; $i < count($rawAddonDetails); $i++) {
					$rawAddonDetail = explode('~', $rawAddonDetails[$i]);
					$addons[$rawAddonDetails[0]][$rawAddonDetail[0]] = $rawAddonDetail[1];
				}
			}
			
			$rawHosting = explode('#', $_POST['hosting']);
			$hosting = array();
			$hosting["name"] = $rawHosting[0];
			$hosting["price"] = $rawHosting[1];
			$hosting["monthly"] = $rawHosting[2];
			
			$customerString = $_POST['customer'];
			$customer = array();
			foreach(explode('|', $customerString) as $rawCustomer) {
				$rawCustomerDetails = explode('#', $rawCustomer);
				$customer[$rawCustomerDetails[0]]["name"] = $rawCustomerDetails[1];
				$customer[$rawCustomerDetails[0]]["value"] = $rawCustomerDetails[2];
			}
			
			$emailTo = "weborder@pennydroid.com";
			$emailFrom = $customer["email"]["value"];
			$emailSubject = "New Website Order! From: ".$customer["name"]["value"];
			
			$emailMessage = "A new order has been received!\n\n";
			
			$emailMessage .= "========== Bundle ==========\n";
			$emailMessage .= $bundle["name"].': £'.$bundle["price"];
			$emailMessage .= "\n\n";
			
			$emailMessage .= "========== Addons ==========\n";
			foreach($addons as $addonValue)
				$emailMessage .= $addonValue["name"].' x'.$addonValue["amount"].': £'.($addonValue["price"] * $addonValue["amount"])."\n";
			$emailMessage .= "\n";
			
			$emailMessage .= "========== Hosting ==========\n";
			$emailMessage .= $hosting["name"]."\n";
			$emailMessage .= 'Initial Cost: £'.$hosting["price"]."\n";
			$emailMessage .= 'Monthly Cost: £'.$hosting["monthly"]."\n";
			
			$emailMessage .= "========== Customer ==========\n";
			foreach($customer as $customerKey => $customerValue)
				if($customerKey != "emailConfirm")
					$emailMessage .= $customerValue["name"].': '.$customerValue["value"]."\n";
			$emailMessage .= "\n";
		}

		else if($type == "Contact") {
			$customerString = $_POST['customer'];
			$customer = array();
			foreach(explode('|', $customerString) as $rawCustomer) {
				$rawCustomerDetails = explode('#', $rawCustomer);
				$customer[$rawCustomerDetails[0]]["name"] = $rawCustomerDetails[1];
				$customer[$rawCustomerDetails[0]]["value"] = $rawCustomerDetails[2];
			}
			
			$emailTo = "info@pennydroid.com";
			$emailFrom = $customer["email"]["value"];
			$emailSubject = "Website Contact From: ".$customer["name"]["value"];
			
			$emailMessage = "Someone has contacted us via the website contact form.\n\n";
			$emailMessage .= "========== Contact ==========\n";
			foreach($customer as $customerKey => $customerValue)
				if($customerKey != "emailConfirm")
					$emailMessage .= $customerValue["name"].': '.$customerValue["value"]."\n";
			$emailMessage .= "\n";
			
		}
		
		$emailHeaders = 'From: '.$emailFrom."\r\n".
			'Reply-To: '.$emailFrom."\r\n".
			'X-Mailer: PHP/'.phpversion();
		@mail($emailTo, $emailSubject, $emailMessage, $emailHeaders);
	}
	else
		header('Location: '.$_SERVER["DOCUMENT_ROOT"].'/home.php');
?>

<!doctype html>
<html>
<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>

<!-- ========== Head ========== -->
<?php include($template.'doc_head.php'); ?>

<!-- ========== Body ========== -->
<body>
	
	<!-- ========== Header ========== -->
	<?php include($template.'header.php'); ?>
	
	
	<!-- ========== Main Section Start ========== -->
	<?php include($template.'main_start.php'); ?>
		<div class="wrapper">
	
		<article style="text-align: left">
		<?php
		
		if($type == 'Order') {
			echo '<h3>Thank You for your Order!</h3>
				<p>We\'ll get back to you with a project proposal of your order as soon as we can, from there you can confirm your order or make changes if necessary.</p>
				<p>If you have any queries feel free to <a href="/contact.php">Contact Us</a>.</p>
				<p>You can also phone us: (UK Landline) +44 (0)191 243 7888</p>';
		}
		
		else if($type == 'Contact')	{
			echo '<h3>Thanks for Getting in Touch!</h3>
				<p>We\'ll get back to you as soon as we can, our opening times are 9-5 Monday-Friday.</p>
				<p>You can also phone us: (UK Landline) +44 (0)191 243 7888</p>';
		}
		
		?>
		</article>
	</div>
		
	<!-- ========== Main Section Finish ========== -->
	<?php include($template.'main_end.php'); ?>
	
	
	<!-- ========== Footer ========== -->
	<?php include($template.'footer.php'); ?>
	
</body>