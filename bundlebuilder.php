<!doctype html>
<html>
<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>
<?php $scripts = $_SERVER["DOCUMENT_ROOT"]."/scripts/"; ?>

<!-- ========== Head ========== -->
<?php include($template.'doc_head.php'); ?>

<!-- ========== Body ========== -->
<body>
	
	<!-- ========== Header ========== -->
	<?php include($template.'header.php'); ?>
	
	
	<!-- ========== Main Section Start ========== -->
	<?php include($template.'main_start.php'); ?>
			
			<?php include($scripts.'bundlebuilder.php'); ?>

	<!-- ========== Main Section Finish ========== -->
	<?php include($template.'main_end.php'); ?>
	
	<!-- ========== Footer ========== -->
	<?php include($template.'footer.php'); ?>
	
</body>