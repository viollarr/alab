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

class Boleto_Banco_Unibanco extends Boleto_Banco_Comum
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
//	$codbank = "409";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
	$moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

	// =========  Pega agência e conta cedente  =========
	$agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);
	$contacedente = substr(sprintf("%06d", $info["conta_cedente"]),0, 6);

	// =========  Pega número do convenio / número do cliente no código de barras   >>>>>  COM DV  <<<<<  =========
	$nconvenio = substr(sprintf("%07d", $info["convenio"]),0, 7);

      // =========  Monta agência/codigo cedente  =========
      $agencia_codigo = "$agencia / $contacedente - " . $info["conta_cedente_dig"];

      // =========  Código para transação CVT  =========
      if($info["codigo"] == "1"){
      $cod_cvt = "5";
      }elseif($info["codigo"] == "2"){
      $cod_cvt = "04";
      }

      // =========  Outros dados necessários  =========
      $zeros = "00";

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Pega nosso número gera dv  =========
      if($info["codigo"] == "1"){
      $nosso_numero = $this->formata_numero($info["nosso_numero"],14,0);
      $dvnn = $this->_modulo11($nosso_numero, 9, 1);
        if($dvnn == "1" || $dvnn == "10"){
          $dvnn = "0";
        }
      }elseif($info["codigo"] == "2"){
      $nosso_numero = $this->formata_numero($info["nosso_numero"],11,0);
      $dvnn = $this->_modulo11("1$nosso_numero", 9, 1);
        if($dvnn == "1" || $dvnn == "10"){
          $dvnn = "0";
        }
      }

      // =========  Monta nosso número para exibição no boleto  =========
      if($info["codigo"] == "1"){
      $nosso_numero_blqto = "$nosso_numero - $dvnn";
      }elseif($info["codigo"] == "2"){
      $nosso_numero_blqto = "1 / $nosso_numero / $dvnn";
      }

      // =========  Monta data para código de barras no caso de cobrança com registro  =========
      $data_cb = substr($avence, -2) . "$mvence$dvence";

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      if($info["codigo"] == "1"){
      $dvcampo = "$codbank$moeda$fatorvcto$valor$cod_cvt$nconvenio$zeros$nosso_numero$dvnn";
      $dv =  $this->_modulo11($dvcampo);
      }elseif($info["codigo"] == "2"){
      $dvcampo = "$codbank$moeda$fatorvcto$valor$cod_cvt$data_cb$agencia" . $info["agencia_dig"] . "$nosso_numero$dvnn";
      $dv =  $this->_modulo11($dvcampo);
      }

      // =========  Numero para o codigo de barras com 44 digitos  =========
      if($info["codigo"] == "1"){
      $num = "$codbank$moeda$dv$fatorvcto$valor$cod_cvt$nconvenio$zeros$nosso_numero$dvnn";
      }elseif($info["codigo"] == "2"){
      $num = "$codbank$moeda$dv$fatorvcto$valor$cod_cvt$data_cb$agencia" . $info["agencia_dig"] . "$nosso_numero$dvnn";
      }

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