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
		
		<form name="designinfoForm" method="post" action="">
		<article id="main-form">
			Test ID.
		</article>
		</form>
		
	<!-- ========== Main Section Finish ========== -->
	<?php include($template.'main_end.php'); ?>
	
	
	<!-- ========== Footer ========== -->
	<?php include($template.'footer.php'); ?>
	
	
	<!-- ========== Scripts ========== -->
	<script src="/scripts/form_validation.js" type="text/javascript"></script>
	<script src="/scripts/customers_temp.js" type="text/javascript"></script>
	<script>
		// Vars:
		var userID = "none";
		<?php
			if(isset($_GET['id'])) echo "userID = \"".$_GET['id']."\";";
		?>
		var customerName = "";
		
		var fields = [];
		
		
		// Startup:
		loadForm();
		
		
		// Create Form:
		function loadForm() {
			fields = [];
			if(userID == "none") {
				$('#main-form').html( 
					"<h3>We need your Customer ID:</h3>"
					+ startForm()
					+ createField('customerID', 'Customer ID (Case Sensitive)')
					+ createSubmit('mainSubmit')
					+ finishForm()
				);
			}
			else if(customers[userID] == null) {
				userID = "none";
				$('#main-form').html( 
					"<h3>Invalid Customer ID:</h3>"
					+ "<p>We don't have that Customer ID in our database, please try again, remember that your ID is Case Sensitive and should only have letters and numbers (no spaces). If you keep having this problem, please <a href=\"/contact.php\">contact us</a> right away and we'll sort our the problem as soon as we can."
					+ startForm()
					+ createField('customerID', 'Customer ID (Case Sensitive)')
					+ createSubmit('mainSubmit')
					+ finishForm()
				);
			}
			else {
				customerName = customers[userID];
				$('#header-gallery').find('h1').text("Hello " + customerName);
				$('#main-form').html(
					"<h3>Before we create your website, there are a few things we'd like to know:</h3>"
					+ "<p>You may <a href=\"/contact.php\">contact us by telephone</a> if you prefer or if you have any information you wish to discuss with us in detail.</p>"
					+ startForm()
					+ createField('companyName-mixed', 'Company Name')
					+ createField('contactName-name', 'Contact Name')
					+ createField('contactEmail-email', 'Contact Email')
					+ createField('contactWebsite', 'Contact Website')
					+ createField('package', 'Your Package')
					+ createFieldBox('addons', 'Your Addons')
					+ createFieldBox('info', 'Any Additional Information')
					+ createSubmit('mainSubmit')
					+ finishForm()
				);
				setFieldValue('companyName-mixed', customerName);
			}
			addFieldListeners();
		}
		
		
		// Check Form:
		function CheckForm() {
			
		}
		
		
		// Submit Form:
		function submitForm() {
			if(userID == "none") {
				newUserID = fields['customerID'];
				if(newUserID != null && newUserID != "") userID = fields['customerID'];
				loadForm();
			}
			else {
				
			}
		}
		
		
		// Update Field:
		function fieldUpdate(fieldID) {
			if(fieldID.split('-')[1] != null) fieldFormat = fieldID.split('-')[1];
			else fieldFormat = "none";
			fieldValue = getFieldValue(fieldID);
			fieldArrow = '.form-arrow-required[for=' + fieldID + ']';
			CheckField(fieldValue, fieldArrow, fieldFormat);
			if($(fieldArrow).hasClass('valid')) {
				fields[fieldID] = fieldValue;
			}
		}
		
		
		// Add Field Listeners:
		function addFieldListeners() {
			for(fieldN in fields) {
				fieldNElement = getField(fieldN);
				fieldNElement.bind('input propertychange', function() { fieldUpdate(fieldN); });
				fieldUpdate(fieldN);
			}
			
			if(userID == "none") {
				$('input[name=customerID]').keypress(function(inputKey) {
			    	if(inputKey.keyCode == 13) $('#formSubmitButton').click();
			    });
		    }
		}
		
		
		// Create Fields:
		function createField(fieldID, fieldName) {
			fields[fieldID] = "";
			return (
				"<tr>"
					+ "<td class=\"form-cell-label\"><label for=\"" + fieldID + "\">"+ fieldName+ "</label></td>"
					+ "<td><input name=\"" + fieldID + "\" type=\"text\" maxlength=\"50\" size=\"30\" style=\"width: 192px;\"></td>"
					+ "<td class=\"form-cell-label\"><div class=\"form-arrow-required\" for=\"" + fieldID + "\"></div></td>"
				+ "</tr>"
			);
		}
		
		function createFieldBox(fieldID, fieldName) {
			fields[fieldID] = "test";
			return (
				"<tr>"
					+ "<td class=\"form-cell-label\"><label for=\"" + fieldID + "\">"+ fieldName+ "</label></td>"
					+ "<td><textarea name=\"" + fieldID + "\" type=\"text\" maxlength=\"1000\" cols=\"26\" rows=\"6\" style=\"width: 384px;\"></textarea></td>"
					+ "<td class=\"form-cell-label\"><div class=\"form-arrow-required\" for=\"" + fieldID + "\"></div></td>"
				+ "</tr>"
			);
		}
		
		function createSubmit(submitID) {
			return (
				"<tr>"
					+ "<td class=\"form-cell-label\">" + "</td>"
					+ "<td><a href=\"javascript:void(0);\" onclick=\"submitForm();\" id=\"" + submitID + "\" style=\"text-decoration: none;\">"
					+ "<h3><div id=\"formSubmitButton\" class=\"button\">Submit</div></h3>"
					+ "</a></td>"
				+ "</tr>"
			);
		}
		
		
		// Create Form Elements:
		function startForm() {
			return (
				"<table>"
			);
		}
		
		function finishForm() {
			return (
				"</table>"
			);
		}
		
		
		// Get Field Element:
		function getField(fieldID) {
			if($('input[name=' + fieldID + ']').val() != null) return $('input[name=' + fieldID + ']');
			if($('textarea[name=' + fieldID + ']').val() != null) return $('textarea[name=' + fieldID + ']');
		}
		function getFieldValue(fieldID) {
			if($('input[name=' + fieldID + ']').val() != null) return $('input[name=' + fieldID + ']').val();
			if($('textarea[name=' + fieldID + ']').val() != null) return $('textarea[name=' + fieldID + ']').val();
		}
		function setFieldValue(fieldID, value) {
			if($('input[name=' + fieldID + ']').val() != null) $('input[name=' + fieldID + ']').val(value);
			if($('textarea[name=' + fieldID + ']').val() != null) $('textarea[name=' + fieldID + ']').val(value);
		}
		
	</script>
	
</body>