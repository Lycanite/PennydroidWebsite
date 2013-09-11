<!doctype html>
<html>
<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>

<!-- ========== Head ========== -->
<?php include($template.'doc_head.php'); ?>

<!-- ========== Body ========== -->
<body>
	
	<!-- ========== Header ========== -->
	<?php
		$showHeader = false;
		include($template.'header.php');
	?>
	
	<?php include($template.'main_start.php'); ?>
			
		<div class="wrapper" style="text-align: center;">
			<img src="images/home/pennySpeech.png" style="margin-bottom: 32px;"/>
			
			<div class="divider-horizontal-large"></div>
			
			<a href="/bundlebuilder.php"><img src="images/home/3Steps.png" style="margin-bottom: 32px;"/></a>
			<br/>
			<a href="/bundlebuilder.php"><div style="position: relative; display: inline-block; width: 700px; height: 276px;">
				<img src="images/home/step1Info.png" style="position: absolute; left: 0; top: 0;"/>
				<img src="images/home/step2Info.png" style="position: absolute; left: 222px; bottom: 0;"/>
				<img src="images/home/step3Info.png" style="position: absolute; right: 0; top: 0;"/>
			</div></a>
			
			<div class="divider-horizontal-large"></div>
		</div>
		
		<div class="wrapper">
			<table style="width: 100%;">
				<tr>
					<td style="width: 25%;"></td>
					<td style="width: 320px; padding: 0 32px; text-align: center;"><a href="/bundlebuilder.php"><img src="images/home/step1.png" style="width: 162px;"/></a></td>
					<td style="width: 25%;"></td>
					<td style="width: 320px; padding: 0 32px; text-align: center;"><a href="/bundlebuilder.php"><img src="images/home/step2.png" style="width: 162px;"/></a></td>
					<td style="width: 25%;"></td>
					<td style="width: 320px; padding: 0 32px; text-align: center;"><a href="/bundlebuilder.php"><img src="images/home/step3.png" style="width: 162px;"/></a></td>
					<td style="width: 25%;"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<h4>Bundle Builder!</h4>
						<p>Using our unique and easy to use bundle builder, you can customize your bundle to ensure your website includes all the aspects it needs.</p>
						<h4>Working on a budget?</h4>
						<p>No problem! Our bundle builder will show you exactly how much each service costs. The price you see is the price you get. We'll never catch you out with unexpected extras.</p>
						<h4>Website Plan!</h4>
						<p>Once your order is complete we'll check back to make sure you're happy with what we've got planned for your website.</p>
					</td>
					<td></td>
					<td>
						<h4>Info Submission Page!</h4>
						<p>After ordering your website, we'll need to know the specifics of your business to ensure your new website speaks your message to your customers. Our info submission couldn't be simpler. Just fill out one simple web based form and we'll do the rest.</p>
						<h4>Leave it to us!</h4>
						<p>We understand the value of time when it comes to managing a small business. Once you've filled out our info form, we'll take care of everything from there. Leaving you free to handle what's important to you, your business. If you'd like to take a more 'hands-on' approach, you can always send an email or give us a call and see how we're getting along with the devlopment of your site.</p>
					</td>
					<td></td>
					<td>
						<h4>Watch Your Business Grow!</h4>
						<p>Your site is your businesses virtual 'shop window'. With Pennydroid you can be sure that your business online image is shown in the best possible light.</p>
						<h4>On-Going Support!</h4>
						<p>Those who opt in to our web hosting addon will enjoy on-going help and support. We'll ensure your site stays up-to-date as well as maintaining your special offers or promotional graphics.</p>
						<h4>Not Hosting? What's Next?</h4>
						<p>Should you decide not to host with us, thats no trouble. We'll provide you with all the files you need, complete with instructions on how to get your site online with your chosen web host.</p>
					</td>
					<td></td>
				</tr>
			</table>
		</div>
	<?php include($template.'main_end.php'); ?>
	
	
	<!-- ========== Footer ========== -->
	<?php include($template.'footer.php'); ?>
	
</body>