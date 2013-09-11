<!--=====================================
	 |		      Gallery            |
======================================-->
<div class="gallery-wrapper">
    <div id="gallery-00" class="gallery" style="width: <?php echo $galleryWidth; ?>px; height: <?php echo $galleryHeight; ?>px">
    <ul>
		<?php
            $galleryDir = "images/".$galleryDir;
			$galleryImageList = array();
            if($galleryDirHandle = opendir($galleryDir)) {
                while (($testImage = readdir($galleryDirHandle)) !== false) {
					if(preg_match("/\.png$/", $testImage))
						$galleryImageList[] = $testImage;
                    else if(preg_match("/\.jpg$/", $testImage))
                        $galleryImageList[] = $testImage;
                    else if(preg_match("/\.jpeg$/", $testImage))
                        $galleryImageList[] = $testImage;
            
                }
                closedir($galleryDir);
            }
			
			sort($galleryImageList);
            
            foreach($galleryImageList as $galleryImage){
                if($galleryImageLinks == "")
				echo "<li><img src=\"".$galleryDir."/".$galleryImage."\" width=\"".$galleryWidth."\" height=\"".$galleryHeight."\"></li>";
				else
				echo "<li><a href=\"".$galleryImageLinks."\"><img src=\"".$galleryDir."/".$galleryImage."\" width=\"".$galleryWidth."\" height=\"".$galleryHeight."\"></a></li>";
            }
		$galleryImageLinks = "";
        ?>
    </ul>
    </div>

</div>

<script src="../scripts/gallery.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){	
		$("#gallery-00").gallery({
			firstShow: true,
			jumperNumbers: false
		});
	});
</script>