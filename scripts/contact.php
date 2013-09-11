<?php
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
			"importance" => "optional",
		),
		
		"email" => array(
			"name" => "Email",
			"description" => "What's your email address?",
			"type" => "box",
			"filter" => "email",
			"importance" => "required",
		),
		
		"phone" => array(
			"name" => "Telephone",
			"description" => "What's your telephone number?",
			"type" => "box",
			"filter" => "number",
			"importance" => "optional",
		),
		
		"message" => array(
			"name" => "Message",
			"description" => "Leave us your message:",
			"type" => "area",
			"filter" => "mixed",
			"importance" => "required",
		),
	);
	
	
	//=========================== Generate Styles ===========================
	// Customer Info:
	echo '
		<style>
			#customerInfo {
				display: inline-block;
				width: 684px;
				height: 370px;
				padding-top: 64px;
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
				background-image: url("/images/contact/submitRequest.png");
				background-size: cover;
			}
			#submit-button.disabled {
				background-image: url("/images/contact/submitRequestDisabled.png");
			}
		</style>
	';
	
	
	//=========================== Generate Page ===========================
	// Start Main Area:
	echo '<div class="wrapper" style="text-align: center;">';
	
	// Title:
	echo '<img src="/images/contact/pennySpeechContact.png"/><br/>';
	
	// Generate Details Form:
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
	
	// Generate Submit Section:
	echo '<div style="position: relative; display: inline-block; width: 656px; height: 128px;">';
		echo '<a href="javascript:void(0);" onclick="submitRequest();"><div id="submit-button"></div></a>';
		echo '<img src="/images/bundlebuilder/submitOr.png" style="padding-top: 48px;"/>';
		echo '<img src="/images/contact/submitRequestPhone.png" style="position: absolute; top: 10px; right: 0;"/>';
	echo '</div>';
	
	// End Main Area:
	echo '</div>';
	
	
	//=========================== Generate Javascript ===========================
	echo '<script src="/scripts/form_validation.js" type="text/javascript"></script>';
	echo '<script>';
		
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
		echo 'var canSubmit = false;';
		
		// Update Input:
		echo 'function updateInput(customerKey) {
			inputValue = $("#input-" + customerKey).val();
			inputFilter = customer[customerKey]["filter"];
			
			if(inputFilter != "confirm") 
				if(FilterTest(inputValue, inputFilter)) {
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
			else {
				var compareValue = $("#input-" + customerKey.substring(0, customerKey.length-7)).val();
				if(inputValue != "" && inputValue == compareValue) {
					customer[customerKey]["input"] = inputValue.replace(/[|#~]/g, \'_\');
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
		
		// Submit Request:
		echo 'function submitRequest() {
			if(!canSubmit)
				alert("Please check that your details are filled out, so we know who you are!");
			else {
				var customerString = "";
				for(customerKey in customer) {
					if(customerString != "")
						customerString += "|";
					customerString += customerKey + "#";
					customerString += customer[customerKey]["name"] + "#";
					customerString += customer[customerKey]["input"];
				}
				
				$.doPost("/submitted.php", {
					type: "Contact",
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
		
	echo '</script>';
?>