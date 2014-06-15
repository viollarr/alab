<?php
/*
* *- *- *- *- *- *- MAMBOLETO Joomla! -* -* -* -* -* -*
* @version 2.0 RC3
* @author Fernando Soares
* @copyright Fernando Soares - http://www.fernandosoares.com.br/
* @date Agosto, 2008
* @package Joomla! 1.5

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
// @(#) $Id: class.banco.sicredi.php,v 1.0 24/08/2008 $
//

require_once(BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "bancos" . BOLETO_SEPARADOR . "class.banco.comum.php");

class Boleto_Banco_Santander extends Boleto_Banco_Comum
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
//	$codbank = "748";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
//      $codigo_banco = $this->_geraCodigoBanco($codbank);
      $codigo_banco = "748-X";

      // =========  Definição de moeda  =========
      $moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

      // =========  Pega agência e conta cedente  =========
      $agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);
      $contacedente = substr(sprintf("%02d", $info["conta_cedente"]),0, 2);

      // =========  Pega número do convênio e carteira =========
      $nconvenio = substr($this->formata_numero($info["convenio"], 5, 0), 0, 5);
      $carteira = $this->formata_numero($info["carteira"], 1, 0);

      // =========  Monta agência/codigo cedente  =========
	$agencia_codigo = "$agencia.$contacedente.$nconvenio"; 

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Outros dados necessários  =========
      $filler = "0";
      $tipocob = "3";   // Constante 3 - SICREDI
      $byteger = "2";   // Constante 2 - Nosso número gerado pelo Cedente (2-9)
      $anoatual = date("y");
      $comvalor = "1";  // Constante 1 - quando há valor no boleto o valor é sempre 1

      // =========  Pega nosso número  =========
      $nnum = substr(sprintf("%05d", $info["nosso_numero"]),0, 5);

      // =========  Cálculo do dígito verificador do nosso número =========
      $nnstring = "$agencia$contacedente$nconvenio$anoatual$byteger$nnum";
      $dvnn = $this->_modulo11($nnstring,9,1);
      $dvnn = 11 - $dvnn;
	if (in_array((int)$dvnn,array(10,11))) {
         $dvnn = "0";
      }

      $nosso_numero = "$anoatual$byteger$nnum$dvnn";

      // =========  Monta nosso número para exibição no boleto  =========
      $nosso_numero_blqto = "$anoatual/$byteger$nnum-$dvnn";

      // =========  Calcula dígito verificador do campo livre  =========
      $cl = "$tipocob$carteira$nosso_numero$agencia$contacedente$nconvenio$comvalor$filler";
      $dvcl = $this->_modulo11($cl,9,1);
      $dvcl = 11 - $dvcl;
	if (in_array((int)$dvcl,array(10,11))) {
         $dvcl = "0";
      }

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      $dvcampo = "$codbank$moeda$fatorvcto$valor$tipocob$carteira$nosso_numero$agencia$contacedente$nconvenio$comvalor$filler$dvcl";
      $dv = $this->_modulo11($dvcampo);

      // =========  Numero para o codigo de barras com 44 digitos  =========
      $num = "$codbank$moeda$dv$fatorvcto$valor$tipocob$carteira$nosso_numero$agencia$contacedente$nconvenio$comvalor$filler$dvcl";

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
 ************************************************
 *
 * Funções específicas para o Sicredi
 *
 ************************************************
*/

    function geraCodigoBanco($numero)
    {

// Agosto/2008 - Fernando Soares - http://www.fernandosoares.com.br

//       *   Entrada:
//       *     $numero: número do banco para o qual se quer gerar o digito verificador.
//       *
//       *   Saída:
//       *     Retorna o dígito verificador do número do banco.


        $parte1 = substr($numero, 0, 3);
        $parte2 = 11 - $this->_modulo11($parte1,"9","1");
if (in_array((int)$parte2,array(10,11))) {
            	$parte2 = "0";
		}
    
        return $parte1 . "-" . $parte2;
    }


}
?>