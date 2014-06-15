// ============================================================================
// FormFieldManagerValidation.js
// ----------------------------------------------------------------------------
// Nome     : Gerenciador de campos de formul·rios
// Home     : http://home.zevallos.com/
// Criacao  : 7/31/2001 9:39PM
// Autor    : Ruben Zevallos Jr. <ruben@zevallos.com>
// Versao   : 1.1f
// Local    : BrasÌlia - DF
// Copyright: 97-2004 by Ruben Zevallos(r) Jr.
// License  : Licensed under the terms of the GNU Lesser General Public License
//            http://www.opensource.org/licenses/lgpl-license.php
// ----------------------------------------------------------------------------

//===========================================================================
// Conjunto de funÁıes para a validaÁ„o de formul·rios

//===========================================================================
//
function ZHT_IsAlpha(strChar) {
  var i, blnValid;

  blnValid = false;
  for (i = 0; i < strChar.length; i++) {
    if ((strChar.charAt(i) >= "a" && strChar.charAt(i) <= "z")
    || (strChar.charAt(i) >= "A" && strChar.charAt(i) <= "Z") )
    blnValid = true;
  }
  return blnValid;
}

//===========================================================================
//
function ZHT_ASplit(strString, charSep) {
  var arrAux = new Array(), i, j;


 if (charSep.length == 1) {
   j = 0;
   arrAux[j] = "";
   for (i = 0; i < strString.length; i++) {
     if (strString.charAt(i) != charSep) {
       arrAux[j] = arrAux[j] + strString.charAt(i);
     }
     else {
       j++;
       arrAux[j] = "";
     }
   }

   return arrAux;
  }
  else return NaN;
}

//===========================================================================
//
function midtoend(text, start) {
  return text.substr(start - 1);
  }

//===========================================================================
// Retorna somente n˙meros
function Normalize(text) {
  var i, a, strFinal;
  strFinal = '';

  for (i = 0; i < text.length; i++) {
    a = text.charCodeAt(i);

    if ((a >= 48 && a <= 57))
      strFinal = strFinal + text.charAt(i);
  }

  return strFinal;
}

//===========================================================================
// Retorna somente caracteres A-Z, a-z e 0-9
function NormalizeString(text) {
  var i, a, strFinal;
  strFinal = '';

  for (i = 0; i < text.length; i++) {
    a = text.charCodeAt(i);

    if ((a >= 65 && a <= 90) || (a >= 97 && a <= 122) || (a >= 48 && a <= 57))
      strFinal = strFinal + text.charAt(i);

  }

  return strFinal;
}

//===========================================================================
// Retorna somente caracteres A-Z, a-z e espaÁo
function NormalizeAlpha(text) {
  var i, a, strFinal;
  strFinal = '';

  for (i = 0; i < text.length; i++) {
    a = text.charCodeAt(i);

    if ((a >= 65 && a <= 90) || (a >= 97 && a <= 122) || a == 32)
      strFinal = strFinal + text.charAt(i);

  }

  return strFinal;
}

//===========================================================================
// Retorna somente caracteres A-Z, a-z e 0-9
function NormalizeNumber(text,minus) {
  var i, a, strFinal;
  i = 0;
  strFinal = '';

  for (i = 0; i < text.length; i++) {
    a = text.charCodeAt(i);

    if ((a >= 48 && a <= 57) || (minus.length > 0 && i == 0 && a == 45))
      strFinal = strFinal + text.charAt(i);

  }
  return strFinal;
}

//===========================================================================
// Retorna a string sem os acentos
function NormalizeAccents(text) {
  var i, ac, nc;

  ac = '·‰‚‡„ÈÎÍËÌÔÓÏÛˆÙÚı˙¸˚˘ÁÒ˝ˇ¡ƒ¬¿√…À »ÕœŒÃ”÷‘“’⁄‹€Ÿ«—›';
  nc = 'aaaaaeeeeiiiiooooouuuucnyyAAAAAEEEEIIIIOOOOOUUUUCNY';

  for (i = 0; i < ac.length; i++) {
    text = text.replace(ac.charAt(i), nc.charAt(i));

  }
  return text;
}

//===========================================================================
// Retorna valores padr„o Brasil
function NormalizeMoneyBR(text) {
  var i, a, strFinal, dec;
  i = 0;
  strFinal = '';
  dec = true;

  for (i = text.length; i >= 0; i--) {
    a = text.charCodeAt(i);

    if ((a >= 48 && a <= 57) || (i == 0 && a == 45) || (dec && a == 44))
      strFinal = text.charAt(i) + strFinal;

    if (a == 44)
      dec = false

  }
  return strFinal;
}

