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

require_once(BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "bancos" . BOLETO_SEPARADOR . "class.banco.comum.php");

class Boleto_Banco_Mercantil extends Boleto_Banco_Comum
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
//	$codbank = "389";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
	$moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

	// =========  Pega agência  =========
	$agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);

	// =========  Pega número do convenio / código do cedente (contrato de cobrança) >>>COM DV<<<  =========
	$nconvenio = substr(sprintf("%09d", $info["convenio"]),0, 9);

      // =========  Indicador de desconto.  constante e igual a 2 (SEM DESCONTO)  =========
      $ind_desc = "2";

      // =========  Monta agência/Código cedente  =========
      $agencia_codigo = "$agencia / " . substr($nconvenio,0,8) . " - " . substr($nconvenio,-1);

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Pega nosso número  =========
	$nosso_numero = sprintf("%010d", $info["nosso_numero"]);

      // =========  Monta nosso número para exibição no boleto  =========
      $dvcamponn="$agencia$nosso_numero";
      $dvnn=$this->_modulo11($dvcamponn,9,1);
      if($dvnn == "0" || $dvnn == "1"){
        $dvnn = "0";
      }else{
        $dvnn = 11 - $dvnn;
      }
      $nosso_numero_blqto="$nosso_numero - $dvnn";

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      $dvcampo = "$codbank$moeda$fatorvcto$valor$agencia$nosso_numero$dvnn$nconvenio$ind_desc";
      $dv =  $this->_modulo11($dvcampo);

      // =========  Numero para o codigo de barras com 44 digitos  =========
      $num = "$codbank$moeda$dv$fatorvcto$valor$agencia$nosso_numero$dvnn$nconvenio$ind_desc";

      // =========  Devolve a linha digitavel  =========
      $linha_digitavel = $this->_montaLinha($num, 1);

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


}
?>