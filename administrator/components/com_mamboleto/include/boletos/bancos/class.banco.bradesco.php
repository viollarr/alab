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
// |          Pablo Martins F. Costa <pablo@users.sourceforge.net>        |
// +----------------------------------------------------------------------+
//
// @(#) $Id: class.banco.bradesco.php,v 1.5 2001/10/23 16:51:56 jcpm Exp $
//

require_once(BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "bancos" . BOLETO_SEPARADOR . "class.banco.comum.php");

class Boleto_Banco_Bradesco extends Boleto_Banco_Comum
{
    function geraDadosBanco($info)
    {

// ==========================  INICIO DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

	// =========  Formata o valor do documento para o codigo de barras  =========
      $v = str_replace("R\$", "", $info["valor_documento"]);
      $v = str_replace(chr(44), "", $v);
      $valor = sprintf("%010d", $v);

      // =========  Pega vencimento e gera fator de vencimento  =========
      $vence = explode("/", $info["vencimento"]);
      $dvence = $vence[0];
      $mvence = $vence[1];
      $avence = $vence[2];
      $vcto = "$dvence/$mvence/$avence";
      $fatorvcto = $this->_fatorVencimento($avence, $mvence, $dvence);

      // =========  Pega e monta o código do banco  =========
//	$codbank = "237";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
	$moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

	// =========  Pega agência e conta cedente  =========
	$agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);
	$contacedente = substr(sprintf("%07d", $info["conta_cedente"]), 0, 7);

      // =========  Monta agência/codigo cedente  =========
//	$p1 = $this->_modulo11($agencia, 9);
	$p1 = substr($info["agencia_dig"], 0, 1);

//	$p2 = $this->_modulo11($contacedente, 9);
	$p2 = substr($info["conta_cedente_dig"], 0, 1);

	$agencia_codigo = "$agencia-$p1 / $contacedente-$p2";

      // ========= Pega carteira =========
	$cart = substr(sprintf("%02d", $info["carteira"]),0, 2);

      // =========  Outros dados necessários  =========
	$zero = "0";

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Pega nosso número  =========
	$nosso_numero = sprintf("%011d", $info["nosso_numero"]);

      // =========  Monta nosso número para exibição no boleto  =========
//	$dvnn = $this->_modulo11($nosso_numero, 9);
	$dvnn = $this->_digitoVerificador_nn("$cart$nosso_numero");

	$nosso_numero_blqto = "$cart/$nosso_numero-$dvnn";

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
	$dvcampo = "$codbank$moeda$fatorvcto$valor$agencia$cart$nosso_numero$contacedente$zero";
	$dv =  $this->_modulo11($dvcampo);

      // =========  Numero para o codigo de barras com 44 digitos  =========
	$num = "$codbank$moeda$dv$fatorvcto$valor$agencia$cart$nosso_numero$contacedente$zero";

      // =========  Devolve a linha digitavel  =========
      $linha_digitavel = $this->_montaLinha($num);

// ===============  FINAL MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

// ===============  DEVOLVE OS DADOS JÁ TRABALHADOS  ===============

        return array(
            "linha_digitavel" => $linha_digitavel,
            "agencia_codigo"  => $agencia_codigo,
            "codigo_barras"   => $num,
            "codigo_banco"    => $codigo_banco,
            "nosso_numero"    => $nosso_numero_blqto
        );
    }


/*
 *****************************************
 *
 *  Função específica para o Bradesco
 *
 *****************************************
*/

    function _digitoVerificador($numero)
    {
        $resto = $this->_modulo11($numero, 9, 1);
        $digito = 11 - $resto;
        if ($resto == 1) {
            $digito = "P";
        } elseif ($resto == 0) {
            $digito = 0;
        }
        return $digito;
    }

    function _digitoVerificador_nn($numero)
    {
        $resto = $this->_modulo11($numero, 7, 1);
        $digito = 11 - $resto;
     if ($digito == 10) {
        $dv = "P";
     } elseif($digito == 11) {
     	$dv = 0;
	} else {
        $dv = $digito;
     	}
	 return $dv;
    }

}
?>