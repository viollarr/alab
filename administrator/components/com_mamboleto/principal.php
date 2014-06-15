<?php
/*
* *- *- *- *- *- *- MAMBOLETO Joomla! -* -* -* -* -* -*
* @version 2.0 RC3
* @author Fernando Soares
* @copyright Fernando Soares - http://www.fernandosoares.com.br/
* @date Junho, 2008
* @package Joomla! 1.0.15 e Virtuemart 1.0.15

Baseado no trabalho de 	Matheus Mendes e Pedro Müller ( contato@mambopros.net )
				Messuka ( messuka@messuka.com.br )
				Metasig http://www.metasig.com.br
*/

/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | phpBoleto v2.0                                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 1999-2001 Pablo Martins F. Costa, João Prado Maia      |
// +----------------------------------------------------------------------+
// | Este arquivo está sujeito a versão 2 da GNU General Public License,  |
// | que foi adicionada nesse pacote no arquivo COPYING e está disponível |
// | pela Web em http://www.gnu.org/copyleft/gpl.txt                      |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// | Autores: João Prado Maia <jpm@phpbrasil.com>                         |
// +----------------------------------------------------------------------+
//
// @(#) $Id: principal.php,v 1.9 2001/12/19 15:53:42 jcpm Exp $
//
error_reporting(E_ALL);
ini_set("include_path", ".");
include_once("include/pre.php");
include_once(BOLETO_INC_PATH . "comum.php");
include_once(BOLETO_INC_PATH . "class.ini.php");
$ini = new File_Ini(BOLETO_CONF_PATH . "phpboleto.ini.php", "#");
$inidata = (object) $ini->getBlockValues("Admin Geral");


//checaAutenticacao();
//defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//global $mosConfig_live_site;

mostraCabecalho($inidata->TITULO_ADMIN_NORMAL);
?>
<table width="557" border="0">
  <tr>
    <td colspan="5"><div align="center"><img src="<? echo BOLETO_IMAGE_URL ?>mamboleto.gif"></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center"><h3>Seja muito bem vindo ao MamboletoJoomla!</h3></div></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="index2.php?option=com_mamboleto&task=config"><img border="0" src="<?php echo $mosConfig_live_site . "/administrator/components/com_mamboleto/imagens/config.png"; ?>"></a><br>
    Configurações<br>Gerais</td>
    <td align="center"><a href="index2.php?option=com_mamboleto&task=configuracoes"><img border="0" src="<?php echo $mosConfig_live_site . "/administrator/components/com_mamboleto/imagens/cpanel.png"; ?>"></a><br>
    Configurações<br>Personalizadas</td>
    <td align="center"><a href="index2.php?option=com_mamboleto&task=boletos"><img border="0" src="<?php  echo $mosConfig_live_site . "/administrator/components/com_mamboleto/imagens/addedit.png";?>"></a><br>
    Administrar<br>Boletos</td>
    <td align="center"><a href="index2.php?option=com_mamboleto&task=bancos"><img border="0" src="<?php  echo $mosConfig_live_site . "/administrator/components/com_mamboleto/imagens/addedit.png";?>"></a><br>
    Administrar<br>Bancos</td>
    <td align="center"><a href="index2.php?option=com_mamboleto&task=ajuda"><img border="0" src="<?php  echo $mosConfig_live_site . "/administrator/components/com_mamboleto/imagens/support.png"; ?>"></a><br>
    Ajuda<br>&nbsp;</td>
  </tr>

<tr>
<td colspan="5"><div align="center">
<center>
<br><br><strong>Ajude a manter o desenvolvimento deste projeto</strong><br><br>
<form target="pagseguro" action="https://pagseguro.uol.com.br/security/webpagamentos/webdoacao.aspx" method="post">
<input type="hidden" name="email_cobranca" value="fsoares@fsoares.com.br">
<input type="hidden" name="moeda" value="BRL">
<input type="image" src="https://pagseguro.uol.com.br/Security/Imagens/FacaSuaDoacao.gif" name="submit" alt="Doe com PagSeguro - é rápido e seguro!">
</center>
</form>
</div></td>
</tr>
</table>
<?php
mostraRodape();
?>
