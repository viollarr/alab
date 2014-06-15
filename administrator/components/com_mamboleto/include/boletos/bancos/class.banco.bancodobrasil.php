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
// |          Miguel Angelo Crosariol <miguel@assintel.com.br>            |
// +----------------------------------------------------------------------+
//
// @(#) $Id: class.banco.bancodobrasil.php,v 1.3 2001/12/06 22:29:47 jcpm Exp $
//

require_once(BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "bancos" . BOLETO_SEPARADOR . "class.banco.comum.php");

class Boleto_Banco_BancodoBrasil extends Boleto_Banco_Comum
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
//	$codbank = "001";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
      $moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

      // =========  Outros valores necessários  =========
      $zeroslivres = "000000";

      // =========  Pega número do convênio (código do cedente)  =========
      $nconvenio = $info["convenio"];

      // =========  Pega número da carteira  =========
//      $cart = $this->_pegaCarteira("6");
      $cart = $info["carteira"];

      // =========  Pega agencia e conta cedente  =========
      $agencia = substr(sprintf("%04d", $info["agencia"]), 0, 4);

      // =========  pega e normatiza o número da conta do cedente para 8 dígitos sem o DV  =========
      $contacedente = substr(sprintf("%08d", $info["conta_cedente"]),0, 8);

      // =========  Monta agência/Código cedente  =========
      $p0 = $this->_digitoVerificador($agencia);
      $p1 = $this->_digitoVerificador($contacedente);
      $agencia_codigo = "$agencia-$p0 / $contacedente-$p1";


// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================
// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      if (strlen ($nconvenio) <= "6"){

// =========  Convênio é de 4 dígitos  =========
            if (strlen ($nconvenio) <= "4"){

            // =========  Convênio de 4 dígitos com nosso número de 11 posições  =========
            // =========  Composição do nosso número: número convenio(4) + nosso número (7) (item 14 manual banco)

                  // =========  Garante que o número do convênio tenha 4 dígitos  =========
			$nconvenio = substr(sprintf("%04d", $nconvenio),0,4);

                  // =========  Pega nosso número (seu número) e garante que tenha 7 dígitos  =========
			$nnum = substr(sprintf("%07d", $info["nosso_numero"]),0, 7);

                  // =========  Monta nosso número conforme item 14 manual banco  =========
                  $nosso_numero = "$nconvenio$nnum";

                  // =========  43 numeros para o calculo do digito verificador do código de barras  =========
			$dvcampo = "$codbank$moeda$fatorvcto$valor$nosso_numero$agencia$contacedente$cart";
			$dv = $this->_modulo11($dvcampo);

                  // =========  Numero para o codigo de barras com 44 digitos  =========
			$num="$codbank$moeda$dv$fatorvcto$valor$nosso_numero$agencia$contacedente$cart";

                  // =========  Monta nosso número para exibição no boleto  =========
			$nosso_numero_blqto = "$nosso_numero-" . $this->_modulo11($nosso_numero);

// =========  Convênio é de 6 dígitos  =========
		} else {

                  // =========  Garante que o número do convênio tenha 6 dígitos  =========
                  $nconvenio = substr(sprintf("%06d", $nconvenio),0,6);

            // =========  Convênio de 6 dígitos com nosso número de 11 posições  =========
            // =========  Composição do nosso número: número convenio(6) + nosso número (5) (item 14 manual banco)
                  if ($info["codigo"] == "1"){

                        // =========  Formata carteira para 2 dígitos  =========
                        $cart = substr(sprintf("%02d", $cart),0,2);

                        // =========  Pega nosso número (seu número) e garante que tenha 7 dígitos  =========
                        $nnum = substr(sprintf("%05d", $info["nosso_numero"]),0, 5);

                        // =========  Monta nosso número conforme item 14 manual banco  =========
                        $nosso_numero = "$nconvenio$nnum";

                        // =========  43 numeros para o calculo do digito verificador do código de barras  =========
                        $dvcampo = "$codbank$moeda$fatorvcto$valor$nosso_numero$agencia$contacedente$cart";
                        $dv = $this->_modulo11($dvcampo);

                        // =========  Numero para o codigo de barras com 44 digitos  =========
                        $num="$codbank$moeda$dv$fatorvcto$valor$nosso_numero$agencia$contacedente$cart";

                        // =========  Monta nosso número para exibição no boleto  =========
                        $nosso_numero_blqto = "$nosso_numero-" . $this->_modulo11($nosso_numero);

            // =========  Convênio de 6 dígitos, Carteira de 16 ou 18 com nosso número de 17 posições  =========
                  } elseif ($info["codigo"] == "2"){

                        // =========  Número do serviço  =========
                        $nservico = "21";

                        // =========  Pega nosso número (seu número) e garante que tenha 17 dígitos  =========
                        $nnum = substr($this->formata_numero($info["nosso_numero"], 17, 0),0, 17);

                        // =========  43 numeros para o calculo do digito verificador do código de barras  =========
                        $dvcampo = "$codbank$moeda$fatorvcto$valor$nconvenio$nnum$nservico";
                        $dv = $this->_modulo11($dvcampo);

                        // =========  Numero para o codigo de barras com 44 digitos  =========
                        $num="$codbank$moeda$dv$fatorvcto$valor$nconvenio$nnum$nservico";

                        // =========  Monta nosso número para exibição no boleto  =========
                        $nosso_numero_blqto = $nnum;

                  }

            }