//===========================================================================
// Retorna valores padr„o Brasil
function NormalizeMoneyUS(text) {
  var i, a, strFinal, dec;
  i = 0;
  strFinal = '';
  dec = true;

  for (i = text.length; i >= 0; i--) {
    a = text.charCodeAt(i);

    if ((a >= 48 && a <= 57) || (i == 0 && a == 45) || (dec && a == 46))
      strFinal = text.charAt(i) + strFinal;

    if (a == 46)
      dec = false

  }
  return strFinal;
}

//===========================================================================
// Localiza a Regular Expression
function RegExSearch(strText,strRegEx) {

   strRegEx = eval(strRegEx);

   return strText.search(strRegEx) >= 0;

}

//===========================================================================
// Executa um replace com regular expression
function RegExReplace(strText,strRegEx,strReplace) {

   strRegEx = eval(strRegEx);

   return text.replace(strRegEx, strReplace);

}

//===========================================================================
//
function mid(text, start, length)
  {
  return text.substr(start - 1, length);
  }

//===========================================================================
//
function left(text, length)
  {
  return text.substr(0, length);
  }

//===========================================================================
//
function isdate(text)
  {
  return isdatebr(text);
  }

//===========================================================================
//
function isdatebr(text) {
  var Dia, Mes, Ano, data;
  text = Normalize(text);

  if (text.length > 1)
    {
    data = new Date();
    Dia = parseFloat(left(text,2));

    if (text.length > 3)
      {
      Mes = parseFloat(mid(text,3,2));

      if (text.length > 5)
        {
        Ano = parseFloat(midtoend(text,5));
      } else {
        Ano = data.getFullYear();
        }
    } else {
      Mes = data.getMonth();
      Ano = data.getFullYear();
      }

    if ((Mes > 12) || (Mes < 1) || (Ano > data.getFullYear() + 60))
      return false;
    else
      {
      switch(Mes) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
        if ((Dia > 31) || (Dia < 1))
        return false;
        break;
        case 4:
        case 6:
        case 9:
        case 11:
          if ((Dia > 30) || (Dia < 1))
            return false;
          break;
        case 2:
          if (Ano%4>0)
            {
            if ((Dia>28)||(Dia<1))
              return false;}
            else
              if ((Dia>29)||(Dia<1))
                return false;
                break;
            }
      }
  } else
      return false;

  return true;
}

//===========================================================================
//
function isdateus(text) {
  var Dia, Mes, Ano, data;
  text = Normalize(text);

  if (text.length > 1)
    {
    data = new Date();

    Mes = parseFloat(left(text,2));

    if (text.length > 3)
      {
      Dia = parseFloat(mid(text,3,2));

      if (text.length > 5)
        {
        Ano = parseFloat(midtoend(text,5));

      } else {
        Ano = data.getFullYear();
        }
    } else {
      Dia = data.getDate();
      Ano = data.getFullYear();
      }

    if ((Mes > 12) || (Mes < 1) || (Ano > data.getFullYear() + 60))
      return false;

    else
      {
      switch(Mes) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
          if ((Dia > 31) || (Dia < 1))
            return false;
          break;
        case 4:
        case 6:
        case 9:
        case 11:
          if ((Dia > 30) || (Dia < 1))
            return false;
          break;
        case 2:
          if (Ano%4 > 0)
            {
            if ((Dia > 28) || (Dia < 1))
              return false;}
            else
              if ((Dia > 29) || (Dia < 1))
                return false;
                break;
            }
      }
  } else
      return false;

  return true;
}

//===========================================================================
//
function stringtodate(text)
  {
  return stringtodatebr(text);
  }

//===========================================================================
//
function stringtodatebr(text) {
  var Dia, Mes, Ano, data;
  text = Normalize(text);

  data = new Date();

  Dia = parseFloat(left(text, 2));

  if (text.length > 3)
    Mes = parseFloat(mid(text, 3,2));
  else
    Mes = data.getMonth() + 1;

  if (text.length > 5)
    Ano = parseFloat(midtoend(text, 5));
  else
    Ano = data.getFullYear();

  if (Ano < 100)
    {
    if (Ano + 1900 > data.getFullYear() - 70)
      Ano+=1900;
    else
      Ano+=2000;
    }

  data = new Date(Ano, Mes - 1, Dia);

  return data;
}

//===========================================================================
//
// datetostringbr(stringtodatebr(objFormFields[i].value));

function stringtodateus(text) {
  var Dia, Mes, Ano, data;
  text = Normalize(text);
  data = new Date();

  Mes = parseFloat(left(text, 2));

  if (text.length > 3)
    Dia = parseFloat(mid(text, 3,2));
  else
    Dia = data.getDate() + 1;

  if (text.length > 5)
    Ano = parseFloat(midtoend(text, 5));
  else
    Ano = data.getFullYear();

  if (Ano < 100)
    {
    if (Ano + 1900 > data.getFullYear() - 70)
      Ano+=1900;
    else
      Ano+=2000;
    }

  data = new Date(Ano, Mes - 1, Dia);

  return data;
}

