// ============================================================================
// FormFieldManager.js
// ----------------------------------------------------------------------------
// Nome     : Gerenciador de campos de formulários
// Home     : http://home.zevallos.com/
// Criacao  : 5/28/2001 11:47PM
// Autor    : Ruben Zevallos Jr. <ruben@zevallos.com>
// Versao   : 1.1f
// Local    : Brasília - DF
// Copyright: 97-2004 by Ruben Zevallos(r) Jr.
// License  : Licensed under the terms of the GNU Lesser General Public License
//            http://www.opensource.org/licenses/lgpl-license.php
// ----------------------------------------------------------------------------

//===========================================================================
// Conjunto de funções para a gerência de formulários

//===========================================================================
// Processa o foco do formulário
function StatusTitle(event) {
	if (window.event) {
	  var objField = window.event.srcElement;

	} else {
	  var objField = event.target;
	}

  if (objField != null) {
    if(objField.getAttribute('title') != null) {
      window.status = objField.getAttribute('title');

    } else {
      window.status = "";
      }
  }

  return true;
}

//===========================================================================
// Habilita ou desabilita os botões
function ButtonsDisabled(blnState) {
  var objButtom = document.getElementsByTagName("BUTTON");

  for (i = 0; i < objButtom.length; i++) {
    objButtom[i].disabled = blnState;
    }
  }

//===========================================================================
// Apaga todos os campos ou somente os desabilitados
function ClearFields(blnClear) {
  var objFormFields = sobjForm.elements;

  for (i = 0; i < objFormFields.length; i++) {
    if(objFormFields[i].tagName != "BUTTON" && (blnClear || objFormFields[i].disabled))
      objFormFields[i].value = '';

    if(objFormFields[i].getAttribute("classNameOld") != null)
      objFormFields[i].className = objFormFields[i].getAttribute("classNameOld");

    }
  }

//===========================================================================
// Auxiliar para ativação e desativação dos campos
function FieldChangeState(objFieldCurrent, objFieldTarget, strElement)
  {
  var strElementValue = objFieldTarget.getAttribute(strElement);

  if(objFieldCurrent.value.length > 0 && strElementValue != null) {
    if(strElement == "htDisable") {
      if(strElementValue.indexOf(objFieldCurrent.value) == -1) {
        objFieldTarget.disabled = false;
        objFormFields[i].className = '';


      } else {
        objFieldTarget.disabled = true;
        objFormFields[i].className = 'fielddisable';
        }

    } else {
      if(strElementValue.indexOf(objFieldCurrent.value) == -1) {
        objFieldTarget.disabled=true;
        objFormFields[i].className = 'fielddisable';

      } else {

        objFieldTarget.disabled = false;
        objFormFields[i].className = '';
        }
      }
    }
  }

//===========================================================================
// Auxiliar para o prenchimento de valores de acordo com o campo de destino
function FieldChangeValue(objFieldCurrent, objFieldTarget)
  {
  var strElementValue = objFieldTarget.getAttribute(objFieldCurrent.id);

  if(strElementValue.indexOf("=") != -1)
    {
    if(strElementValue.indexOf(",") != -1)
      {
      var arrValues = strElementValue.split(",");

    } else {
      var arrValues = new Array(strElementValue);
      }

    for (i = 0; i < arrValues.length; i++)
      {
      var arrResults = arrValues[i].split("=");

      if(objFieldCurrent.value == arrResults[0])
        {
        objFieldTarget.value = arrResults[1];
        }
      }
    }
  }


//===========================================================================
// Apaga todos os campos ou somente os desabilitados
function ValidateRequiredFields() {
  ValidateRequiredBRFields
  }

