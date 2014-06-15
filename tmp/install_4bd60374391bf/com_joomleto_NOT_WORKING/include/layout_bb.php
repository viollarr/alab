<?
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +---------------------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>              |
// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo|
// +---------------------------------------------------------------------------------+
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE><? echo $dadosboleto["identificacao"]; ?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licença GPL" />
<META content="MSHTML 6.00.2800.1400" name=GENERATOR>
<style type="text/css">
<!--
.ti {font: 9px Arial, Helvetica, sans-serif}
-->
</style>
</HEAD>
<BODY>
<STYLE>BODY {
	FONT: 10px Arial
}
.Titulo {
	FONT: 9px Arial Narrow; COLOR: navy
}
.Campo {
	FONT: 10px Arial; COLOR: black
}
TD.Normal {
	FONT: 12px Arial; COLOR: black
}
TD.Titulo {
	FONT: 9px Arial Narrow; COLOR: navy
}
TD.Campo {
	FONT: bold 10px Arial; COLOR: black
}
TD.CampoTitulo {
	FONT: bold 15px Arial; COLOR: navy
}
</STYLE>


<DIV align=center>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=normal>
      <DIV align=center>
		<table width=666 cellspacing=5 cellpadding=0 border=0 align=Default>
		  <tr>
		    <td width=41><IMG SRC="imagens/logo_empresa.gif"></td>
		    <td class=ti width=455><? echo $dadosboleto["identificacao"]; ?> <?=isset($dadosboleto["cpf_cnpj"]) ? $dadosboleto["cpf_cnpj"] : '' ?><br>
			<? echo $dadosboleto["endereco"]; ?><br>
			<? echo $dadosboleto["cidade_uf"]; ?><br>
		    </td>
		    <td align=RIGHT width=150 class=ti>&nbsp;</td>
		  </tr>
		</table>
        <p><B>O pagamento deste boleto também poderá ser efetuado 
          nos terminais de Auto-Atendimento BB.</B></p>
        </DIV>
      <P><B>Instruções:</B><BR>
      <OL>
        <LI>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade 
        normal ou alta Não use modo econômico.<BR><B>Por favor, configure a 
        margens esquerda e direita para 17 mm</B><BR>
        <LI>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens 
        mínimas à esquerda e à direita do formulário.<BR>
        <LI>Corte na linha indicada. Não rasure, risque, fure ou dobre a região 
        onde se encontra o código de barras. </LI></OL></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD></TR></TBODY></TABLE><BR><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=campo width=150><IMG 
      src="imagens/logobb.jpg" 
      border=0></TD>
    <TD width=3><IMG height=22 
      src="imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=middle width=46><?=$dadosboleto["codigo_banco_com_dv"]?></TD>
    <TD width=3><IMG height=22 
      src="imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=right width=464><?=$dadosboleto["linha_digitavel"]?> &nbsp;&nbsp;&nbsp; </TD></TR>
  <TR>
    <TD colSpan=5><IMG height=2 
      src="imagens/imgpxlazu.gif" width=666 
      border=0></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=298 height=13>Cedente</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=126 height=13>Agência / Código do Cedente</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=34 height=13>Espécie</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=53 height=13>Quantidade</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=120 height=13>Nosso número</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=298 height=12><? echo $dadosboleto["cedente"]; ?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=126 height=12><?=$dadosboleto["agencia_codigo"]?> 
    &nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto["especie"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["quantidade"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=120 
    height=12><?=$dadosboleto["nosso_numero"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=298 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=298 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=126 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=126 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=34 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=34 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=53 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=53 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=120 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=120 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>Número do documento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>Contrato</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=132 height=13>CPF/CEI/CNPJ</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=134 height=13>Vencimento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Valor documento</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=113 height=12><?=$dadosboleto["numero_documento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=72 height=12><?=$dadosboleto["contrato"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=132 height=12><?=$dadosboleto["cpf_cnpj"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=134 
    height=12><?=$dadosboleto["data_vencimento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
  height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=132 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=132 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=134 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=134 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>(-) Desconto / 
    Abatimento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=112 height=13>(-) Outras deduções</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>(+) Mora / Multa</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>(+) Outros acréscimos</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) Valor 
      cobrado</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=112 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
    height=12>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=112 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=112 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=659 height=13>Sacado</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=659 height=12><?=$dadosboleto["sacado"]?> 
    &nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=659 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=659 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13></TD>
    <TD class=titulo vAlign=top width=7 height=13></TD>
    <TD class=titulo vAlign=top width=88 height=13>Autenticação mecânica</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3></TD>
    <TD vAlign=top width=564 height=3></TD>
    <TD vAlign=top width=7 height=3></TD>
    <TD vAlign=top width=88 height=3></TD></TR></TBODY></TABLE><BR><BR><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD></TR></TBODY></TABLE><BR><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=campo width=150><IMG 
      src="imagens/logobb.jpg" 
      border=0></TD>
    <TD width=3><IMG height=22 
      src="imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=middle width=46><?=$dadosboleto["codigo_banco_com_dv"]?></TD>
    <TD width=3><IMG height=22 
      src="imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=right width=464><?=$dadosboleto["linha_digitavel"]?> &nbsp;&nbsp;&nbsp; </TD></TR>
  <TR>
    <TD colSpan=5><IMG height=2 
      src="imagens/imgpxlazu.gif" width=666 
      border=0></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=472 height=13>Local de pagamento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 bgColor=#ffffcc 
    height=13>Vencimento</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=472 height=12>QUALQUER BANCO ATÉ O 
      VENCIMENTO&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
      height=12><?=$dadosboleto["data_vencimento"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=472 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=472 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=472 height=13>Cedente</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Agência/Código 
  cedente</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=472 height=12><?=$dadosboleto["cedente"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
      height=12><?=$dadosboleto["agencia_codigo"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=472 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=472 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=93 height=13>Data do documento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=173 height=13>N<U>o</U> documento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>Espécie doc.</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=34 height=13>Aceite</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>Data process.</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Nosso número</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=93 
    height=12><?=$dadosboleto["data_documento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=173 height=12><?=$dadosboleto["numero_documento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=72 height=12><?=$dadosboleto["especie_doc"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto["aceite"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=72 
    height=12><?=$dadosboleto["data_processamento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
    height=12><?=$dadosboleto["nosso_numero"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=93 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=93 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=173 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=173 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=34 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=34 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=93 bgColor=#ffffcc height=13>Uso do 
    banco</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=93 height=13>Carteira</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=53 height=13>Espécie</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=133 height=13>Quantidade</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>x Valor</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>(=) Valor documento</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=93 bgColor=#ffffcc height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=93 height=12><?=$dadosboleto["carteira"]?> <?=isset($dadosboleto["variacao_carteira"]) ? $dadosboleto["variacao_carteira"] : '' ?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["especie"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["quantidade"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=72 height=12><?=$dadosboleto["valor_unitario"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
  height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=93 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=93 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=93 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=93 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=53 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=53 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=133 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=133 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD width=7 rowSpan=5></TD>
    <TD vAlign=top width=447 rowSpan=5><FONT 
      class=titulo>Instruções (Texto de responsabilidade do cedente)</FONT><FONT class=campo><br><br>
		<? echo $dadosboleto["demonstrativo1"]; ?><br> 
		<? echo $dadosboleto["demonstrativo2"]; ?><br> 
		<? echo $dadosboleto["demonstrativo3"]; ?><br> 
		<? echo $dadosboleto["instrucoes1"]; ?><br>
		<? echo $dadosboleto["instrucoes2"]; ?><br>
		<? echo $dadosboleto["instrucoes3"]; ?><br> 
		<? echo $dadosboleto["instrucoes4"]; ?><br>
	  </FONT></TD>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13></TD>
          <TD class=titulo vAlign=top width=18 height=13></TD>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(-) Desconto / 
            Abatimento</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12></TD>
          <TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3></TD>
          <TD vAlign=top width=18 height=3></TD>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13></TD>
          <TD class=titulo vAlign=top width=18 height=13></TD>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(-) Outras 
          deduções</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12></TD>
          <TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3></TD>
          <TD vAlign=top width=18 height=3></TD>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13></TD>
          <TD class=titulo vAlign=top width=18 height=13></TD>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(+) Mora / 
        Multa</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12></TD>
          <TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3></TD>
          <TD vAlign=top width=18 height=3></TD>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(+) Outros 
          acréscimos</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) 
            Valor cobrado</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
          height=12>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width=666 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=666 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=659 height=13>Sacado</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=36><IMG height=36 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=659 height=36><?=$dadosboleto["sacado"]?><BR><?=$dadosboleto["endereco1"]?><BR><?=$dadosboleto["endereco2"]?>&nbsp;&nbsp;
	</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=659 
  height=13>Sacador/Avalista</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=472 height=13>&nbsp;</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Cód. baixa</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=472 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=472 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13></TD>
    <TD class=titulo vAlign=top width=470 height=13></TD>
    <TD class=titulo vAlign=top width=7 height=13></TD>
    <TD class=titulo vAlign=top width=182 height=13>Autenticação mecânica - 
      Ficha de Compensação</TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD><? fbarcode($dadosboleto["codigo_barras"]); ?></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD></TR></TBODY></TABLE><BR><BR></DIV></BODY></HTML>