//===========================================================================
// Complementa com Zeros a Esquerda
function LeadingZeroes(text, tam) {
  while (text.length < tam) {
    text = "0" + text;
  }
    return text;
}

//===========================================================================
//
function datetostring(data)
  {
  return datetostringbr(data)
  }

//===========================================================================
//
function datetostringbr(data)
  {
  return LeadingZeroes(data.getDate().toString(), 2) + "/" + LeadingZeroes((data.getMonth() + 1).toString(), 2) + "/" + LeadingZeroes(data.getFullYear(), 2);
  }

//===========================================================================
//
function datetostringus(data)
  {
  return LeadingZeroes((data.getMonth() + 1).toString(), 2) + "/" + LeadingZeroes(data.getDate().toString(), 2) + "/" + LeadingZeroes(data.getFullYear(), 2);
  }

//===========================================================================
//
function isCPF(cpf) {
  var cpf, soma, digito, digito2, multip, i, aux, numero;
  soma    = 0;
  multip  = 10;
  cpf     = Normalize(cpf);
  if (cpf.length < 1) {
    return false;
//    break;
  }
  cpf     = LeadingZeroes(cpf, 11);
  for (i = 0;i <= 8;i++) {
    number = parseInt(cpf.charAt(i));
    soma  += (number * multip);
    multip+= - 1;
  }
  aux = soma % 11;
  if ((aux == 0) || (aux == 1)) digito = 0;
  else digito = 11 - aux;
  if (parseInt(cpf.charAt(9)) == digito) {
    multip = 11;
    soma   = 0;
    for (i = 0;i <= 9;i++) {
      numero = parseInt(cpf.charAt(i));
      soma  += (numero * multip);
      multip+= - 1;
    }
    aux = soma % 11;
    if ((aux == 0) || (aux == 1)) digito = 0;
    else digito = 11 - aux;
    if (parseInt(cpf.charAt(10)) == digito) return true;
    else {
      return false;
//      break;
    }
  }
  else {
    return false;
//    break;
  }
}

//===========================================================================
//
function isEMail(email) {
   var Valid, strDomain, strUser, i, intCount;
   var arrAux;

   if (email == "") {
       return true;
   }
   else {
       Valid = false;

       if (email.charAt(email.length - 1) == ".") {
         email = email.substr(0, email.length - 1);
         //document.frmEditForm.usuEmail.value = email;
       }

       if (email.indexOf("@") > 0) {
           strDomain = email.substr(email.indexOf("@") + 1, email.length - (email.indexOf("@") + 1));
           strUser = email.substr(0, email.indexOf("@"));

           arrAux = ZHT_ASplit(strUser, ".");

       intCount = -1;
       for (i = 0; i <= arrAux.length - 1; i++) {
         if (arrAux[i] > "" && arrAux[i].indexOf("@") == -1) {
             intCount++;
         }
       }

       if (intCount == arrAux.length - 1) Valid = true;

       if (Valid) {

         Valid = false;
         arrAux = ZHT_ASplit(strDomain, ".");

           intCount = -1;
           for (i = 0; i <= arrAux.length - 1; i++) {

             if (arrAux[i] > "" && ZHT_IsAlpha(arrAux[i].charAt(0)) && arrAux[i].indexOf("@") == -1) {
             intCount++;
             }
           }

         if (intCount == arrAux.length - 1) Valid = true;

         }

       }
       if (!Valid) {
           return false;
       }
       else {
           return true;
       }

   }
}

//===========================================================================
// 000.733.663/0001-15
function isCNPJ(cnpj) {
  var soma, digito, digito2, multip, i, aux, numero;
  soma   = 0;
  multip = 5;

  cnpj = Normalize(cnpj);

  if (cnpj.length < 1)
    return false;

  cnpj = LeadingZeroes(cnpj, 14);

  for (i = 0;i <= 11;i++) {
    number = parseInt(cnpj.charAt(i));
    soma  += (number * multip);
    multip--;
    if (multip < 2) multip = 9;
  }
  aux = soma % 11;
  if ((aux == 0) || (aux == 1))
    digito = 0;
  else
    digito = 11 - aux;

  if (parseInt(cnpj.charAt(12)) == digito) {
    multip = 6;
    soma   = 0;
    for (i = 0;i <= 12;i++) {
      numero = parseInt(cnpj.charAt(i));
      soma  += (numero * multip);
      multip+= - 1;
      if (multip < 2) multip = 9;

    }
    aux = soma % 11;
    if ((aux == 0) || (aux == 1))
      digito = 0;
    else
      digito = 11 - aux;

    if (parseInt(cnpj.charAt(13)) == digito)
      return true;
    else {
      return false;
    }
  }
  else {
    return false;
  }
}

