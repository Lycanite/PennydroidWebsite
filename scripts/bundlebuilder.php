<?php
	
	// Bundle Database:
	$bundles = array(
		"a" => array(
			"name" => "Bundle A",
			"description" => "A neat compact website with all your company information and images displayed.",
			"price" => 70,
			"pages" => 2,
			"addons" => array(),
		),
		
		"b" => array(
			"name" => "Bundle B",
			"description" => "A large informative site of up to five pages with a number of advanced addons included.",
			"price" => 180,
			"pages" => 5,
			"addons" => array("gallery", "imap", "seo"),
		),
		
		"c" => array(
			"name" => "Bundle C",
			"description" => "A large social site of up to three pages that specializes in social networking.",
			"price" => 145,
			"pages" => 3,
			"addons" => array("social", "imap", "video"),
		),
	);
	
	// Addon Database:
	$addons = array(
		"page" => array (
			"name" => "Additional Pages",
			"description" => "Sometimes you need extras pages to ensure that you can display products and services to your customers.",
			"price" => 20,
			"min" => 1,
			"max" => 10,
		),
		
		"logo" => array (
			"name" => "Logo Re/Design",
			"description" => "Your company's image is everything. Why not let us design a company logo for you? If you already have one, we can bring it back to life with a modern design.",
			"price" => 50,
			"min" => 1,
			"max" => 1,
		),
		
		"gallery" => array (
			"name" => "Image Gallery",
			"description" => "Eye catching visuals can make good sites truly great. With this dynamic scrolling/fading image gallery, you can show off multiple images without using lots of space.",
			"price" => 40,
			"min" => 1,
			"max" => 1,
		),
		
		"video" => array (
			"name" => "Video Embedding",
			"description" => "Embed videos (YouTube, Vimeo, etc) into your website, allowing viewers to watch your video content without leaving your site.",
			"price" => 10,
			"min" => 1,
			"max" => 1,
		),
		
		"mobile" => array (
			"name" => "Mobile Site",
			"description" => "Sites can get messy on mobile. When mobile browsing have your site redirect to a ready made mobile site; showing all your company's relevent information in a presentable and compact display.",
			"price" => 30,
			"min" => 1,
			"max" => 1,
		),
		
		"imap" => array (
			"name" => "Interactive Google Map",
			"description" => "An interactive map embedded into your site allows the user to see exactly how to visit your location without leaving your web page.",
			"price" => 25,
			"min" => 1,
			"max" => 1,
		),
		
		"social" => array (
			"name" => "Social Network Intergration",
			"description" => "As the internet grows, social sites like Facebook or Twitter should become important to your business, we can intergrate them into your site; allowing users to like, comment, etc without leaving your page.",
			"price" => 35,
			"min" => 1,
			"max" => 1,
		),
		
		"blog" => array (
			"name" => "Blog Embedding",
			"description" => "Keep your customers updated on important information or general chit chat, through popular blogging sites without them leaving your webpage.",
			"price" => 35,
			"min" => 1,
			"max" => 1,
		),
		
		"seller" => array (
			"name" => "Seller Intergration",
			"description" => "If your business relies on 3rd party sellers like Ebay or Amazon, we can intergrate them into your site. Allowing customers to browse your goods without leaving your website.",
			"price" => 35,
			"min" => 1,
			"max" => 1,
		),
		
		"seo" => array (
			"name" => "Search Engine Optimisation",
			"description" => "Nothing is more important than increasing the visitor count of your site. More hits means more sales. Our SEO package will help potential customers find your site on search engines such as Google, Yahoo and Bing.",
			"price" => 20,
			"min" => 1,
			"max" => 1,
		),
	);
	
	// Hosting Services Database:
	$hosting = array(
		"a" => array(
			"name" => "Web Hosting and Domain Name Registration",
			"price" => 5,
			"monthly" => 5,
		),
		
		"b" => array(
			"name" => "Web Hosting",
			"price" => 0,
			"monthly" => 5,
		),
		
		"c" => array(
			"name" => "No Hosting",
			"price" => 0,
			"monthly" => 0,
		),
	);
	
	// Customer Info Database:
	$customer = array(
		"name" => array(
			"name" => "Name",
			"description" => "What's your name?",
			"type" => "box",
			"filter" => "name",
			"importance" => "required",
		),
		
		"company" => array(
			"name" => "Company",
			"description" => "What's your company name?",
			"type" => "box",
			"filter" => "mixed",
			"importance" => "required",
		),
		
		"email" => array(
			"name" => "Email",
			"description" => "What's your email address?",
			"type" => "box",
			"filter" => "email",
			"importance" => "required",
		),
		
		"emailConfirm" => array(
			"name" => "Email Confirmation",
			"description" => "Confirm your email address!",
			"type" => "box",
			"filter" => "confirm",
			"importance" => "required",
		),
		
		"phone" => array(
			"name" => "Telephone",
			"description" => "What's your telephone number?",
			"type" => "box",
			"filter" => "number",
			"importance" => "required",
		),
		
		"comments" => array(
			"name" => "Comments",
			"description" => "What's your company name?",
			"type" => "area",
			"filter" => "mixed",
			"importance" => "optional",
		),
	);
	
	
	//=========================== Generate Styles ===========================
	// Bundles:
	foreach($bundles as $bundleKey => $bundleValue) {
		echo '
			<style>
				.bundle-box-'.$bundleKey.' {
					display: inline-block;
					position: relative;
					width: 320px;
					height: 460px;
					margin: 8px 8px;
					z-index: 1;
					background-size: cover;
				}
				.bundle-box-'.$bundleKey.'.selected {
					background-image: url("/images/bundlebuilder/bundle/bundle-'.$bundleKey.'-selected.png");
				}
				.bundle-box-'.$bundleKey.':before {
					content: "";
					width: 100%;
					height: 100%;
					left: 0px;
					top: 0px;
					position: absolute;
					background-image: url("/images/bundlebuilder/bundle/bundle-'.$bundleKey.'.png");
					background-size: cover;
				}
			</style>
		';
	}
	
	// Addons:
	$addonShape = 1;
	foreach($addons as $addonKey => $addonValue) {
		echo '
			<style>
				.addon-'.$addonKey.' {
					display: inline-block;
					position: relative;
					width: 278px;
					height: 270px;
					margin: 8px 8px;
					background-size: cover;
				}
				.addon-'.$addonKey.'.selected {
					background-image: url("/images/bundlebuilder/addon'.$addonShape.'Selected.png");
				}
				.addon-'.$addonKey.'.included {
					background-image: url("/images/bundlebuilder/addon'.$addonShape.'Included.png");
				}
				
				.addon-'.$addonKey.':before {
					content: "";
					width: 100%;
					height: 100%;
					left: 0px;
					top: 0px;
					position: absolute;
					background-image: url("/images/bundlebuilder/addon/addon-'.$addonKey.'.png");
					background-size: cover;
				}
				#addon-'.$addonKey.'-price {
					width: 40px;
					height: 64px;
					text-align: center;';
					if($addonShape == 1)
						echo 'right: 16px;
						top: 20px;';
					else
						echo 'right: 36px;
						top: 16px;';
					echo 'position: absolute;
					
					font-size: 20px;
					color: #FFF;
					text-shadow: 1px 1px 1px #000;
				}
				.addon-'.$addonKey.'.included #addon-'.$addonKey.'-price {
					text-decoration: line-through;
				}
				
				#addon-'.$addonKey.'-qty {
					display: inline-block;
					text-align: center;
					font-size: 28px;
					color: #FFF;
				}
			</style>
		';
		if($addonShape == 1) $addonShape = 2;
		else $addonShape = 1;
	}
	echo '
		<style>
			.addon-qty {
				width: 100%;
				height: 64px;
				text-align: center;
				vertical-align: center;
				left: 0px;
				bottom: 0px;
				position: absolute;
				
				font-size: 28px;
				color: #FFF;
			}
		</style>
	';
	
	// Hosting:
	$hostingShape = 1;
	foreach($hosting as $hostingKey => $hostingValue) {
		echo '
			<style>
				.hosting-box-'.$hostingKey.' {
					display: inline-block;
					position: relative;
					width: 278px;
					height: 270px;
					margin: 8px 8px;
					z-index: 1;
					background-size: cover;
				}
				.hosting-box-'.$hostingKey.'.selected {
					background-image: url("/images/bundlebuilder/addon'.$hostingShape.'Selected.png");
				}
				.hosting-box-'.$hostingKey.':before {
					content: "";
					width: 100%;
					height: 100%;
					left: 0px;
					top: 0px;
					position: absolute;
					background-image: url("/images/bundlebuilder/host/webHost-'.$hostingKey.'.png");
					background-size: cover;
				}
				#hosting-'.$hostingKey.'-price {
					width: 40px;
					height: 64px;
					text-align: center;
					vertical-align: center;';
					if($addonShape == 1)
						echo 'right: 16px;
						top: 20px;';
					else
						echo 'right: 16px;
						top: 20px;';
					echo 'position: absolute;
					
					font-size: 20px;
					color: #FFF;
					text-shadow: 1px 1px 1px #000;
				}
				#hosting-'.$hostingKey.'-monthly {
					width: 64px;
					height: 64px;
					text-align: center;
					vertical-align: center;';
					if($hostingShape == 1)
						echo 'right: 4px;
						top: 88px;';
					else
						echo 'right: 6px;
						top: 84px;';
					echo 'position: absolute;
					
					font-size: 16px;
					color: #FFF;
					text-shadow: 1px 1px 1px #000;
				}
			</style>
		';
		if($hostingShape == 1) $hostingShape = 2;
		else $hostingShape = 1;
	}
	
	// Customer Info:
	echo '
		<style>
			#customerInfo {
				display: inline-block;
				width: 684px;
				height: 390px;
				padding-top: 44px;
				background-image: url("/images/form/border.png");
			}
			.text-box {
				position: relative;
				display: inline-block;
				width: 256px;
				height: 44px;
				background: none;
			}
			.text-box:before {
				content: "";
				width: 100%;
				height: 100%;
				left: 0px;
				top: 0px;
				position: absolute;
				background-image: url("/images/form/textbox.png");
				pointer-events: none;
			}
			.text-box input {
				width: 228px;
				height: 100%;
				left: 4px;
				padding: 0px;
				
				background: none;
				border: none;
				box-shadow: none;
				
				font-size: 18px;
				color: #FFF;
				text-shadow: 1px 1px 1px #000;
			}
			.text-box.selected {
				background-image: url("/images/form/textbox-selected.png");
			}
			.text-box.valid {
				background-image: url("/images/form/textbox-valid.png");
			}
			.text-box.invalid {
				background-image: url("/images/form/textbox-invalid.png");
			}
			.text-box input:focus {
				background: none;
				border: none;
				box-shadow: none;
				outline: none;
			}
			.text-area {
				position: relative;
				display: inline-block;
				width: 256px;
				height: 118px;
				background: none;
			}
			.text-area.selected {
				background-image: url("/images/form/textarea-selected.png");
			}
			.text-area.valid {
				background-image: url("/images/form/textarea-valid.png");
			}
			.text-area.invalid {
				background-image: url("/images/form/textarea-invalid.png");
			}
			.text-area:before {
				content: "";
				width: 100%;
				height: 100%;
				left: 0px;
				top: 0px;
				position: absolute;
				background-image: url("/images/form/textarea.png");
				pointer-events: none;
			}
			.text-area textarea {
				width: 228px;
				height: 72px;
				left: 4px;
				padding-top: 8px;
				padding-bottom: 24px;
				resize: none;
				
				background: none;
				border: none;
				box-shadow: none;
				
				font-size: 12px;
				color: #FFF;
				text-shadow: 1px 1px 1px #000;
			}
			.text-area textarea:focus {
				background: none;
				border: none;
				box-shadow: none;
				outline: none;
			}';
			foreach($customer as $customerKey => $customerValue) {
				echo '#'.$customerKey.'-text {
					display: inline-block;
					width: 320px;';
					if($customerValue["type"] == "box")
						echo 'height: 44px;';
					else
						echo 'height: 118px;';
					echo 'background-image: url("/images/form/text-'.$customerKey.'.png");
				}';
			}
			
			echo '#submit-button {
				position: absolute;
				width: 256px;
				height: 78px;
				top: 32px;
				left: 16px;
				background-image: url("/images/bundlebuilder/submitOrder.png");
			}
			#submit-button.disabled {
				background-image: url("/images/bundlebuilder/submitOrderDisabled.png");
			}
		</style>
	';
	
	// Price Box:
	echo '
		<style>
			#price-box {
				width: 102px;
				height: 198px;
				right: 0px;
				top: 50%;
				position: fixed;
				background-image: url("/images/bundlebuilder/priceBar.png");
				background-size: cover;
			}
			#price-tag {
				width: 64px;
				height: 64px;
				text-align: left;
				vertical-align: center;
				left: 28px;
				top: 40px;
				position: absolute;
				
				font-size: 32px;
				font-weight: bold;
				color: #FFF;
				text-shadow: 1px 1px 1px #000;
			}
			
			#monthly-box {
				width: 102px;
				height: 198px;
				right: 0px;
				top: 50%;
				position: fixed;
				background-image: url("/images/bundlebuilder/monthlyBar.png");
				background-size: cover;
				
				transition: right 2s;
				-webkit-transition: right 1s;
			}
			#monthly-box.hidden {
				right: -104px;
			}
			#monthly-tag {
				width: 64px;
				height: 64px;
				text-align: left;
				vertical-align: center;
				left: 42px;
				top: 148px;
				position: absolute;
				
				font-size: 18px;
				font-weight: bold;
				color: #FFF;
				text-shadow: 1px 1px 1px #000;
			}
		</style>
	';
	
	// Price Bar:
	echo '
		<style>
			#price-bar {
				width: 100%;
				height: 100%;
				right: 0px;
				top: 0px;
				position: absolute;
				background-image: url("/images/bundlebuilder/priceBarFooter.png");
				background-size: cover;
			}
			#price-bar-tag {
				width: 128px;
				height: 64px;
				text-align: left;
				vertical-align: center;
				left: 200px;
				top: 16px;
				position: absolute;
				
				font-size: 48px;
				font-weight: bold;
				color: #FFF;
				text-shadow: 1px 1px 1px #000;
			}
			
			#monthly-bar {
				width: 100%;
				height: 100%;
				right: 0px;
				top: 0px;
				position: absolute;
				background-image: url("/images/bundlebuilder/monthlyBarFooter.png");
				background-size: cover;
				
				transition: right 2s;
				-webkit-transition: opacity 1s;
			}
			#monthly-bar.hidden {
				opacity: 0;
			}
			#monthly-bar-tag {
				width: 128px;
				height: 64px;
				text-align: left;
				vertical-align: center;
				right: 16px;
				top: 28px;
				position: absolute;
				
				font-size: 32px;
				font-weight: bold;
				color: #FFF;
				text-shadow: 1px 1px 1px #000;
			}
		</style>
	';
	
	
	//=========================== Generate Page ===========================
	// Start Main Area:
	echo '<div class="wrapper" style="text-align: center;">';
	
	// Intro:
	echo '<img src="/images/bundlebuilder/step1Large.png" style="vertical-align: middle; padding-right: 24px;"/>';
	echo '<img src="/images/home/step2.png" style="opacity: 0.5; vertical-align: middle; padding: 0 24px;"/>';
	echo '<img src="/images/home/step3.png" style="opacity: 0.5; vertical-align: middle; padding-left: 24px;"/>';
	echo '<br/>';
	
	// Title:
	echo '<img src="/images/bundlebuilder/pennySpeechBundle.png"/>';
	
	echo '<div class="divider-horizontal-large"></div>';
	
	// Generate Bundles:
	echo '<img src="/images/bundlebuilder/chooseABundle.png"/><br/>';
	foreach($bundles as $bundleKey => $bundleValue) {
		echo '<a href="javascript:void(0);" onclick="selectBundle(\''.$bundleKey.'\');">';
		echo '<div class="bundle-box-'.$bundleKey.'" id="bundle-'.$bundleKey.'">';
		echo	'<p></p>';
		echo '</div></a>';
	}
	
	echo '<div class="divider-horizontal-large"></div>';
	
	// Generate Addons:
	echo '<img src="/images/bundlebuilder/grabSomeAddons.png" style="margin-bottom: 8px"/><br/>';
	echo '<img src="/images/bundlebuilder/addonKey.png" style="position: inline; left: 0px; padding-left: 32px;"/><br/>';
	foreach($addons as $addonKey => $addonValue) {
		echo '<a href="javascript:void(0);" onclick="toggleAddon(\''.$addonKey.'\');">';
		echo '<div class="addon-'.$addonKey.'" id="addon-'.$addonKey.'">';
		echo	'<p></p>';
		echo 	'<div id="addon-'.$addonKey.'-price">£'.$addonValue["price"].'</div>';
		if($addonValue["max"] > 1) {
			echo '<div class = "addon-qty">
					<img src="/images/form/left.png" href="javascript:void(0);" onclick="selectAddonQty(\''.$addonKey.'\', -1);"/>
					<div id="addon-'.$addonKey.'-qty">1</div>
					<img src="/images/form/right.png" href="javascript:void(0);" onclick="selectAddonQty(\''.$addonKey.'\', 1);"/>
				</div>';
		}
		echo '</div></a>';
	}
	
	echo '<div class="divider-horizontal-large"></div>';
	
	// Generate Hosting:
	echo '<img src="/images/bundlebuilder/getOnlineWeb.png"/><br/>';
	foreach($hosting as $hostingKey => $hostingValue) {
		echo '<a href="javascript:void(0);" onclick="selectHosting(\''.$hostingKey.'\');">';
		echo '<div class="hosting-box-'.$hostingKey.'" id="hosting-'.$hostingKey.'">';
		echo	'<p></p>';
		if($hostingValue["price"] > 0)
			echo '<div id="hosting-'.$hostingKey.'-price">£'.$hostingValue["price"].'</div>';
		if($hostingValue["monthly"] > 0)
			echo '<div id="hosting-'.$hostingKey.'-monthly">£'.$hostingValue["monthly"].' p/m</div>';
		echo '</div></a>';
	}
	
	echo '<div class="divider-horizontal-large"></div>';
	
	// Generate Details Form:
	echo '<img src="/images/bundlebuilder/tellUsWho.png"/><br/>';
	echo '<div stlye="width: 100%; text-align: center;"><div id="customerInfo">';
	foreach($customer as $customerKey => $customerValue) {
		echo '<div stlye="width: 100%; text-align: center;">';
		echo '<div id="'.$customerKey.'-text"></div>';
		if($customerValue["type"] == "box")
			echo '<div class="text-box" id="box-'.$customerKey.'"><input id="input-'.$customerKey.'" type="text"/></div>';
		else
			echo '<div class="text-area" id="box-'.$customerKey.'"><textarea id="input-'.$customerKey.'" rows="4" cols="50"></textarea></div>';
		echo '</div>';
	}
	echo '</div></div>';
	
	echo '<div class="divider-horizontal-large"></div>';
	
	// Generate Summary Section:
	echo '<div style="position: relative; display: inline-block; width: 530px; height: 96px;">';
		echo '<div id="price-bar"><div id="price-bar-tag">£0</div></div>';
		echo '<div id="monthly-bar"><div id="monthly-bar-tag">£0 p/m</div></div>';
	echo '</div><br/>';
	
	echo '<div class="divider-horizontal-large"></div>';
	
	// Generate Submit Section:
	echo '<img src="/images/bundlebuilder/sendUsDetails.png"/><br/>';
	echo '<img src="/images/bundlebuilder/submitThatsIt.png"/><br/>';
	echo '<div style="position: relative; display: inline-block; width: 656px; height: 128px;">';
		echo '<a href="javascript:void(0);" onclick="submitOrder();"><div id="submit-button"></div></a>';
		echo '<img src="/images/bundlebuilder/submitOr.png" style="padding-top: 48px;"/>';
		echo '<img src="/images/bundlebuilder/submitOrderPhone.png" style="position: absolute; top: 10px; right: 0;"/>';
	echo '</div>';
	
	// End Main Area:
	echo '</div>';
	
	// Price Box:
	echo '<div id="price-box">';
	echo 	'<div id="price-tag">£0</div>';
	echo '</div>';
	
	// Monthly Box:
	echo '<div id="monthly-box">';
	echo 	'<div id="monthly-tag">£0 p/m</div>';
	echo '</div>';
	
	
	//=========================== Generate Javascript ===========================
	echo '<script src="/scripts/form_validation.js" type="text/javascript"></script>';
	echo '<script>';
		
		// Generate JS Bundles Array:
		echo 'var bundles = new Array();';
		foreach($bundles as $bundleKey => $bundleValue) {
			echo 'bundles["'.$bundleKey.'"] = new Array();';
			foreach($bundleValue as $bundlePropertyKey => $bundlePropertyValue) {
				if(is_int($bundlePropertyValue))
					echo 'bundles["'.$bundleKey.'"]["'.$bundlePropertyKey.'"] = '.$bundlePropertyValue.';';
				else if(is_string($bundlePropertyValue))
					echo 'bundles["'.$bundleKey.'"]["'.$bundlePropertyKey.'"] = "'.$bundlePropertyValue.'";';
				else
					echo 'bundles["'.$bundleKey.'"]["'.$bundlePropertyKey.'"] = new Array();';
					foreach($bundlePropertyValue as $bundleSubPropertyKey => $bundleSubPropertyValue) {
						if(is_int($bundleSubPropertyValue))
							echo 'bundles["'.$bundleKey.'"]["'.$bundlePropertyKey.'"]["'.$bundleSubPropertyKey.'"] = '.$bundleSubPropertyValue.';';
						else
							echo 'bundles["'.$bundleKey.'"]["'.$bundlePropertyKey.'"]["'.$bundleSubPropertyKey.'"] = "'.$bundleSubPropertyValue.'";';
					}
			}
		}
		
		// Generate JS Addons Array:
		echo 'var addons = new Array();';
		foreach($addons as $addonKey => $addonValue) {
			echo 'addons["'.$addonKey.'"] = new Array();';
			foreach($addonValue as $addonPropertyKey => $addonPropertyValue) {
				if(is_int($addonPropertyValue))
					echo 'addons["'.$addonKey.'"]["'.$addonPropertyKey.'"] = '.$addonPropertyValue.';';
				else
					echo 'addons["'.$addonKey.'"]["'.$addonPropertyKey.'"] = "'.$addonPropertyValue.'";';
			}
		}
		
		// Generate JS Hosting Array:
		echo 'var hosting = new Array();';
		foreach($hosting as $hostingKey => $hostingValue) {
			echo 'hosting["'.$hostingKey.'"] = new Array();';
			foreach($hostingValue as $hostingPropertyKey => $hostingPropertyValue) {
				if(is_int($hostingPropertyValue))
					echo 'hosting["'.$hostingKey.'"]["'.$hostingPropertyKey.'"] = '.$hostingPropertyValue.';';
				else
					echo 'hosting["'.$hostingKey.'"]["'.$hostingPropertyKey.'"] = "'.$hostingPropertyValue.'";';
			}
		}
		
		// Generate JS Customer Info Array:
		echo 'var customer = new Array();';
		foreach($customer as $customerKey => $customerValue) {
			echo 'customer["'.$customerKey.'"] = new Array();';
			foreach($customerValue as $customerPropertyKey => $customerPropertyValue) {
				if(is_int($customerPropertyValue))
					echo 'customer["'.$customerKey.'"]["'.$customerPropertyKey.'"] = '.$customerPropertyValue.';';
				else
					echo 'customer["'.$customerKey.'"]["'.$customerPropertyKey.'"] = "'.$customerPropertyValue.'";';
			}
			echo '$("#input-'.$customerKey.'").bind("input propertychange", function() { updateInput("'.$customerKey.'"); });';
			echo 'updateInput("'.$customerKey.'");';
		}
		
		// Start Up Selections:
		echo 'var selectedBundle = "a";';
		echo 'var selectedAddons = new Array();';
		echo 'var selectedAddonAmounts = new Array();';
		echo 'var includedAddons = new Array();';
		echo 'var selectedHosting = "c";';
		echo 'var canSubmit = false;';
		echo 'selectBundle("a");';
		echo 'selectHosting("c");';
		
		// Costs:
		echo 'var totalCost = 0;';
		echo 'var totalMonthly = 0;';
		
		// Select Bundle:
		echo 'function selectBundle(bundleKey) {
			$("#bundle-" + selectedBundle).removeClass("selected");
			selectedBundle = bundleKey;
			$("#bundle-" + bundleKey).addClass("selected");
			clearIncludedAddons();
			var bundleAddons = bundles[bundleKey]["addons"];
			for(var addonKey in bundleAddons)
				includeAddon(bundleAddons[addonKey]);
			console.log("Selected Bundle: " + bundleKey);
			updatePrices();
		}';
		
		// Toggle Addon:
		echo 'function toggleAddon(addonKey) {
			if(selectedAddons[addonKey] == null) selectAddon(addonKey);
			else deselectAddon(addonKey);
		}';
		
		// Select Addon:
		echo 'function selectAddon(addonKey) {
			if(includedAddons[addonKey] == null) {
				selectedAddons[addonKey] = addons[addonKey];
				$("#addon-" + addonKey).addClass("selected");
				if($("#addon-" + addonKey + "-qty").length > 0) {
					selectedAddonAmounts[addonKey] = $("#addon-" + addonKey + "-qty").text();
					console.log("Selected Addon: " + addonKey + " x " + selectedAddonAmounts[addonKey]);
				}
				else
					console.log("Selected Addon: " + addonKey);
			}
			else console.log("Can\'t Select Addon: " + addonKey + " (It is already included in the bundle.)");
			updatePrices();
		}';
		
		// Deselect Addon:
		echo 'function deselectAddon(addonKey) {
			delete selectedAddons[addonKey];
			$("#addon-" + addonKey).removeClass("selected");
			if(selectedAddonAmounts[addonKey] != null) delete selectedAddonAmounts[addonKey];
			updatePrices();
			console.log("Deselected Addon: " + addonKey);
		}';
		
		// Select Addon Quantity:
		echo 'function selectAddonQty(addonKey, direction) {
			var addonQty = parseInt($("#addon-" + addonKey + "-qty").text());
			if(!(addonQty == addons[addonKey]["min"] && direction < 0)
				&& !(addonQty == addons[addonKey]["max"] && direction > 0))
				addonQty += direction;
			$("#addon-" + addonKey + "-qty").text(addonQty);
			
			$("#addon-" + addonKey + "-price").text("£" + (addons[addonKey]["price"] * addonQty));
			
			deselectAddon(addonKey);
		}';
		
		// Include Addon:
		echo 'function includeAddon(addonKey) {
			if(selectedAddons[addonKey] != null) {	
				delete selectedAddons[addonKey];
				$("#addon-" + addonKey).removeClass("selected");
				console.log("Deselected Addon: " + addonKey);
			}
			includedAddons[addonKey] = addons[addonKey];
			$("#addon-" + addonKey).addClass("included");
			console.log("Included Addon: " + addonKey);
		}';
		
		// Clear Included Addons:
		echo 'function clearIncludedAddons() {
			for(includedAddon in includedAddons)
				$("#addon-" + includedAddon).removeClass("included");
			includedAddons = new Array();
			console.log("Cleared Included Addons.");
		}';
		
		// Select Hosting:
		echo 'function selectHosting(hostingKey) {
			$("#hosting-" + selectedHosting).removeClass("selected");
			selectedHosting = hostingKey;
			$("#hosting-" + hostingKey).addClass("selected");
			console.log("Selected Hosting Service: " + hostingKey);
			updatePrices();
		}';
		
		// Update Prices:
		echo 'function updatePrices() {
			var newTotalCost = bundles[selectedBundle]["price"] + hosting[selectedHosting]["price"];
			var newTotalMonthly = hosting[selectedHosting]["monthly"];
			
			for(selectedAddon in selectedAddons) {
				if(selectedAddonAmounts[selectedAddon] == null)
					newTotalCost += addons[selectedAddon]["price"];
				else
					newTotalCost += (addons[selectedAddon]["price"] * selectedAddonAmounts[selectedAddon]);
			}
			
			totalCost = newTotalCost;
			totalMonthly = newTotalMonthly;
			$("#price-tag").text("£" + totalCost);
			$("#price-bar-tag").text("£" + totalCost);
			$("#monthly-tag").text("£" + totalMonthly + " p/m");
			$("#monthly-bar-tag").text("£" + totalMonthly + " p/m");
			if(totalMonthly > 0) {
				$("#monthly-box").removeClass("hidden");
				$("#monthly-bar").removeClass("hidden");
			}
			else {
				$("#monthly-box").addClass("hidden");
				$("#monthly-bar").addClass("hidden");
			}
			console.log("Prices Updated - Cost: " + totalCost + " Monthly: " + totalMonthly);
		}';
		
		// Update Input:
		echo 'function updateInput(customerKey) {
			inputValue = $("#input-" + customerKey).val();
			inputFilter = customer[customerKey]["filter"];
			if(inputFilter != "confirm") 
				if(FilterTest(inputValue, inputFilter)) {
					customer[customerKey]["input"] = inputValue.replace(/[|#~]/g, \'_\');
					console.log(customer[customerKey]["input"]);
					$("#box-" + customerKey).addClass("valid");
					$("#box-" + customerKey).removeClass("invalid");
				}
				else {
					customer[customerKey]["input"] = "";
					if(inputValue != "" || customer[customerKey]["importance"] == "required") {
						$("#box-" + customerKey).removeClass("valid");
						$("#box-" + customerKey).addClass("invalid");
					}
					else {
						$("#box-" + customerKey).addClass("valid");
						$("#box-" + customerKey).removeClass("invalid");
					}
				}
			else {
				var compareValue = $("#input-" + customerKey.substring(0, customerKey.length-7)).val();
				if(inputValue != "" && inputValue == compareValue) {
					customer[customerKey]["input"] = inputValue;
					$("#box-" + customerKey).addClass("valid");
					$("#box-" + customerKey).removeClass("invalid");
				}
				else {
					customer[customerKey]["input"] = "";
					if(inputValue != "" || customer[customerKey]["importance"] == "required") {
						$("#box-" + customerKey).removeClass("valid");
						$("#box-" + customerKey).addClass("invalid");
					}
					else {
						$("#box-" + customerKey).addClass("valid");
						$("#box-" + customerKey).removeClass("invalid");
					}
				}
			}
			if(inputValue == "") {
				$("#box-" + customerKey).removeClass("valid");
				$("#box-" + customerKey).removeClass("invalid");
			}
			updateSubmit();
		}';
		
		// Update Submit:
		echo 'function updateSubmit() {
			canSubmit = true;
			for(customerValue in customer) {
				if(customer[customerValue]["input"] == "" && customer[customerValue]["importance"] == "required")
					canSubmit = false;
				if(!canSubmit)
					break;
			}
			if(canSubmit) {
				$("#submit-button").removeClass("disabled");
			}
			else {
				$("#submit-button").addClass("disabled");
			}
		}';
		
		// Submit Order:
		echo 'function submitOrder() {
			if(!canSubmit)
				alert("Please check that your details are filled out, so we know who you are!");
			else {
				var selectedBundleString = "";
				selectedBundleString += bundles[selectedBundle]["name"] + "#";
				selectedBundleString += bundles[selectedBundle]["price"];
				
				var selectedAddonsString = "";
				for(addonKey in selectedAddons) {
					if(selectedAddonsString != "")
						selectedAddonsString += "|";
					selectedAddonsString += addonKey + "#";
					selectedAddonsString += "name~" + addons[addonKey]["name"] + "#";
					selectedAddonsString += "price~" + addons[addonKey]["price"] + "#";
					if(selectedAddonAmounts[addonKey] != null)
						selectedAddonsString += "amount~" + selectedAddonAmounts[addonKey];
					else
						selectedAddonsString += "amount~" + "1";
				}
				
				var selectedHostingString = hosting[selectedHosting]["name"] + "#";
				selectedHostingString += hosting[selectedHosting]["price"] + "#";
				selectedHostingString += hosting[selectedHosting]["monthly"];
				
				var customerString = "";
				for(customerKey in customer) {
					if(customerString != "")
						customerString += "|";
					customerString += customerKey + "#";
					customerString += customer[customerKey]["name"] + "#";
					customerString += customer[customerKey]["input"];
				}
				
				$.doPost("/submitted.php", {
					type: "Order",
					bundle: selectedBundleString,
					addons: selectedAddonsString,
					hosting: selectedHostingString,
					customer: customerString
				});
			}
		}';

	echo '(function($) {
		$.extend({
	        doGet: function(url, params) {
	            document.location = url + \'?\' + $.param(params);
	        },
	        doPost: function(url, params) {
	            var $form = $("<form method=\'POST\'>").attr("action", url);
	            $.each(params, function(name, value) {
	                $("<input type=\'hidden\'>")
	                    .attr("name", name)
	                    .attr("value", value)
	                    .appendTo($form);
	            });
	            $form.appendTo("body");
	            $form.submit();
	        }
	    });
	})(jQuery);';
	
	// Preload Images:
	echo 'function preloadImage(imageURL) {
	    var img = new Image();
	    img.src = imageURL;
	}';
	echo 'preloadImage("/images/bundlebuilder/addon1Selected.png");';
	echo 'preloadImage("/images/bundlebuilder/addon1Included.png");';
	echo 'preloadImage("/images/bundlebuilder/addon2Selected.png");';
	echo 'preloadImage("/images/bundlebuilder/addon2Included.png");';
	echo 'preloadImage("/images/bundlebuilder/bundle-a-selected.png");';
	echo 'preloadImage("/images/bundlebuilder/bundle-b-selected.png");';
	echo 'preloadImage("/images/bundlebuilder/bundle-c-selected.png");';
		
	echo '</script>';
	
?>