// =========  Convênio é de 7 dígitos  =========
      } elseif (strlen ($nconvenio) == "7"){

      // =========  Convênio de 7 dígitos com nosso número de 17 posições  =========
      // =========  Composição do nosso número: número convenio(7) + nosso número (10) (item 14 manual banco)

            // =========  Pega nosso número (seu número) e garante que tenha 10 dígitos  =========
            $nnum = substr($this->formata_numero($info["nosso_numero"], 10, 0), 0, 10);

            // =========  Monta nosso número conforme item 14 manual banco  =========
            $nosso_numero = "$nconvenio$nnum";

            // =========  43 numeros para o calculo do digito verificador do código de barras  =========
            $dvcampo = "$codbank$moeda$fatorvcto$valor$zeroslivres$nosso_numero$cart";
            $dv = $this->_modulo11($dvcampo);

            // =========  Numero para o codigo de barras com 44 digitos  =========
            $num="$codbank$moeda$dv$fatorvcto$valor$zeroslivres$nosso_numero$cart";

            // =========  Monta nosso número para exibição no boleto  =========
            $nosso_numero_blqto = $nosso_numero;

// =========  Convênio é de 8 dígitos  =========
      } elseif (strlen ($nconvenio) == "8"){

      // =========  Convênio de 8 dígitos com nosso número de 17 posições  =========
      // =========  Composição do nosso número: número convenio(8) + nosso número (9) (item 14 manual banco)

            // =========  Pega nosso número (seu número) e garante que tenha 9 dígitos  =========
            $nnum = substr(sprintf("%09d", $info["nosso_numero"]),0, 9);

            // =========  Monta nosso número conforme item 14 manual banco  =========
            $nosso_numero = "$nconvenio$nnum";

            // =========  43 numeros para o calculo do digito verificador do código de barras  =========
            $dvcampo = "$codbank$moeda$fatorvcto$valor$zeroslivres$nosso_numero$cart";
            $dv = $this->_modulo11($dvcampo);

            // =========  Numero para o codigo de barras com 44 digitos  =========
            $num="$codbank$moeda$dv$fatorvcto$valor$zeroslivres$nosso_numero$cart";

            // =========  Monta nosso número para exibição no boleto  =========
            $nosso_numero_blqto = "$nosso_numero-" . $this->_modulo11($nosso_numero);

      }

      // =========  Devolve a linha digitavel  =========
      $linha_digitavel = $this->_montaLinha($num);

// ===============  FINAL MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============
// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

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
 **************************************************** 
 *
 * Função específica para gerar dígito verificador
 * do Banco do Brasil
 *
 * Fernando Soares - http://www.fernandosoares.com.br
 *
 ****************************************************
*/
    function _digitoVerificador($numero)
    {
        $resto = $this->_modulo11($numero, 9, 1);
        $digito = 11 - $resto;
        if ($resto == 1) {
           $digito = "X";		//corrigido o DV para X quando o resto for 1...conforme documentação do BB
        } elseif ($resto == 0) {
           $digito = 0;
        }
        return $digito;
    }

}
?>
