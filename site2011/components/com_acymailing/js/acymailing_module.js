function submitacymailingform(task,formName){
	var varform = eval('document.'+formName);
	if(!varform.elements) varform = varform[1];

       if(task != 'optout'){
         nameField = varform.elements['user[name]'];
         if(nameField && (( typeof acymailing != 'undefined' && nameField.value == acymailing['NAMECAPTION'] ) || nameField.value.length < 2)){
           if(typeof acymailing != 'undefined'){ alert(acymailing['NAME_MISSING']); }
           nameField.className = nameField.className +' invalid';
           return false;
         }
       }

       var emailField = varform.elements['user[email]'];
       if(emailField){
       emailField.value = emailField.value.replace(/ /g,"");
        var filter = /^([a-z0-9_'\.\-\+])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,10})+$/i;
        if(!emailField || (typeof acymailing != 'undefined' && emailField.value == acymailing['EMAILCAPTION']) || !filter.test(emailField.value)){
          if(typeof acymailing != 'undefined'){ alert(acymailing['VALID_EMAIL']); }
          emailField.className = emailField.className +' invalid';
          return false;
        }
       }

       if(task != 'optout'){
         termsandconditions = varform.terms;
         if(termsandconditions && !termsandconditions.checked){
           if(typeof acymailing != 'undefined'){ alert(acymailing['ACCEPT_TERMS']); }
           termsandconditions.className = termsandconditions.className +' invalid';
           return false;
         }
       }

       taskField = varform.task;
       taskField.value = task;

       varform.submit();

       if(window.parent && window.parent.document.getElementById('sbox-window')){
       	window.parent.document.getElementById('sbox-window').close();
       }

       return false;
     }