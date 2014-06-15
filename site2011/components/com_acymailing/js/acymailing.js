function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	submitform( task );
}

function submitform(pressbutton){
	if (pressbutton) {
		document.adminForm.task.value=pressbutton;
	}
	if (typeof document.adminForm.onsubmit == "function") {
		document.adminForm.onsubmit();
	}
	document.adminForm.submit();
}

function checkChangeForm(){
	var varform = eval('document.adminForm');
	nameField = varform.elements['data[subscriber][name]'];
	if(nameField && (( typeof acymailing != 'undefined' && nameField.value == acymailing['NAMECAPTION'] ) || nameField.value.length < 2)){
		if(typeof acymailing != 'undefined'){ alert(acymailing['NAME_MISSING']); }
		nameField.className = nameField.className +' invalid';
		return false;
	}

	var emailField = varform.elements['data[subscriber][email]'];
	if(emailField){
		emailField.value = emailField.value.replace(/ /g,"");
        var filter = /^([a-z0-9_'\.\-\+])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,10})+$/i;
        if(!emailField || (typeof acymailing != 'undefined' && emailField.value == acymailing['EMAILCAPTION']) || !filter.test(emailField.value)){
          if(typeof acymailing != 'undefined'){ alert(acymailing['VALID_EMAIL']); }
          emailField.className = emailField.className +' invalid';
          return false;
        }
	}
	return true;
}