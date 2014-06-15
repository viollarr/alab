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

class Boleto_Banco_Real extends Boleto_Banco_Comum
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
//	$codbank = "356";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
      $moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

      // =========  Pega agência e conta cedente  =========
      $agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);
      $contacedente = substr(sprintf("%07d", $info["conta_cedente"]),0, 7);

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Pega nosso número  =========
      $nosso_numero = sprintf("%013d", $info["nosso_numero"]);

      // =========  Calcula digitão da cobrança  =========
      $dgtao_cobdata = "$nosso_numero$agencia$contacedente";
      $dgtao_cob = $this->_modulo10($dgtao_cobdata, 1);

      // =========  Monta agência/Código cedente  =========
      $agencia_codigo = "$agencia / $contacedente / $dgtao_cob";

      // =========  Monta nosso número para exibição no boleto  =========
      $nosso_numero_blqto = $nosso_numero;

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      $dvcampo = "$codbank$moeda$fatorvcto$valor$agencia$contacedente$dgtao_cob$nosso_numero";
      $dv =  $this->_modulo11($dvcampo);

      // =========  Numero para o codigo de barras com 44 digitos  =========
      $num = "$codbank$moeda$dv$fatorvcto$valor$agencia$contacedente$dgtao_cob$nosso_numero";

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