function IsValidName(value) {
	requires = /^[A-Za-z .'-]+$/;
	if(requires.test(value)) {
		return true;
	}
	else {
		return false;
	}
}

function IsValidNumber(value) {
	requires = /^[0-9]+$/;
	if(requires.test(value)) {
		return true;
	}
	else {
		return false;
	}
}

function IsValidMixed(value) {
	requires = /^[A-Za-z0-9 ._'-:;()!?£&*@$€"%=]+$/;
	if(requires.test(value)) {
		return true;
	}
	else {
		return false;
	}
}

function IsValidEmail(value) {
	requires = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
	if(requires.test(value)) {
		return true;
	}
	else {
		return false;
	}
}

function IsValidCode(value) {
	requires = /^[A-Za-z0-9]+$/;
	if(requires.test(value)) {
		return true;
	}
	else {
		return false;
	}
}

function FilterTest(inputValue, filter) {
	if(filter == "name") return IsValidName(inputValue);
	if(filter == "number") return IsValidNumber(inputValue);
	if(filter == "mixed") return IsValidMixed(inputValue);
	if(filter == "email") return IsValidEmail(inputValue);
	if(filter == "code") return IsValidCode(inputValue);
	return true;
}

function CheckField(fieldValue, fieldArrow, type) {
	if(fieldValue == "" || fieldValue == null) {
		$(fieldArrow).removeClass('valid');
		$(fieldArrow).removeClass('invalid');
	}
	else if(
			(type == "name" && !IsValidName(fieldValue)) ||
			(type == "number" && !IsValidNumber(fieldValue)) ||
			(type == "mixed" && !IsValidMixed(fieldValue)) ||
			(type == "email" && !IsValidEmail(fieldValue)) ||
			(type == "code" && !IsValidCode(fieldValue))
			) {
		$(fieldArrow).removeClass('valid');
		$(fieldArrow).addClass('invalid');
	}
	else {
		$(fieldArrow).addClass('valid');
		$(fieldArrow).removeClass('invalid');
	}
	CheckForm();
}