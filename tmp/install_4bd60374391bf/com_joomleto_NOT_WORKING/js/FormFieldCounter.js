// ============================================================================
// FormFieldCounter.js
// ----------------------------------------------------------------------------
// Nome     : Contador e delimitador de campos de formulários
// Home     : http://home.zevallos.com/
// Criacao  : 5/28/2001 11:47PM
// Autor    : Ruben Zevallos Jr. <ruben@zevallos.com>
// Versao   : 1.1f
// Local    : Brasília - DF
// Copyright: 97-2004 by Ruben Zevallos(r) Jr.
// License  : Licensed under the terms of the GNU Lesser General Public License
//            http://www.opensource.org/licenses/lgpl-license.php
// ----------------------------------------------------------------------------

//=============================================================================
// Contadores e delimitadores de campos
// ----------------------------------------------------------------------------

//=============================================================================
// Contador de campo
function FieldCounter(event) {
	if (window.event) {
	  var objField = window.event.srcElement;

    window.event.cancelBubble = true;

	} else {
	  var objField = event.target;
	}

  var blnIncrement = objField.getAttribute("increment") == "1";

  var intSize = (objField.getAttribute("size") == null ? ((objField.size == null) ? 0 : objField.size) : objField.getAttribute("size"));

  var objCounterTarget = document.getElementById(objField.id + "Counter");

  if(objCounterTarget != null)
  	if (window.event) {
      objCounterTarget.innerText = ((blnIncrement) ? objField.value.length : intSize - objField.value.length);

    } else {
      var strHTML = document.createTextNode(((blnIncrement) ? objField.value.length : intSize - objField.value.length));
      objCounterTarget.replaceChild(strHTML , objCounterTarget.childNodes[0]);
    }
  }

//=============================================================================
// Delimitador de campo pela quantidade de caracteres
function FieldDelimiter(event) {
	if (window.event) {
	  var objField = window.event.srcElement;

	} else {
	  var objField = event.target;
	}

  var intSize = (objField.getAttribute("size") == null ? objField.size : objField.getAttribute("size"));

  var blnCounter = true;

  if (intSize != null && intSize > 0) {
    blnCounter = (objField.value.length <= intSize);

    if (blnCounter) {
      objField.defaultValue = objField.value;

    } else {
      objField.value = objField.defaultValue;
      }

  }

	if (window.event) {
    // event.returnValue = blnCounter;
    return blnCounter;

  } else {
    return blnCounter;
  }

  }

//----------------------------------------------------------------------- -->

