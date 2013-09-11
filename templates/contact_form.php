<form name="contactForm" method="post" action="/scripts/contactEmail.php">
	<table>
		<tr>
			<td colspan=2>
				<h3 style="margin-bottom: 6px; padding-right: 4px;">Contact Us:</h3>
				<p style="padding-bottom: 0px">You may contact us directly by telephone, email or by using the form below. We'll get back to you as soon as possible.</p>
				<ul>
					<li><p>Email: <a href="mailto:info@pennydroid.com">info@pennydroid.com</a></p></li>
					<li><p>Phone (UK Landline): +44 (0)191 243 7888</p></li>
				</ul>
			</td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="name">Name *</label></td>
			<td><input name="name" type="text" maxlength="50" size="30" required style="width: 192px;"></td>
			<td class="form-cell-label"><div class="form-arrow-required" for="name"></div></td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="company">Company</label></td>
			<td><input name="company" type="text" maxlength="50" size="30" style="width: 192px;"></td>
			<td class="form-cell-label"><div class="form-arrow" for="company"></div></td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="email">Email *</label></td>
			<td><input name="email" type="text" maxlength="80" size="30" required style="width: 192px;"></td>
			<td class="form-cell-label"><div class="form-arrow-required" for="email"></div></td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="telephone">Telephone (Optional)</label></td>
			<td><input name="telephone" type="text" maxlength="30" size="30" style="width: 192px;"></td>
			<td class="form-cell-label"><div class="form-arrow" for="telephone"></div></td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="subject">Subject *</label></td>
			<td><select id="subjectSelection" name="subject" size="1" style="width: 194px;">
				<?php
					if(!isset($_POST[bundle]) || (isset($_POST[bundle]) && $_POST[bundle] == "loaded"))
						echo "<option selected>Loaded Bundle</option>";
					else echo "<option>Loaded Bundle</option>";
				?>
				<?php
					if(isset($_POST[bundle]) && $_POST[bundle] == "streamline")
						echo "<option selected>Streamline Bundle</option>";
					else echo "<option>Streamline Bundle</option>";
				?>
				<option>Enquiry</option>
				<option>Feedback</option>
				<option>Other</option>
			</select></td>
			<td class="form-cell-label"><div class="form-arrow" for="subject"></div></td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="subjectOther">Please Specify</label></td>
			<td><input id="subjectOther" name="subjectOther" type="text" maxlength="30" size="30" disabled="disabled" style="width: 192px;"></td>
			<td class="form-cell-label"><div class="form-arrow-required" for="subjectOther"></div></td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="comments">Comments</label></td>
			<td><textarea name="comments" maxlength="1000" cols="26" rows="6" style="width: 192px;"><?php
				if(isset($_POST['bundle']) && isset($_POST['addons']) && isset($_POST['addonsQty']) && isset($_POST['prices'])) {
					$addons = array();
					
					foreach(explode(',', $_POST['addons']) as $addonsN) {
						$addonsData = explode(':', $addonsN);
						$addons[$addonsData[0]] = $addonsData[1];
					}
					
					foreach(explode(',', $_POST['addonsQty']) as $addonsQtyN) {
						$addonsQtyData = explode(':', $addonsQtyN);
						$addonsQty[$addonsQtyData[0]] = $addonsQtyData[1];
					}
					
					foreach(explode(',', $_POST['prices']) as $pricesN) {
						$pricesData = explode(':', $pricesN);
						$prices[$pricesData[0]] = $pricesData[1];
					}
					
					$bundle = $_POST['bundle'];
					$bundlePrice = $prices[$bundle];
					$bundlePrice = sprintf(round($bundlePrice, 2) == intval($bundlePrice) ? "%d" : "%.2f", $bundlePrice);
					echo ucwords($bundle . " Bundle") . " - £" . $bundlePrice;
					
					if(count($addons) > 0 && $addons != array()) {
						echo "\nAddons:";
						foreach($addons as $addonKey => $addonValue) {
							if($addonValue == "true") {
								$addonPrice = $prices[$addonKey];
								if($addonsQty[$addonKey] == null || $addonsQty[$addonKey] == "0")
									$addonPrice = sprintf(round($addonPrice, 2) == intval($addonPrice) ? "%d" : "%.2f", $addonPrice);
								else {
									$addonPrice *= $addonsQty[$addonKey];
									$addonPrice = sprintf(round($addonPrice, 2) == intval($addonPrice) ? "%d" : "%.2f", $addonPrice);
								}
								if($addonsQty[$addonKey] == null || $addonsQty[$addonKey] == "0")
									echo "\n    " . ucwords($addonKey) . " - £" . $addonPrice;
								else
									echo "\n    " . ucwords($addonKey) . " x " . $addonsQty[$addonKey] . " - £" . $addonPrice;
							}
						}
					}
				}
			?></textarea></td>
			<td class="form-cell-label"><div class="form-arrow" for="comments"></div></td>
		</tr>
		
		<tr>
			<td class="form-cell-label"><label for="mailingList"></label></td>
			<td>
				<input name="mailingList" type="checkbox" value="yes" checked>
				<label>Add me to the Mailing List</label>
			</td class="form-cell-label">
		</tr>
		
		<tr>
			<td class="form-cell-label"></td>
			<td><a href="javascript:void(0);" onclick="void(0);" id="formSubmitAction" style="text-decoration: none">
				<h3><div id="formSubmitButton" class="button">Submit</div></h3>
			</a></td>
		</tr>
	</table>
