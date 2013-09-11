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
		<div class="wrapper" style="text-align: center;">
		<img src="/images/projects/pennySpeechProjects.png" style="padding-bottom: 32px;"/><br/>
		
		<a href="http://dmcservice.co.uk" target="_blank"><img src="/images/projects/dmcProject.png"></a>
		
		<img src="/images/projects/denchiProject.png">
		
		<img src="/images/projects/pennydroidProject.png">
	</div>
		
	<!-- ========== Main Section Finish ========== -->
	<?php include($template.'main_end.php'); ?>
	
	
	<!-- ========== Footer ========== -->
	<?php include($template.'footer.php'); ?>
	
</body>