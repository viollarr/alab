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
// @(#) $Id: pre.php,v 1.15 2002/03/16 03:19:07 jcpm Exp $
//

global $mosConfig_absolute_path, $mosConfig_live_site;

// ******************************************************************************
// ATENÇÃO - Início do código para a versão antiga de instalação do Mamboleto
//         - Mantido para permitir a possibilidade de instalação em separado
// ******************************************************************************

// define("BOLETO_SEPARADOR","\\"); // automatico

// **************************************************************************
// ATENÇÃO - Modifique na próxima linha o caminho da instalação do Mamboleto 
// **************************************************************************
// Versão para UNIXes (remova os '//' da próxima linha)
// dfine("BOLETO_PATH", "/htdocs/administrator/components/com_mamboleto"); // automatico
                       
// Versão para Windows (remova os '//' da próxima linha)
// define("BOLETO_PATH", "c:\\xampp\\htdocs\\administrator\\components\\com_mamboleto"); // automatico

// **************************************************************************
// ATENÇÃO - Modifique a próxima linha para setar a URL relativa do Mamboleto
//           no seu site (ex: coloque "/admin/mamboleto/" se a URL para o 
//           mesmo é "http://www.site.com.br/admin/mamboleto/")
// **************************************************************************
// define("BOLETO_URL", "/administrator/components/com_mamboleto/");

// ******************************************************************************
// ATENÇÃO - Início do código para a versão antiga de instalação do Mamboleto
//         - Mantido para permitir a possibilidade de instalação em separado
// ******************************************************************************


// **********************************************************************************************
// Não é necessário mexer com o script abaixo a menos que vá utilizar uma instalação em separado!
// **********************************************************************************************


// ******************************************************************************
// ATENÇÃO - Início do código para a versão automatizada de instalação no Joomla!
// ******************************************************************************

if (stristr(PHP_OS, "win")) {
    $separador = "\\\\"; // separador: \\
    $outro = "/";
} else {
    $separador = "/"; // separador: /
    $outro = "\\\\";
}
$caminho = str_replace($outro, $separador,$mosConfig_absolute_path) . $separador . "administrator" . $separador . "components" .$separador. "com_mamboleto";
$caminho1 = str_replace($outro, $separador,$mosConfig_live_site) . $separador . "administrator" . $separador . "components" . $separador . "com_mamboleto" . $separador;

define("BOLETO_SEPARADOR", $separador); // automatico

define("BOLETO_PATH", $caminho); // automatico

define("BOLETO_URL", $caminho1);

// ******************************************************************************
// ATENÇÃO - Final do código para a versão automatizada de instalação no Joomla!
// ******************************************************************************


if (!defined("BOLETO_PATH")) {
    exit("Erro: Edite o caminho do phpBoleto no arquivo 'pre.php' encontrado no diretório 'include' da instalação do phpBoleto.");
}
if (!defined("BOLETO_URL")) {
    exit("Erro: Edite a URL do phpBoleto no arquivo 'pre.php' encontrado no diretório 'include' da instalação do phpBoleto.");
}


// ************************************************
// Não é necessário mexer com o resto desse script!
// ************************************************

define("BOLETO_INC_PATH", BOLETO_PATH . BOLETO_SEPARADOR . "include" . BOLETO_SEPARADOR);
define("BOLETO_CONF_PATH", BOLETO_PATH . BOLETO_SEPARADOR . "config" . BOLETO_SEPARADOR);
define("BOLETO_FONT_PATH", BOLETO_PATH . BOLETO_SEPARADOR . "fonts" . BOLETO_SEPARADOR);
define("BOLETO_IMAGE_PATH", BOLETO_PATH . BOLETO_SEPARADOR . "imagens" . BOLETO_SEPARADOR);
define("BOLETO_TEMP_PATH", BOLETO_PATH . BOLETO_SEPARADOR . "temp" . BOLETO_SEPARADOR);

define("BOLETO_IMAGE_URL", BOLETO_URL . "imagens/");

// caminho completo do arquivo de log de erros
define("BOLETO_ERRORLOG_PATH", BOLETO_CONF_PATH . "log_de_erros.txt");
define("BOLETO_NOTIFICAR_ERRO", false);
// adicione aqui quantos emails quiser, separados por espaços
define("BOLETO_NOTIFICAR_LISTA", "fsoares@fsoares.com.br");

// define o caminho para as bibliotecas PEAR distribuídas junto com o phpBoleto
$pear_dir = BOLETO_INC_PATH . "pear";
if (stristr(PHP_OS, 'WIN')) {
    $separador = ";";
} else {
    $separador = ":";
}
//echo "<h1>$pear_dir</h1>";
if (defined("PHP_INCLUDE_PATH")) {
    ini_set("include_path", "." . $separador . $pear_dir . $separador . PHP_INCLUDE_PATH);
} else {
    ini_set("include_path", "." . $separador . $pear_dir);
}

unset($separador);
?>