</form>

<script src="/scripts/form_validation.js" type="text/javascript"></script>
<script>
	
	// Update Subject:
	$('#subjectSelection').change(function() {
		var option = "";
		$("select option:selected").each(function () {
			option = $(this).text();
		});
		if(option == "Other") {
			$('#subjectOther').removeAttr('disabled');
			$('label[for=subjectOther]').removeClass('disabled');
			$('.form-arrow-required[for=subjectOther]').removeClass('disabled');
		}
		else {
			$('#subjectOther').attr('disabled','disabled');
			$('label[for=subjectOther]').addClass('disabled');
			$('.form-arrow-required[for=subjectOther]').addClass('disabled');
		}
		CheckForm();
	})
	.change();
	
	// Update Name:
	function updateName() {
		fieldValue = $('input[name=name]').val();
		CheckField(fieldValue, '.form-arrow-required[for=name]', 'name');
	}
	$('input[name=name]').bind('input propertychange', function() { updateName(); });
	updateName();
	
	// Update Company:
	function updateCompany() {
		fieldValue = $('input[name=company]').val();
		CheckField(fieldValue, '.form-arrow[for=company]', 'mixed');
	}
	$('input[name=company]').bind('input propertychange', function() { updateCompany(); });
	updateCompany();
	
	// Update Email:
	function updateEmail() {
		fieldValue = $('input[name=email]').val();
		CheckField(fieldValue, '.form-arrow-required[for=email]', 'email');
	}
	$('input[name=email]').bind('input propertychange', function() { updateEmail(); });
	updateEmail();
	
	// Update Telephone:
	function updateTelephone() {
		fieldValue = $('input[name=telephone]').val();
		CheckField(fieldValue, '.form-arrow[for=telephone]', 'number');
	}
	$('input[name=telephone]').bind('input propertychange', function() { updateTelephone(); });
	updateTelephone();
	
	// Update Other Subject:
	function updateOther() {
		fieldValue = $('input[name=subjectOther]').val();
		CheckField(fieldValue, '.form-arrow-required[for=subjectOther]', 'mixed');
	}
	$('input[name=subjectOther]').bind('input propertychange', function() { updateOther(); });
	updateOther();
	
	// Update Comments:
	function updateComments() {
		fieldValue = $('textarea[name=comments]').val();
		CheckField(fieldValue, '.form-arrow[for=comments]', 'mixed');
	}
	$('textarea[name=comments]').bind('input propertychange', function() { updateComments(); });
	updateComments();
	
	
	// Check Form:
	function CheckForm() {
		formValid = false;
	
		if(
				$('.form-arrow-required[for=name]').hasClass('valid') &&
				$('.form-arrow-required[for=email]').hasClass('valid')
				) {
			formValid = true;
		}
		if(
				$('.form-arrow[for=company]').hasClass('invalid') ||
				$('.form-arrow[for=telephone]').hasClass('invalid') ||
				$('.form-arrow[for=comments]').hasClass('invalid')
				) {
			formValid = false;
		}
		if(
				!$('#subjectOther').attr('disabled') &&
				!$('.form-arrow-required[for=subjectOther]').hasClass('valid')
				) {
			formValid = false;
		}
		if(formValid) {
			$('#formSubmitButton').removeClass("disabled");
			$('#formSubmitButton').text("Submit");
			$('#formSubmitAction').attr("onclick", "$(this).closest('form').submit();");
		}
		else {
			$('#formSubmitButton').addClass("disabled");
			$('#formSubmitButton').text("Fill Required Fields");
			$('#formSubmitAction').attr("onclick", "void(0);");
		}
	}
</script>