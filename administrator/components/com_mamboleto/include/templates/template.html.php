<!--

*
* *- *- *- *- *- *- MAMBOLETO Joomla! -* -* -* -* -* -*
* @version 2.0 RC3
* @author Fernando Soares
* @copyright Fernando Soares - http://www.fernandosoares.com.br/
* @date Agosto, 2008
* @package Joomla! 1.5

Baseado no trabalho de 	Matheus Mendes e Pedro Müller ( contato@mambopros.net )
				Messuka ( messuka@messuka.com.br )
				Metasig http://www.metasig.com.br
*

-->

<style> img{ margin:0 !important; } 
.txt_print a{ font-family:"Trebuchet MS", arial; font-size:16px; color:#990000; font-weight:bold; text-decoration:none;}
.txt_print a:hover{ font-family:"Trebuchet MS", arial; font-size:16px; color:#990000; font-weight:bold; text-decoration:underline;}
</style>
<table width="630" cellspacing="0" cellpadding="0" border="0">
<font size="2" face="%HTMLFONT%"><b>Instruções: </b></font>
<tr>
  <td align="left"><span class="txt_print"><a href="javascript:window.print()">Clique aqui para imprimir este boleto.</a></span></td>
</tr>
<tr>
  <td align="left">&nbsp;</td>
</tr>
<tr>
<td align="left">
<ul>
<font SIZE='1' face='%HTMLFONT%'>

  <li>Para impressão utilize <font color='#FF0000'>tamanho de fonte normal ou médio</font> (menu Exibir, opção Tamanho da Fonte ou opção Zoom)</li>
  <li>Ao imprimir utilize papel A4 e impressora jato de tinta ou laser em <font color='#FF0000'>qualidade normal</font>. (não utilize qualidade rascunho)</li>
  <li>Caso prefira pagar via internet, por Home Banking ou outro meio, utilize as seguintes informações:</li>
  <li><font size='2'>Valor: <b>R$ %VDOC%</b>&nbsp;-&nbsp;Linha digitável: <b>%LINHA%</b></font></li>
</font>
</ul></td>
</tr>
</table>
<table width="630" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td align="left">
        <img src="%SEU_LOGO%">
    </td>   
    <td align="RIGHT" valign="BOTTOM">
    <div align="right">
    <font size="2" face="%HTMLFONT%"><b>RECIBO DO SACADO</b></font>
    </div>
    </td>
  </tr>
</table>
<table width="630" border="1" style="border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" cellspacing="0" cellpadding="2">
  <tr>
    <td width="250" align="left" valign="top" style="border-bottom: 0px; border-left: 0px;">
    <font face="%HTMLFONT%" size="1">Cedente:</font><br>
    <font size="1" face="%HTMLFONT%"><b>%CDTE%</b></font><br>
    </td>
    <td width="140" align="left" valign="top" style="border-bottom: 0px; border-left: 0px;">
    <div align="left"><font face="%HTMLFONT%" SIZE="1">Agência/Cod. Cedente</font><br>
    <font size="1" face="%HTMLFONT%"><center><b>%AGCOD%</b></center></font>
    </div>
    </td>
    <td width="123" align="left" valign="top" style="border-bottom: 0px; border-left: 0px;">
    <div align="left"><font face="%HTMLFONT%" SIZE="1">Data do Documento</font><br>
    <font size="1" face="%HTMLFONT%"><center><b>%DDOC%</b></center></font>
    </div>
    </td>
    <td width="108" align="right" valign="top" style="border-bottom: 0px; border-left: 0px; border-right: 0px;">
    <div align="left"><font face="%HTMLFONT%" SIZE="1">Vencimento<br>
    </font><font size="2" face="%HTMLFONT%"><center><b>%VCTO%</b></center></font>
    </div>
    </td>
  </tr>
</table>
<table width="630" border="1" style="border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" cellspacing="0" cellpadding="2">
  <tr>
    <td  valign="top" width="250" align="left" style="border-bottom: 0px; border-left: 0px;">
    <font face="%HTMLFONT%" SIZE="1">Sacado<br>
    </font><font size="1" face="%HTMLFONT%"><b>%SACADO%</b></font>
    </td>
    <td valign="top" width="140" align="left" style="border-bottom: 0px; border-left: 0px;">
    <font face="%HTMLFONT%" SIZE="1"> Número Documento<br>
    </font><font size="1" face="%HTMLFONT%"><center><b>%NDOC%</b></center></font>
    </td>
    <td valign="top" width="122" align="left" style="border-bottom: 0px; border-left: 0px;">
    <font face="%HTMLFONT%" SIZE="1"> Nosso Número<br>
    </font><font size="1" face="%HTMLFONT%"><center><b>%NNUM%</b></center></font>
    </td>
    <td valign="top" width="108" style="border-bottom: 0px; border-left: 0px; border-right: 0px;">
    <div align="left"><font face="%HTMLFONT%" SIZE="1">Valor do Documento<br>
    </font><font face="%HTMLFONT%" size="2"><center><b>%VDOC%</b></center></font>
    </div>
    </td>
  </tr>
</table>
<table width="630" border="1" cellspacing="0" cellpadding="2" style="border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;">
  <tr>
    <td width="100%" align="left" style="border-left: 0px; border-right: 0px;">
    <font face="%HTMLFONT%" SIZE="1">Demonstrativo:<br>
    <b>%DEMONS1%<br>
    %DEMONS2%<br>
    %DEMONS3%<br>
    %DEMONS4%<br>
    %DEMONS5%<br>
    %DEMONS6%<br>
    %DEMONS7%<br>
    %DEMONS8%<br>
    %DEMONS9%</b></font>
    </td>
  </tr>
</table>
<table width="630" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="100%" align="right"><b><font size="1" face="%HTMLFONT%">Autenticação mecânica</font></b><br>
    </td>
  </tr>
  <tr>
    <td width="100%" align="center">&nbsp;</td>
  </tr>
</table>
<table width="630" cellspacing="0" cellpadding="0" border="1" style="border-style: dashed; border-bottom: 0px; border-right: 0px; border-top: 0px; border-left: 0px;">
  <tr>
    <td align="left" style="border-style: dashed; border-right: 0px; border-left: 0px; border-top: 0px;">
    <div align="left">
    <b><i><font face="%HTMLFONT%" SIZE="1">Corte na linha abaixo</font></i></b>
    </div>
    </td>
  </tr>
</table>
<br>
<table width="630" cellspacing="0" cellpadding="0" border="1" style="border-bottom: 0px; border-top: 0px; border-left: 0px; border-right: 0px">
  <tr>
<!--    <td width="37" style="border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px">
    <img src="%BOLETO_IMAGE_URL%/%BANKCODE%.gif" width="37" height="34" border="0" >
    </td> -->
    <td width="177" colspan="2" style="border-left: 0px; border-bottom: 0px; border-top: 0px">
    <div align="center">
    <img src="%BOLETO_IMAGE_URL%/%BANK%.jpg" border="0" >
<!--    <b><font size="2" face="%HTMLFONT%">%BANK%</font></b> -->
    </div>
    </td>
    <td width="70" style="border-left: 0px; border-bottom: 0px; border-top: 0px">
    <div align="center">
    <b><font size="4" face="%HTMLFONT%">%BANKCODE%</font></b>
    </div>
    </td>
    <td valign="MIDDLE" width="420" nowrap style="border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px">
    <div align="center">
    <font size="2" face="%HTMLFONT%"><b>%LINHA%</b></font>
    </div>
    </td>
  </tr>
</table>
<table width="630" border="1" cellspacing="0" cellpadding="1" style="border-bottom: 0px; border-top: 0px; border-left: 0px; border-right: 0px;">
  <tr>
    <td valign="top" colspan="6" style="border-left: 0px; border-bottom: 0px; border-right: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="1">
      <tr>
        <td align="left" valign="top" width="110"><font face="%HTMLFONT%" SIZE="1">Local de Pagamento:</font><br>
        </td>
      </tr>
      <tr>
        <b><td valign="top" align="center"><font size="1" face="%HTMLFONT%">%LP%</font></b><br>
        </td>
      </tr>
    </table>
    </td>
    <td width="150" style="border-right: 0px; border-bottom: 0px">
    <table cellspacing="0" cellpadding="1" height="100%" width="100%" border="0">
      <tr>
        <td align="left">
        <font face="%HTMLFONT%" size="1">Vencimento</font><br>
        </td>
      </tr>
      <tr>
        <td align="RIGHT">
        <div align="center">
        <b><font face="%HTMLFONT%" size="2">%VCTO%</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td colspan="6" width="487" valign="top" style="border-left: 0px; border-bottom: 0px; border-right: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">
        <font face="%HTMLFONT%" SIZE="1">Cedente</font><br>
        </td>
      </tr>
      <tr>
        <td valign="top">
        <b><font size="1" face="%HTMLFONT%">%CDTE%</font></b><br>
        </td>
      </tr>
    </table>
    </td>
    <td style="border-right: 0px; border-bottom: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="1">
      <tr>
        <td align="left">
        <font face="%HTMLFONT%" SIZE="1">Agência/Código Cedente</font><br>
        </td>
      </tr>
      <tr>
        <td align="RIGHT">
        <div align="center">
        <b><font size="1" face="%HTMLFONT%">%AGCOD%</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="120" style="border-left: 0px; border-bottom: 0px; border-right: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left">
        <font face="%HTMLFONT%" SIZE="1">Data do documento:</font><br>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <div align="center">
        <b><font size="1" face="%HTMLFONT%" >%DDOC%</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
    <td width="120" colspan="2" style="border-bottom: 0px; border-right: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="1">
      <tr>
        <td align="left">
        <font face="%HTMLFONT%" SIZE="1">No. do documento</font><br>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <b><font size="1" face="%HTMLFONT%" >%NDOC%</font></b><br>
        </td>
      </tr>
    </table>
    </td>
    <td width="80" style="border-bottom: 0px; border-right: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        <div align="left">
        <font face="%HTMLFONT%" SIZE="1">Espécie doc.</font><br>
        </div>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <div align="center">
        <font size="1" face="%HTMLFONT%"><b>%EDOC%</b></font><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
    <td width="40" style="border-bottom: 0px; border-right: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        <div align="left">
        <font face="%HTMLFONT%" SIZE="1">Aceite</font><br>
        </div>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <div align="center">
        <b><font size="1" face="%HTMLFONT%" >N</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
    <td width="110" valign="top" style="border-bottom: 0px; border-right: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="1">
      <tr>
        <td >
        <div align="left">
        <font face="%HTMLFONT%" SIZE="1">Data Processamento</font><br>
        </div>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <div align="center">
        <b><font size="1" face="%HTMLFONT%" >%DPROC%</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
    <td width="140" style="border-right: 0px; border-bottom: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left">
        <font face="%HTMLFONT%" SIZE="1">Nosso Número</font><br>
        </td>
      </tr>
      <tr>
        <td align="RIGHT">
        <div align="center">
        <b><font size="1" face="%HTMLFONT%" >%NNUM%</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="110" valign="top" style="border-bottom: 0px; border-right: 0px; border-left: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">
        <font face="%HTMLFONT%" SIZE="1">Uso do Banco</font><br>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <b><font face="%HTMLFONT%" SIZE="1">%USOBC%</font></b><br>
        </td>
      </tr>
    </table>
    </td>
    <td width="38" valign="top" style="border-right: 0px; border-bottom: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top">
        <div align="left">
        <font face="%HTMLFONT%" SIZE="1">Carteira</font><br>
        </div>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <div align="center">
        <b><font size="1" face="%HTMLFONT%">%CART%</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
    <td width="118" valign="top" style="border-right: 0px; border-bottom: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        <div align="left">
        <font face="%HTMLFONT%" SIZE="1">Espécie da Moeda</font><br>
        </div>
        </td>
      </tr>
      <tr align="CENTER">
        <td>
        <div align="center">
        <b><font size="1" face="%HTMLFONT%" >%ESPMOED%&nbsp; </font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
    <td width="90" colspan="2" valign="top" style="border-right: 0px; border-bottom: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="1">
      <tr>
        <td align="left" valign="top">
        <font face="%HTMLFONT%" SIZE="1">Quantidade </font><br>
        </td>
      </tr>
      <tr>
        <td align="CENTER">
        <b><font face="%HTMLFONT%" SIZE="1">%QTDE%</font></b><br>
        </td>
      </tr>
    </table>
    </td>
    <td width="120" valign="top" style="border-right: 0px; border-bottom: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="1">
      <tr>
        <td align="left" valign="top">
        <font face="%HTMLFONT%" SIZE="1">(x) Valor</font><br>
        </td>
      </tr>
      <tr>
        <td align="center">
        <b><font face="%HTMLFONT%" SIZE="1">%VMOED%</font></b><br>
        </td>
      </tr>
    </table>
    </td>
    <td width="150" style="border-right: 0px; border-bottom: 0px">
    <table border="0" height="100%" width="100%" cellpadding="1" cellspacing="0">
      <tr>
        <td align="left" height="50%">
        <font face="%HTMLFONT%" SIZE="1">(=) Valor do Documento </font><br>
        </td>
      </tr>
      <tr>
        <td align="RIGHT" height="50%">
        <div align="center">
        <b><font face="%HTMLFONT%" SIZE="2">%VDOC%</font></b><br>
        </div>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td colspan="6" valign="TOP" style="border-right: 0px; border-bottom: 0px; border-left: 0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr valign="MIDDLE">
        <td align="left" height="23" valign="top">
        <font face="%HTMLFONT%" SIZE="1"><b>Instruções (Texto de responsabilidade do cedente) </b><br></font>
        </td>
      </tr>
      <tr valign="TOP">
        <td align="left">
        <font face="%HTMLFONT%" size="1">
        %INSTR1%<br>
        %INSTR2%<br>
        %INSTR3%<br>
        Anuidade: R$ %VALORANUIDADEDESCRIMINADA%<br />
        %INSTR4%<br>
        %INSTR5%
        </font>
        </td>
      </tr>
    </table>
    </td>
    <td style="border-right: 0px; border-bottom: 0px">
    <table width="100%" border="1" cellspacing="0" cellpadding="1" style="border-bottom: 0px; border-top: 0px; border-left: 0px; border-right: 0px;">
      <tr valign="TOP">
        <td align="left" height="23" style="border-right: 0px; border-top: 0px; border-left: 0px">
        <font face="%HTMLFONT%" SIZE="1">(-) Descontos/Abatimento <br><center>%DESC%</center></font>
        </td>
      </tr>
      <tr valign="TOP">
        <td align="left" height="23" style="border-right: 0px; border-top: 0px; border-left: 0px">
        <font face="%HTMLFONT%" SIZE="1">(-) Outras Deduções <br><center>%DDC%</center></font>
        </td>
      </tr>
      <tr valign="TOP">
        <td align="left" height="23" style="border-right: 0px; border-top: 0px; border-left: 0px">
        <font face="%HTMLFONT%" SIZE="1">(+) Mora/Multa <br><center>%MULTA%</center></font>
        </td>
      </tr>
      <tr valign="TOP">
        <td align="left" height="23" style="border-right: 0px; border-top: 0px; border-left: 0px">
        <font face="%HTMLFONT%" SIZE="1">(+) Outros Acréscimos <br><center>%ACRES%</center></font>
        </td>
      </tr>
      <tr valign="TOP">
        <td align="left" height="23" style="border-right: 0px; border-top: 0px; border-left: 0px; border-bottom: 0px">
        <font face="%HTMLFONT%" SIZE="1">(=) Valor Cobrado <br><center>%VCOBR%</center></font>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td colspan="7" style="border-right: 0px; border-left: 0px">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" width="100" style="border-top: 0px">
            <font face="%HTMLFONT%" SIZE="1">Sacado:&nbsp;</font><br>
          </td>
          <td align="left" width="100%" valign="top">
            <font size="1" face="%HTMLFONT%" ><b>%SACADO%</b></font><br>
          </td>
        </tr>

        <tr>
          <td align="left" valign="top" width="100" style="border-top: 0px">
            <font face="%HTMLFONT%" SIZE="1">CPF&nbsp;/&nbsp;CNPJ:&nbsp;</font><br>
          </td>
          <td align="left" width="100%" valign="top">
            <font size="1" face="%HTMLFONT%" ><b>%CPF%</b></font><br>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top" width="100" style="border-top: 0px">
            <font face="%HTMLFONT%" SIZE="1">Sacador&nbsp;/&nbsp;Avalista:&nbsp;</font><br>
          </td>
          <td align="left" width="100%" valign="top" >
            <font size="1" face="%HTMLFONT%" ><b>%SACADOR%</b></font><br>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="630" cellspacing="0" cellpadding="1" border="0">
  <tr>
    <td align="left" width="490" nowrap>
      <img src="%BOLETO_IMAGE_URL%espaco.gif" valign="bottom" border="0" height="5" width="5"><br>%BAR%
    </td>
    <td valign="top" align="right" width="140">
      <div align="right" style="padding-left: 1px;">
      <b><font size="1" face="%HTMLFONT%" >Ficha de Compensação</font></b><br>
      <font face="%HTMLFONT%" SIZE="1">Autenticação Mecânica</font>
      </div>
    </td>
  </tr>
</table>
<table width="630" cellspacing="0" cellpadding="0" border="1" style="margin-top: 4px; border-style: dashed; border-bottom: 0px; border-right: 0px; border-top: 0px; border-left: 0px; border-right: 0px;">
<!-- Para adequar ao padro de espaamento -->
  <tr>
    <td align="left" style="border: 0px" nowrap>
      <img src="%BOLETO_IMAGE_URL%espaco.gif" height="15" width="1">
    </td>
  </tr>
<!-- Para adequar ao padro de espaamento -->
  <tr>
    <td align="left" style="border-style: dashed; border-right: 0px; border-left: 0px; border-bottom: 0px;">
      <b><i><font face="%HTMLFONT%" SIZE="1">Corte na linha acima</i></b></font>
    </td>

    <td align="right"style="border-style: dashed; border-right: 0px; border-left: 0px; border-bottom: 0px;">
      <font face="%HTMLFONT%" SIZE="1">MamboletoJoomla! - www.fernandosoares.com.br</font>
    </td>
  </tr>
</table>