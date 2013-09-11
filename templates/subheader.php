<!--[if lt IE 9]><div id="header-gallery"><![endif]-->
<section id="header-gallery">
	<div class="wrapper">
		<?php
			if(isset($headerGalleryDir) && $headerGalleryDir != "") {
				$galleryDir = $headerGalleryDir;
				$galleryWidth = 800;
				$galleryHeight = 256;
				$galleryImageLinks = "/services.php";
				include($template.'gallery.php');
			}
			
			else if(isset($headerTitle) && $headerTitle != "") {
				echo "<h1 style=\"padding-left: 64px;\">".$headerTitle."</h1>";
			}
			
			$headerGalleryDir = "";
			$headerTitle = "";
		?>
	</div>
</section>
<!--[if lt IE 9]></div><![endif]-->