//===========================================================================
// Retorna o n˙mero de dias entre 2 datas
  function DateDiff(strDE, strATE)
    {
    intDE = NumberOfDays(stringtodatebr(strDE));
    intATE = NumberOfDays(stringtodatebr(strATE));

    if (intATE >= intDE)
      {
      return intATE - intDE;
    } else {
      return -1
      }
    }

//===========================================================================
// Retorna o n˙mero de dias entre 01/01/1900
  function NumberOfDays(datDate)
    {
    intFullYear = datDate.getFullYear();
    intMonth = datDate.getMonth();
    intDays = 0;

    if (intFullYear > 1900)
      {
      intDays = datDate.getDate();

      intYears = intFullYear - 1900;

      intDays += intYears * 365 + Math.round(intFullYear % 4);

      if (intMonth >= 1) intDays += 31
      if (intMonth >= 2) intDays += 28
      if (intMonth >= 3) intDays += 31
      if (intMonth >= 4) intDays += 30
      if (intMonth >= 5) intDays += 31
      if (intMonth >= 6) intDays += 30
      if (intMonth >= 7) intDays += 31
      if (intMonth >= 8) intDays += 31
      if (intMonth >= 9) intDays += 30
      if (intMonth >= 10) intDays += 31
      if (intMonth >= 11) intDays += 30
      if (intMonth >= 12) intDays += 31

      }

    return intDays;

    }

//===========================================================================
// ValidaÁ„o do formato e complemento do CEP
// Verificar os formatos de CEP como 99999, 99999-999 e 99999999, ou seja, 5 ou 8 n˙meros.
// No caso dos 5 n˙meros, ele dever· colocar o -000

function isCEP(cep) {
 var blnValid

 blnValid = true;

 if (cep > '' ) {
   if ((Mask('00.000-XXX', cep) || Mask('00000-XXX', cep))) {
     if (!(Mask('00.000-000', cep) || Mask('00000-000', cep))) {
       cep = PutMask('00.000-000',  cep);
     }

   } else {
     if (!Mask('00000XXX', cep)) {
       if (isNaN(parseInt(cep))) {
          cep = '';

         blnValid = false;
       } else {
          cep = LeadingZeroes(cep, 8);

          cep = PutMask('00.000-000',  cep);

         blnValid = false;
       }
     } else {
        cep = PutMask('00.000-000',  cep);
     }
   }
 }
 return blnValid
}

//===========================================================================
// Executor de mascaras
function Mask(parMask, parReceive){
 var i, vchar, mchar, intCount;

  intCount = 0;

  for (i=0; i <= parMask.length; i++){
    mchar = parMask.charAt(i);

    if (i <= parReceive.length){
     vchar = parReceive.charAt(i);
    }
    else {
      vchar = "";
    }

    switch(mchar){
    case '0':
      if (isNaN(parseInt(vchar))) intCount++;
      break;
    case 'X':
      if (vchar > ""){
       if (isNaN(parseInt(vchar))) intCount++;
      }
      break;
    case 'A':
      if (!((vchar>='a' && vchar<='z') || (vchar>='A' && vchar<='Z'))) intCount++;
      break;
    default:
      if (vchar!=mchar) intCount++;
    }

  }

  if (intCount>0) return false; else return true;
}

//===========================================================================
// Aplica a m·scara em um texto
function PutMask(mask,texto){
  var i, j, result

  i = 0; j = 0; result = '';

  while(i<=mask.length){
    switch(mask.charAt(i)){
    case '0':
      if (!isNaN(parseInt(texto.charAt(j)))) result = result.concat(parseInt(texto.charAt(j)));
      else result = result.concat('0');
      break;
    case 'A':
      if (((texto.charAt(j)>='a' && texto.charAt(j)<='z') || (texto.charAt(j)>='A' && texto.charAt(j)<='Z')))
        result = result.concat(parseInt(texto.charAt(j)));
      else result = result.concat('A');
      break;
    default:
      result = result.concat(mask.charAt(i));
      j--;
    }

    if (j<=texto.length) j++;
    i++
  }

  return result;
}

//===========================================================================
// Tira todos os espaÁos em branco Char(20) a direita e esquerda
function AllTrim(strValue)
{
  return(RTrim(LTrim(strValue)));
}

//===========================================================================
// Tira todos os espaÁos em branco Char(32) a esquerda
function LTrim(strValue)
{
	while (strValue.charCodeAt(0) == 32) {
	  strValue = strValue.substr(1)
	}
	return(strValue);
}

//===========================================================================
// Tira todos os espaÁos em branco Char(32) a direita
function RTrim(strValue)
{
  while (strValue.charCodeAt(strValue.length - 1) == 32) {
	  strValue = strValue.substr(0, strValue.length - 1)
	}
	return(strValue);
}
