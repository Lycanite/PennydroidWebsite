<!doctype html>
<html>
<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>

<!-- ========== Head ========== -->
<?php include($template.'doc_head.php'); ?>

<!-- ========== Body ========== -->
<body>
	
	<!-- ========== Header ========== -->
	<?php
		//$headerGalleryDir = "banners";
		$headerTitle = "About Your Website";
		include($template.'header.php');
	?>
	
	
	<!-- ========== Main Section Start ========== -->
	<?php include($template.'main_start.php'); ?>
		
		<form name="designinfoForm" method="post" action="" style="text-align: center;">
			<textarea id="input" maxlength="10000000" cols="26" rows="6" style="width: 40%;"></textarea>
			<textarea id="output" maxlength="10000000" cols="26" rows="6" style="width: 40%;"></textarea>
			<a href="javascript:void(0);" onclick="assessEmails();" id="formSubmitAction" style="text-decoration: none">
				<h3><div id="formSubmitButton" class="button">Submit</div></h3>
			</a>
		</form>
		
	<!-- ========== Main Section Finish ========== -->
	<?php include($template.'main_end.php'); ?>
	
	
	<!-- ========== Footer ========== -->
	<?php include($template.'footer.php'); ?>
	
	
	<!-- ========== Scripts ========== -->
	<script>
		var input = $('#input');
		var output = $('#output');
		var inputArray;
		var outputText = "";
		
		function assessEmails() {
			inputArray = input.val().split('\n');
			outputText = "";
			for(inputN in inputArray) {
				outputText += (inputArray[inputN]).replace(/[^a-zA-Z0-9@._-]/g, '') + "\n";
			}
			output.text(outputText);
		}
	</script>
	
</body>