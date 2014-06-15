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

class Boleto_Banco_Hsbc extends Boleto_Banco_Comum
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
//	$codbank = "399";
      $codbank = $this->formata_numero($info["codigo_banco"], 3, 0);
      $codigo_banco = $this->_geraCodigoBanco($codbank);

      // =========  Definição de moeda  =========
      $moeda = "9";

// ==========================  FINAL DADOS QUE NORMALMENTE NÃO MUDAM  ==========================

// ==================================  INICIO DADOS DO BANCO  ==================================

      // =========  Pega agência e conta cedente  =========
      $agencia = substr(sprintf("%04d", $info["agencia"]),0, 4);
      $contacedente = substr(sprintf("%07d", $info["conta_cedente"]),0, 7);

      // =========  Pega código do cedente  =========
      $nconvenio = substr(sprintf("%07d", $info["convenio"]),0, 7);

      // =========  Monta agência/Código cedente  =========
      $agencia_codigo = "$agencia / $nconvenio";

      // =========  Código do aplicativo  =========
      $cod_aplic = "2"; // CNR

      // =========  Tipo identificador  =========
      $tipo_id = "4";

// ==================================  FINAL DADOS DO BANCO  ==================================

// =================  INICIO DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

      // =========  Pega nosso número / Código do documento  =========
      $nosso_numero = sprintf("%013d", $info["nosso_numero"]);

      // =========  Monta vencimento no formato juliano + último dígito do ano (fonte: projeto boletophp)  =========
      $dia = (int)substr($vcto,0,2);
      $mes = (int)substr($vcto,3,2);
      $ano = (int)substr($vcto,6,4);
      $dataf = strtotime("$ano/$mes/$dia");
      $datai = strtotime(($ano-1).'/12/31');
      $dias  = (int)(($dataf - $datai)/(60*60*24));
      $data_jul = str_pad($dias,3,'0',STR_PAD_LEFT).substr($vcto,9,4);

      // =========  Cálculo dos dígitos verificadores do número bancário / Código do documento / Monta nosso número para exibição no boleto  =========
      $ndoc = $nosso_numero.$this->_modulo_11_invertido($nosso_numero).$tipo_id;
      $vence = "$dvence$mvence".substr($avence,-2);
      $ndoc1 = $ndoc + $contacedente + $vence;
      $nosso_numero_blqto = $ndoc.$this->_modulo_11_invertido($ndoc1);

// =================  FINAL DADOS DO NOSSO NÚMERO E OUTROS DADOS NECESSÁRIOS  =================

// ===============  INICIO MONTAGEM NÚMERO DO CÓDIGO DE BARRAS E LINHA DIGITÁVEL  ===============

      // =========  43 numeros para o calculo do digito verificador do código de barras  =========
      $dvcampo = "$codbank$moeda$fatorvcto$valor$nconvenio$nosso_numero$data_jul$cod_aplic";

      $dv =  $this->_modulo11($dvcampo);

      // =========  Numero para o codigo de barras com 44 digitos  =========
      $num = "$codbank$moeda$dv$fatorvcto$valor$nconvenio$nosso_numero$data_jul$cod_aplic";

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