// ============================================================================
// FormSelectKeyboardLocate.js
// ----------------------------------------------------------------------------
// Nome     : Bibilioteca para localização de textos nos Selects
// Home     : http://home.zevallos.com/
// Criacao  : 5/28/2001 11:47PM
// Autor    : Ruben Zevallos Jr. <ruben@zevallos.com>
// Versao   : 1.1f
// Local    : Brasília - DF
// Copyright: 97-2004 by Ruben Zevallos(r) Jr.
// License  : Licensed under the terms of the GNU Lesser General Public License
//            http://www.opensource.org/licenses/lgpl-license.php
// ----------------------------------------------------------------------------

// Seleção digitada de Selects
var sstrKeyDownBuffer = "";

SelectKeyDownClear();

//===========================================================================
function SelectKeyDownClear() {
  window.status = "";
  sstrKeyDownBuffer = '';
  }

//===========================================================================
function SelectKeyDown(event) {
	if (window.event) {
	  var objSelect = window.event.srcElement;
	  var intKeyCode = window.event.keyCode;

    event.cancelBubble = true;

	} else {
	  var objSelect = event.target;
	  var intKeyCode = event.which;
	}

  strKeyCode = String.fromCharCode(intKeyCode);

  // window.status = sstrKeyDownBuffer + ' - ' + intKeyCode;

  if (strKeyCode != "" && ((intKeyCode >= 65 && intKeyCode <= 90) || intKeyCode == 32 || intKeyCode == 8)) {
    blnOk = false;

    if (intKeyCode != 8)
      sstrKeyDownBuffer += strKeyCode;

    intLen = sstrKeyDownBuffer.length;

    for(var i = 0; i < objSelect.options.length; i++) {
      strTemp = objSelect.options[i].text;
      strTemp = strTemp.toUpperCase();

      if(strTemp.length >= intLen && strTemp.substring(0, intLen) == sstrKeyDownBuffer) {
        //objSelect.options[i].selected = true;
        objSelect.selectedIndex = i;
        blnOk = true;
        break;
        }
      }

    if(!blnOk || intKeyCode == 8) {
      if(sstrKeyDownBuffer != "") {
        sstrKeyDownBuffer = sstrKeyDownBuffer.substring(0, sstrKeyDownBuffer.length - 1);

      } else {
        objSelect.selectedIndex = 0;
        SelectKeyDownClear();
      }
    }

    objSelect.selectedIndex = objSelect.selectedIndex;

    document.getElementById(objSelect.id.substr(0, objSelect.id.length - 6)).value = objSelect.options[objSelect.selectedIndex].value;

    window.status = sstrKeyDownBuffer;

  	if (window.event) {
      event.returnValue=false;
      return false;

    } else {
      return false;
    }

  } else {
    // 33 - PgUp
    // 34 - PgDn
    // 35 - End
    // 36 - Home
    // 37 - Esquerda
    // 39 - Direita

    if(intKeyCode == 13 || intKeyCode == 27 || (intKeyCode >= 33 && intKeyCode <= 40) || intKeyCode == 255)
      SelectKeyDownClear();

    window.status = sstrKeyDownBuffer;

  	if (window.event) {
      event.returnValue=true;
      return true;
    } else {
      return true;
    }
  }

}

//===========================================================================
function SetValue(objFrom, objTo)
  {
  var strValue = new String();

  for(i = 0; i < objFrom.options.length; i++)
    {
    if(objFrom.options[i].value != "" && objFrom.options[i] != "")
      {
      strValue += objFrom.options[i].value + ","
      }
    }

  if(strValue != "")
    {
    strValue = strValue.substring(0, strValue.length - 1);
    objTo.value = strValue;
    }
  }
