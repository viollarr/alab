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
// @(#) $Id: class.banco.santander.php,v 1.2 2001/10/23 16:51:56 jcpm Exp $
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
//	$codbank = "033";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
      $moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

      // =========  Pega agência e conta cedente  =========
      $agencia = substr(sprintf("%03d", $info["agencia"]),0, 3);
      $contacedente = substr(sprintf("%06d", $info["conta_cedente"]),0, 6);

      // =========  Pega número do convênio  =========
      $nconvenio = substr($this->formata_numero($info["convenio"], 11, 0), 0, 11);

      // =========  Monta agência/codigo cedente  =========
	$p1 = substr($nconvenio, 0, 3);
	$p2 = substr($nconvenio, 3, 2);
	$p3 = substr($nconvenio, 5, 5);
	$p4 = substr($nconvenio, 10, 1);
	$agencia_codigo = "$p1 $p2 $p3 $p4"; 

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Outros dados necessários  =========
      $filler = "00";

      // =========  Pega nosso número  =========
      $nnum = substr(sprintf("%07d", $info["nosso_numero"]),0, 7);

      // =========  Cálculo do duplo dígito verificador  =========
      $nnstring = "$nconvenio$nnum$filler$codbank";
      $dd = $this->DuploDV($nnstring);

      // =========  Monta nosso número para exibição no boleto  =========
      $nosso_numero_blqto = $this->calcula_verificador_nosso_numero($agencia, $nnum);

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      $dvcampo = "$codbank$moeda$fatorvcto$valor$nconvenio$nnum$filler$codbank$dd";
      $dv = $this->_modulo11($dvcampo);

      // =========  Numero para o codigo de barras com 44 digitos  =========
      $num = "$codbank$moeda$dv$fatorvcto$valor$nconvenio$nnum$filler$codbank$dd";

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
 * Funções específicas para o Santander
 *
 ************************************************
*/

	function DuploDV($dvcampo)
	{
        // calculando o primeiro DV do nosso número
		//$dvcampo = $nnum;
		$dvnnum1 = $this->_modulo10($dvcampo, 1);

        // calculando o segundo DV do nosso número
		$dvcampo2 = "$dvcampo$dvnnum1";
		for ($resto = $this->_modulo11($dvcampo2,7,2);$resto == 1;){
			if ($dvnnum1 == 9){
				$dvnnum1 = 0;
			} else {
				$dvnnum1 = $dvnnum1 + 1;
			}
			$dvcampo1 = "$dvcampo$dvnnum1";
			$resto = $this->_modulo11($dvcampo1,7,2);
		}
		if ($resto == 0){
			$dvnnum2 = $resto;
		} else {
			$dvnnum2 = 11 - $resto;
		}
		$dd = "$dvnnum1$dvnnum2";
	//	$dvcampo = "$dvcampo$dd";
	return $dd;
	}


function calcula_verificador_nosso_numero($agencia, $nossonumero){
	// Junta as duas variáveis para cálculo
	$num = $agencia.$nossonumero;
	// Cria array com os fatores
	$fatores = array (0=>7, 1=>3, 2=>1, 3=>9, 4=>7, 5=>3, 6=>1, 7=>9, 8=>7, 9=>3);
	
	$soma=0;
	
	// Calcula dígito verificador
	for($a=0; $a<10; $a++){
		$numero = substr($num, $a, 1)*$fatores[$a];
		if($numero>=10){
			$soma += substr($numero, 1);
		} else {
			$soma += $numero;
		}
	}
	
	// Monta dígito
	if($soma>10){
		$digito = 10-(substr($soma, strlen($soma)-1,1));
	} else {
		$digito = 10-$soma;
	}
	
	if($digito == 10){
		$digito = 0;
	} 
	
	
	// Retorna valor formatado com o nosso número como deve ser impresso
	return $agencia." ".$nossonumero." ".$digito;
}


}
?>