//===========================================================================
// Apaga todos os campos ou somente os desabilitados
function ValidateRequiredBRFields() {
  var objFormFields = sobjForm.elements;

  var strMessageAll;

  var blnError, intFormFieldsError, strCurrent

  // objFormFields[i].focus()

  blnFocus = false;
  blnError = false;
  intFormFieldsError = null;
  strMessageAll = "";

  for (i = 0; i < objFormFields.length; i++) {
    blnError = false;

    if (objFormFields[i].tagName != "FIELDSET" && objFormFields[i].tagName != "BUTTON" && objFormFields[i].type != "CHECKBOX") {
      var blnDisabled = objFormFields[i].disabled;

      if (!blnDisabled && objFormFields[i].type != "hidden") {
        var strRequired = objFormFields[i].getAttribute("Required");

        var blnRequired = strRequired != null;

        if (strRequired != null)
          blnRequired = strRequired.length > 0;

        if (!blnRequired && objFormFields[i].className != null) {
          blnRequired = objFormFields[i].className.indexOf("FieldRequired") != -1;

          strRequired = "Campo Obrigatório!";
        }

        if (blnRequired && (objFormFields[i].value.length <= 0 || (objFormFields[i].type.toLowerCase() == "checkbox" && !objFormFields[i].checked))) {
          if (strRequired.toLowerCase() == 'required' || strRequired.toLowerCase() == 'true' || strRequired.toLowerCase() == 'yes')
            strRequired = "Campo Obrigatório!";

          strMessageAll = strMessageAll + strRequired + "\n";

          blnError = true;

        } else {
          if (objFormFields[i].value.length > 0) {
            // Formatadores
            if (objFormFields[i].getAttribute("UpperCase") != null)
              objFormFields[i].value = objFormFields[i].value.toUpperCase();

            if (objFormFields[i].getAttribute("LowerCase") != null || objFormFields[i].getAttribute("EMail") != null)
              objFormFields[i].value = objFormFields[i].value.toLowerCase();

            if (objFormFields[i].getAttribute("AllTrim") != null || objFormFields[i].getAttribute("LeadingZeroes") != null)
              objFormFields[i].value = AllTrim(objFormFields[i].value);

            if (objFormFields[i].getAttribute("RightTrim") != null)
              objFormFields[i].value = RTrim(objFormFields[i].value);

            if (objFormFields[i].getAttribute("LeftTrim") != null)
              objFormFields[i].value = LTrim(objFormFields[i].value);

            if (objFormFields[i].getAttribute("URLEncode") != null)
              objFormFields[i].value = encodeURI(objFormFields[i].value);

            if (objFormFields[i].getAttribute("URLDecode") != null)
              objFormFields[i].value = decodeURI(objFormFields[i].value);

            if (objFormFields[i].getAttribute("NormalizeString") != null)
              objFormFields[i].value = NormalizeString(objFormFields[i].value);

            strCurrent = objFormFields[i].getAttribute("NormalizeNumber");

            if (strCurrent != null)
              objFormFields[i].value = NormalizeNumber(objFormFields[i].value, strCurrent);

            if (objFormFields[i].getAttribute("NormalizeAccents") != null)
              objFormFields[i].value = NormalizeAccents(objFormFields[i].value);

            if (objFormFields[i].getAttribute("NormalizeMoneyBR") != null)
              objFormFields[i].value = NormalizeMoneyBR(objFormFields[i].value);

            if (objFormFields[i].getAttribute("NormalizeMoneyUS") != null)
              objFormFields[i].value = NormalizeMoneyUS(objFormFields[i].value);

            if (objFormFields[i].getAttribute("NormalizeAlpha") != null)
              objFormFields[i].value = NormalizeAlpha(objFormFields[i].value);

            strCurrent = objFormFields[i].getAttribute("LeadingZeroes");

            if (strCurrent != null && strCurrent.length > 0)
              objFormFields[i].value = LeadingZeroes(objFormFields[i].value, strCurrent);

            // Valida a DataBR
            strCurrent = objFormFields[i].getAttribute("DateBR");

            if (strCurrent != null && !isdatebr(objFormFields[i].value)) {
              if (strCurrent.toLowerCase() == 'datebr' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "Data Inválida!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            } else {
              objFormFields[i].value = ((strCurrent != null) ? datetostringbr(stringtodatebr(objFormFields[i].value)) : objFormFields[i].value);

            }

            strCurrent = objFormFields[i].getAttribute("CPF");

            if (strCurrent != null && !isCPF(objFormFields[i].value)) {
              if (strCurrent.toLowerCase() == 'cpf' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "CPF Inválido!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("CNPJ");

            if (strCurrent != null && !isCNPJ(objFormFields[i].value)) {
              if (strCurrent.toLowerCase() == 'cnpj' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "CNPJ Inválido!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;
            }
            strCurrent = objFormFields[i].getAttribute("CPFCNPJ");

            if (strCurrent != null) {
              if(!isCPF(objFormFields[i].value) && !isCNPJ(objFormFields[i].value)) {
                if (strCurrent.toLowerCase() == 'cpfcnpj' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                  strCurrent = "CPF ou CNPJ Inválido!!";

                strMessageAll = strMessageAll + strCurrent + "\n";

                blnError = true;

              } else {
                if(isCPF(objFormFields[i].value))
                  objFormFields[i].value = LeadingZeroes(objFormFields[i].value, 11);

                if(isCNPJ(objFormFields[i].value))
                  objFormFields[i].value = LeadingZeroes(objFormFields[i].value, 14);
              }
            }

            strCurrent = objFormFields[i].getAttribute("EMail");

            if (strCurrent != null && !isEMail(objFormFields[i].value)) {
              if (strCurrent.toLowerCase() == 'email' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "EMail Inválido!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("CEP");

            if (strCurrent != null && !RegExSearch(objFormFields[i].value, '/((^\\d{5}$)|(^\\d{8}$))|(^\\d{5}-\\d{3}$)/')) {
              if (strCurrent.toLowerCase() == 'cep' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "CEP Inválido!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("IPAddress");

            if (strCurrent != null && !RegExSearch(objFormFields[i].value, '/^\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}$/')) {
              if (strCurrent.toLowerCase() == 'ipaddress' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "CEP Inválido!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("Phone");

            if (strCurrent != null && !RegExSearch(objFormFields[i].value, '/^(\\d{2,3}|\\\(\\d{2,3}\\\))?[ ]?\\d{3,4}[-]?\\d{3,4}$/')) {
              if (strCurrent.toLowerCase() == 'phone' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "Telefone Inválido!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("PhoneArea");

            if (strCurrent != null && !RegExSearch(objFormFields[i].value, '/^(\\d{2,3}|\\\(\\d{2,3}\\\))[ ]?\\d{3,4}[-]?\\d{3,4}$/')) {
              if (strCurrent.toLowerCase() == 'phonearea' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "Telefone com código de área Inválido!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "Não foi validado pela RegEx!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("Time24");

            if (strCurrent != null && !RegExSearch(objFormFields[i].value, '/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/')) {
              if (strCurrent.toLowerCase() == 'time24' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "Hora 24h Inválida!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("TimeAMPM");

            if (strCurrent != null && !RegExSearch(objFormFields[i].value, '/^(0[1-9]|1[0-2]):[0-5][0-9][ ]?[APap][mM]$/')) {
              if (strCurrent.toLowerCase() == 'timeampm' || strCurrent.toLowerCase() == 'true' || strCurrent.toLowerCase() == 'yes')
                strCurrent = "Hora AM/PM Inválida!!";

              strMessageAll = strMessageAll + strCurrent + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("RegExSearch");

            if (strCurrent != null && !RegExSearch(objFormFields[i].value, strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "Não foi validado pela RegEx!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("EVal");

            if (strCurrent != null && !eval(strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "A avaliação deu como errado!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("EqualTo");

            if (strCurrent != null && objFormFields[i].value != eval(strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "O campo corrente não é iqual ao avaliado!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("NotEqualTo");

            if (strCurrent != null && objFormFields[i].value == eval(strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "O campo corrente não é diferente ao avaliado!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("LessThen");

            if (strCurrent != null && objFormFields[i].value >= eval(strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "O campo avaliado não é menor que definido!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("GreaterThen");

            if (strCurrent != null && objFormFields[i].value <= eval(strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "O campo avaliado não é maior que definido!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("LessEqualThen");

            if (strCurrent != null && objFormFields[i].value > eval(strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "O campo avaliado não é menor ou igual ao que definido!") + "\n";

              blnError = true;

            }

            strCurrent = objFormFields[i].getAttribute("GreaterEqualThen");

            if (strCurrent != null && objFormFields[i].value < eval(strCurrent)) {
              strCurrent = objFormFields[i].getAttribute("ErrorMessage");

              strMessageAll = strMessageAll + ((strCurrent != null && strCurrent.length > 0) ? strCurrent : "O campo avaliado não é maior ou igual ao que definido!") + "\n";

              blnError = true;

            }

            // strCurrent = objFormFields[i].getAttribute("SelectRecord");
            //
            // if (strCurrent != null && !isEMail(objFormFields[i].value)) {
            //   strMessageAll = strMessageAll + SelectRecord(strMessage, objFormFields[i]);
            //
            //   blnError = true;
            //
            // }
          }
        }
      }
    }

    if(blnError) {
      if(!blnFocus)
        objFormFields[i].focus();

      blnFocus = true;

      if (intFormFieldsError == null)
        intFormFieldsError = i;

      objFormFields[i].setAttribute("classNameOld", objFormFields[i].className);

      objFormFields[i].className = 'fielderror';

      // objFormFields[i].setAttribute("cssTextOld", objFormFields[i].style.cssText);
      // objFormFields[i].style.cssText = "background-color:#FFF7D6;";

    }
  }
  if(intFormFieldsError != null) {
    // objFormFields[intFormFieldsError].focus();

    alert(strMessageAll);

  	if (window.event) {
      event.returnValue=false;
    } else {
      return false;
    }

  } else {
  	if (window.event) {
      event.returnValue=true;
      return true;
    } else {
      return true;
    }
  }
}

function ValidateRequiredBRFieldsX() {
  var objFormFields = sobjForm.elements;

  var strMessageAll;

  for (i = 0; i < objFormFields.length; i++) {
    strMessageAll = "";

    var strMessage = objFormFields[i].getAttribute("Required");

    if(strMessage == null && objFormFields[i].className != null) {
      if(objFormFields[i].className.indexOf("FieldRequired") != -1)
        strMessage = "Campo Obrigatório!";
    }

    if(strMessage != null) {
      if(objFormFields[i].type != "CHECKBOX" && objFormFields[i].tagName != "BUTTON" && !objFormFields[i].disabled) {
        if(objFormFields[i].value.length <= 0) {
          if(strMessage.length <= 0)
            strMessage = "Data Inválida!";

        } else {
          strMessage = null;
        }
      } else {
        strMessage = null;
      }
    } else {
      strMessage = null;
    }

    if(strMessage != null) {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
    }

    strMessage = objFormFields[i].getAttribute("DateBR");

    if(strMessage != null) {
      if(objFormFields[i].value.length > 0) {
        if(!isdatebr(objFormFields[i].value)) {
          if(strMessage.length <= 0)
            strMessage = "Data Inválida!";

        } else {
          objFormFields[i].value = datetostringbr(stringtodatebr(objFormFields[i].value));

          strMessage = null;
        }
      }
    }

    if(strMessage != null && strMessage.length > 0) {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
    }

    strMessage = objFormFields[i].getAttribute("CPF");

    if(strMessage != null) {
      if(objFormFields[i].value.length > 0) {
        if(!isCPF(objFormFields[i].value)) {
          if(strMessage.length <= 0)
            strMessage = "CPF Inválido!";

        } else {
          strMessage = null;
        }
      }
    }

    if(strMessage != null && strMessage.length > 0) {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
    }

    strMessage = objFormFields[i].getAttribute("CGC");

    if(strMessage != null) {
      if(objFormFields[i].value.length > 0) {
        if(!isCNPJ(objFormFields[i].value)) {
          if(strMessage.length <= 0)
            strMessage = "CGC Inválido!";

        } else {
          strMessage = null;
        }
      }
    }

    if(strMessage != null && strMessage.length > 0) {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
    }

    strMessage = objFormFields[i].getAttribute("EMail");

    if(strMessage != null) {
      if(objFormFields[i].value.length > 0) {
        if(!isEMail(objFormFields[i].value)) {
          if(strMessage.length <= 0)
            strMessage = "EMail Inválido!";

        } else {
          strMessage = null;
        }
      }
    }

    if(strMessage != null && strMessage.length > 0) {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
    }

    strMessage = objFormFields[i].getAttribute("SelectRecord");

    if(strMessage != null) {
      strMessage = SelectRecord(strMessage, objFormFields[i]);

    }

    if(strMessage != null && strMessage.length > 0) {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
    }

    if(strMessageAll.length > 0) {
      alert(strMessageAll);
      objFormFields[i].focus();

    	if (window.event) {
        event.returnValue=false;
      } else {
        return false;
      }

      objFormFields[i].setAttribute("classNameOld", objFormFields[i].className);

      objFormFields[i].className = 'fielderror';

      }
    }
  }

//===========================================================================
// Apaga todos os campos ou somente os desabilitados
function ValidateRequiredUSFields()
  {
  var objFormFields = sobjForm.elements;

  var strMessageAll;
  var blnFocus = false;

  for (i = 0; i < objFormFields.length; i++) {
    strMessageAll = "";

    var strMessage = objFormFields[i].getAttribute("Required");

    if(strMessage == null && objFormFields[i].className != null) {
      if(objFormFields[i].className.indexOf("FieldRequired") != -1)
        strMessage = "Field Required!"
      }

    if(strMessage != null) {
      if(objFormFields[i].type != "CHECKBOX" && objFormFields[i].tagName != "BUTTON" && !objFormFields[i].disabled) {
        if(objFormFields[i].value.length <= 0) {
          if(strMessage.length <= 0)
            strMessage = "Field Required!"

        } else {
          strMessage = null
          }
      } else {
        strMessage = null
        }
    } else {
      strMessage = null
      }

    if(strMessage != null && strMessage.length > 0) {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
      }

    strMessage = objFormFields[i].getAttribute("DateUS");

    if(strMessage != null) {
      if(objFormFields[i].value.length > 0) {
        if(!isdateus(objFormFields[i].value)) {
          if(strMessage.length <= 0)
            strMessage = "Invalid Date!"

        } else {
          objFormFields[i].value = datetostringus(stringtodateus(objFormFields[i].value));

          strMessage = null;
          }
        }
      }

    if(strMessage != null && strMessage.length > 0)
      {
      strMessageAll = strMessageAll + strMessage + "\n";

      strMessage = null;
      }

    if(strMessageAll.length > 0) {
      alert(strMessageAll);

      if(!blnFocus){
        objFormFields[i].focus();

        blnFocus = true;

        }

      	if (window.event) {
          event.returnValue=false;
        } else {
          return false;
        }

      objFormFields[i].setAttribute("classNameOld", objFormFields[i].className);

      objFormFields[i].className = 'fielderror';

      }
    }
  }
  //===========================================================================
  // Seleciona o Select de acordo com o valor do parametro OptionValueDefault que
  // está definido no Select
  //
  // OptionSelect(document.all.objConcluido);
  function OptionSelect(objSelect) {
    var strTemp, strOptionValueDefault

    if (objSelect != null) {
      strOptionValueDefault = objSelect.getAttribute("OptionValueDefault").toString().toUpperCase();

      // intLen = strOptionValueDefault.length

      for(var i=0; i < objSelect.options.length; i++) {
        strTemp = objSelect.options[i].value.toUpperCase().toString();

        // alert('(' + strTemp + ')' + '|' + '(' + strOptionValueDefault + ')');

        // alert(strTemp + '|' + strOptionValueDefault);

        // alert(strTemp == strOptionValueDefault);

        if(strTemp == strOptionValueDefault) {
          objSelect.selectedIndex = i;
          break;
          }
        }

      if (objSelect.id.substr(objSelect.id.length - 6).toLowerCase() == "select") {
        objFieldAux = document.getElementById(objSelect.id.substr(0, objSelect.id.length - 6));


        objFieldAux.value = objSelect.options[objSelect.selectedIndex].value;
        }
      } else {alert('Objeto utilizado no OptionSelect não encontrado!')}
    }

//===========================================================================
// Varrer os campos, para avaliar as opções que serão executadas após a
// montagem do formulário.
function ParseFields() {
  var objFormFields = sobjForm.elements;
  var objFirstField = false;


  for (i = 0; i < objFormFields.length; i++) {
    blnError = false;

    if (objFormFields[i].tagName != "FIELDSET" && objFormFields[i].tagName != "BUTTON" && objFormFields[i].type != "CHECKBOX" && objFormFields[i].tagName != "SELECT") {
      if (!objFormFields[i].disabled && objFormFields[i].type != "hidden") {
        if (objFormFields[i].getAttribute("autofocus") != null) {
          objFirstField == true;
          objFormFields[i].focus();
        }

         // if (objFormFields[i].getAttribute("TITLE") != null)
         //  objFormFields[i].onfocus = "StatusTitle();";

      }
    }
  }
}

//===========================================================================
// Limpar os campos de tags específicas

// intAction = 1 - All HTML
// intAction = 2 - All Word HTML
// intAction = 3 - All CSS
// intAction = 4 - All Font
// intAction = 5 - All SPAN
// intAction = 6 - All DIV
// intAction = 7 - All SPAN and DIV

function SweepHTML(strText, intAction) {

  switch(intAction) {
    case 1:
      strText = RegExReplace(strText, '/</?[^>]*>/g', '');
      break;

    case 2:
     // Remove todas as instruções XML de processamento
		  strText = RegExReplace(strText, '/<\\?xml[^>]*>/g', '');

		  // Remove todos os Name Spaces
		  strText = RegExReplace(strText, '/<\/?[a-z]+:[^>]*>/g', '');

		  // remove empy span els
		  strText = RegExReplace(strText, '/<span[^>]*><\/span[^>]*>/g', '');

      // Remove todas os SPANs vazios e duplicados
		  strText = RegExReplace(strText, '/<span><span>/g', '<span>');
		  strText = RegExReplace(strText, '/</span></span>/g', '</span>');

    case 3:
      // Remove todos os atributos de CLASS=
		  strText = RegExReplace(strText, '/(<[^>]+) class=[^ |^>]*([^>]*>)/g', '$1 $2');

      // Remove todos os atributos de STYLE=
		  strText = RegExReplace(strText, '/"(<[^>]+) style=\"[^\"]*\"([^>]*>)/g', '$1 $2');

      break;

    case 4:
      strText = RegExReplace(strText, '/</?font[^>]*>/g', '');
      break;

    case 5:
      strText = RegExReplace(strText, '/</?span[^>]*>/g', '');

    case 6:
      strText = RegExReplace(strText, '/</?div[^>]*>/g', '');
  }
}
