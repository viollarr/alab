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
// | Modificado para o Banco Itaú:                                        |
// |          Claudio Pereira <cpereira@brasilenergia.com.br>             |
// +----------------------------------------------------------------------+
//
// @(#) $Id: class.banco.itau.php,v 1.1 2002/08/03 00:10:13 jcpm Exp $
//

require_once(BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "bancos" . BOLETO_SEPARADOR . "class.banco.comum.php");

class Boleto_Banco_Itau extends Boleto_Banco_Comum
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
//	$codbank = "341";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
      $moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

      // =========  Pega agência e conta cedente  =========
      $agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);
      $contacedente = substr(sprintf("%05d", $info["conta_cedente"]),0, 5);

      // =========  Pega código do cedente  =========
      $nconvenio = substr(sprintf("%05d", $info["convenio"]),0, 5);

      // =========  Calcula DAC de agencia-caontacedente  =========
      $DAC_ACC=$this->_modulo10("$agencia$contacedente");

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Prepara outros dados  =========
      $cZero ="0"; // nao mexa
      $zero = "000"; // nao mexa

      // =========  Pega carteira  =========
//      $cart = $this->_pegaCarteira("7");
      $cart = $this->formata_numero($info["carteira"], 3, 0);

      // =========  Pega nosso número  =========
      $nosso_numero = sprintf("%08d", $info["nosso_numero"]);


	// =========  faz o cálculo do DAC do nosso número conf. regras das carteiras  =========
      if (in_array((int)$cart,array(126,131,146,150,168))) {
        $DAC_NN=$this->_modulo10("$cart$nosso_numero");
      } else {
        $DAC_NN=$this->_modulo10("$agencia$contacedente$cart$nosso_numero");
      }

      // =========  Monta nosso número para exibição no boleto  =========
      $nosso_numero_blqto = "$cart / $nosso_numero-$DAC_NN";

      // =========  Monta agência/Código cedente  =========
      $agencia_codigo = "$agencia / $contacedente-$DAC_ACC";

      // =========  Calcula DAC carteira/nosso número/seu número/código do cliente para código de barras  =========
      $DAC_NN_CB = $this->_modulo10("$cart$nosso_numero$nconvenio");


// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      if (in_array((int)$cart,array(106,107,122,142,143,195,196,198))) {
      $dvcampo = "$codbank$moeda$fatorvcto$valor$cart$nosso_numero$nconvenio$DAC_NN_CB$cZero";
      $dv =  $this->_modulo11($dvcampo);
      }else{
      $dvcampo = "$codbank$moeda$fatorvcto$valor$cart$nosso_numero$DAC_NN$agencia$contacedente$DAC_ACC$zero";
      $dv =  $this->_modulo11($dvcampo);
      }

      // =========  Numero para o codigo de barras com 44 digitos  =========
      if (in_array((int)$cart,array(106,107,122,142,143,195,196,198))) {
      $num = "$codbank$moeda$dv$fatorvcto$valor$cart$nosso_numero$nconvenio$DAC_NN_CB$cZero";
      }else{
      $num = "$codbank$moeda$dv$fatorvcto$valor$cart$nosso_numero$DAC_NN$agencia$contacedente$DAC_ACC$zero";
      }

      // =========  Devolve a linha digitavel  =========
      $linha_digitavel = $this->_montaLinha($num);

// ===============  FINAL MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

        return array(
            "linha_digitavel" => $linha_digitavel,
            "agencia_codigo"  => $agencia_codigo,
            "codigo_barras"   => $num,
            "codigo_banco"    => $codigo_banco,
            "nosso_numero"    => $nosso_numero_blqto
        );
    }


}
?>