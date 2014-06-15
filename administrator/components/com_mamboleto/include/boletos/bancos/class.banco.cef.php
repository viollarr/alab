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
// @(#) $Id: class.banco.cef.php, v.2.0 RC1 $
//

require_once(BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "bancos" . BOLETO_SEPARADOR . "class.banco.comum.php");

class Boleto_Banco_Cef extends Boleto_Banco_Comum
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
//	$codbank = "104";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
      $moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

      // =========  Pega agência e conta cedente  =========
      $agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);

      // =========  Pega número do convênio (código do cedente)  =========
      $nconvenio = substr(sprintf("%08d", $info["convenio"]), -8);

      // =========  Pega número da carteira  =========
//      $cart = $this->_pegaCarteira("7");
      $cart = $info["carteira"];

      // =========  Constante referente ao código da carteira  =========
	$YYY = "870";

      // =========  Monta agência/Código cedente  =========
      $agcod = "$agencia$YYY$nconvenio";
      $dvcc = $this->_calculaDV($agcod);
      $agencia_codigo = "$agencia$YYY$nconvenio-$dvcc";

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Pega nosso número e efetua formação de acordo com a carteira  =========
      if (strtoupper($cart) == "CR"){
            $nnum =  sprintf("%09d", $info["nosso_numero"]);
            $nosso_numero = "9$nnum";
      } elseif(strtoupper($cart) == "SR"){
            $nnum =  sprintf("%08d", $info["nosso_numero"]);
            $nosso_numero = "82$nnum";
      }
	
      // =========  Monta nosso número para exibição no boleto  =========
      $dvnn = $this->_calculaDV($nosso_numero);
      $nosso_numero_blqto = "$nosso_numero-$dvnn";

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      $dvcampo = "$codbank$moeda$fatorvcto$valor$nosso_numero$agencia$YYY$nconvenio";
      $dv = $this->_modulo11($dvcampo);

      // =========  Numero para o codigo de barras com 44 digitos  =========
      $num = "$codbank$moeda$dv$fatorvcto$valor$nosso_numero$agencia$YYY$nconvenio";

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
 ******************************************
 *
 *  Função específica para a Caixa
 *
 ******************************************
*/

// cálculo do DV
	function _calculaDV($numero)
	{
		$resto = $this->_modulo11($numero,9,1);
		$dv = 11 - $resto;
			if ($dv > 9){
				$dv = 0;
			}
		return $dv;
	}

}
?>