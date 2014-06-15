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
// +----------------------------------------------------------------------+
//
// @(#) $Id: class.html.php,v 1.20 2002/03/16 03:19:07 jcpm Exp $
//


/**
 * A classe Boleto_HTML é utilizada para gerar o boleto em formato HTML. Ela
 * é especialmente importante para usuários do pacote que não tem a opção de
 * usar o módulo GD do PHP para gerar imagens, ou a opção do módulo PDF do PHP
 * para gerar o boleto em PDF.
 *
 * @version  2
 * @author   João Prado Maia <jpm@phpbrasil.com>
 */

include_once(BOLETO_INC_PATH . "class.grava_erro.php");
require_once(BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "class.comum.php");

class Boleto_HTML extends Boleto_Comum
{
    /**
     * Objeto guardando a referência ao objeto de manipulação de arquivos INI
     * @var object
     */
    var $inidb;

    /**
     * Objeto contendo a referência para o objeto de acesso a banco de dados
     * @var object
     */
    var $db;

    /**
     * Vetor associativo com os valores configuráveis da geração de boletos
     * @var array
     */
    var $boleto;

    /**
     * Vetor associativo com os valores configuráveis pela interface de administração
     * @var array
     */
    var $config;

    /**
     * Vetor associativo com os valores configuráveis relacionados ao banco
     * @var array
     */
    var $banco;

    /**
     * Vetor associativo com os valores configuráveis pela passagem de parâmetros ao script de geração de boletos
     * @var array
     */
    var $opcoes;

    /**
     * Vetor associativo contendo o arquivo de imagem usado para gerar o código de barras
     * @var array
     */
    var $cores;

    /**
     * Representação numérica do código de barras
     * @var string
     */
    var $barra = "";

    /**
     * Caminho completo para o template HTML do boleto
     * @var string
     */
    var $template_filename = "";

    /**
     * Conteúdo do template HTML
     * @var string
     */
    var $html_template;

    /**
     * Construtor da classe.
     *
     * @access  public
     * @return  void
     */
    function Boleto_HTML()
    {
        $arquivo_classe = BOLETO_INC_PATH . "class.ini.php";
        if (!@include_once($arquivo_classe)) {
            Boleto_HTML::_mostraErro("Classe não pôde ser incluída ('$arquivo_classe')", __FILE__, __LINE__);
        } else {
            $this->inidb = new File_Ini(BOLETO_CONF_PATH . "phpboleto.ini.php", "#");
            $this->template_filename = BOLETO_INC_PATH . "templates" . BOLETO_SEPARADOR . "template.html.php";
            $inidata = $this->inidb->getBlockValues("Admin Geral");
            $sistema = $inidata["BOLETO_SISTEMA"];
            $arquivo_classe = BOLETO_INC_PATH . "class.db.php";
            if (!@include_once($arquivo_classe)) {
                Boleto_HTML::_mostraErro("Classe não pôde ser incluída ('$arquivo_classe')", __FILE__, __LINE__);
            } else {
                $this->db = Boleto_DB::conectar($sistema);
            }
        }
    }

    /**
     * Método público para a geração do boleto em formato HTML.
     *
     * @access  public
     * @param   $id_boleto int ID do boleto
     * @param   $info array Vetor com as opções de criação do boleto
     * @return  void
     */
    function geraBoleto($id_boleto, $info)
    {
        // opções vindo do formulário
        

        $this->opcoes = $info;
        $this->_checaParametrosMandatorios();

        $this->_pegaOpcoesBoleto($id_boleto);

        $this->_pegaOpcoesConfig($id_boleto);
       // echo "<h1>class.html.php ::geraBoleto $id_boleto</h1>";
        $this->_geraDadosBanco($id_boleto);


        $this->_abreTemplate();
        $this->_geraCores();
        $this->_geraBarraCodigo($this->banco["codigo_barras"]);
        $this->_geraDadosBoleto();
        $this->_mostraTemplate();
    }

    /**
     * Método utilizado para chamar uma função da API de acesso a banco de dados
     * para pegar as opções do boleto especificado.
     *
     * @access  private
     * @param   $id_boleto int ID do boleto
     * @return  void
     */
    function _pegaOpcoesBoleto($id_boleto)
    {
        // checagem por um boleto avulso
        if ($id_boleto == "nulo") {
            $this->boleto = &$this->opcoes;
        } else {
            $this->boleto = $this->db->pegaOpcoesBoleto($id_boleto);
            if ($this->boleto === false) {
                $this->_mostraErro("Erro: ID do boleto não pôde ser encontrado.", __FILE__, __LINE__);
            }
        }
        $this->opcoes["agencia"] = $this->_inicializar($this->opcoes["agencia"], $this->boleto["agencia"]);
        $this->opcoes["agencia_dig"] = $this->_inicializar($this->opcoes["agencia_dig"], $this->boleto["agencia_dig"]);
        $this->opcoes["conta_cedente"] = $this->_inicializar($this->opcoes["conta_cedente"], $this->boleto["conta_cedente"]);
        $this->opcoes["conta_cedente_dig"] = $this->_inicializar($this->opcoes["conta_cedente_dig"], $this->boleto["conta_cedente_dig"]);
        $this->opcoes["codigo_banco"] = $this->_inicializar($this->opcoes["codigo_banco"], $this->boleto["codigo_banco"]);
        $this->opcoes["carteira"] = $this->_inicializar($this->opcoes["carteira"], $this->boleto["carteira"]);
        $this->opcoes["data_documento"] = $this->_inicializar($this->opcoes["data_documento"], date("d/m/Y"));
        $this->opcoes["vencimento"] = $this->_inicializar($this->opcoes["vencimento"], date("d/m/Y", time()+60*60*24*7));
        $this->opcoes["numero_documento"] = $this->_inicializar($this->opcoes["numero_documento"], "");
        $this->opcoes["convenio"] = $this->_inicializar($this->opcoes["convenio"], $this->boleto["convenio"]);
        $this->opcoes["codigo"] = $this->_inicializar($this->opcoes["codigo"], $this->boleto["codigo"]);
    }

    /**
     * Método utilizado para chamar uma função da API de acesso a banco de dados
     * para pegar as opções do boleto especificado.
     *
     * @access  private
     * @param   $id_boleto int ID do boleto
     * @return  void
     */
    function _pegaOpcoesConfig($id_boleto)
    {
        // checagem por um boleto avulso
        if ($id_boleto == "nulo") {
            $this->config = &$this->opcoes;
        } else {
            $this->config = $this->db->pegaOpcoesConfig($this->boleto["cid"]);
            if ($this->config === false) {
                $this->_mostraErro("Erro: ID da configuração não pôde ser encontrado.", __FILE__, __LINE__);
            }
        }

        // adiciona as variaveis da barra de codigos
        if (!$this->largura_barra) {
            @$this->config["tamanho_fino"] = 1;
            @$this->config["tamanho_largo"] = 3;
        } else {
            @$this->config["tamanho_fino"] = $this->largura_barra;
            @$this->config["tamanho_largo"] = ($this->largura_barra * 2) + 1;
        }
    }

    /**
     * Método usado para pegar os valores configuráveis do Banco.
     *
     * @access  private
     * @return  void
     */
    function _geraDadosBanco($id_boleto)
    {
        if ($id_boleto == "nulo") {
            $layout = $this->opcoes["layout"];
        } else {
            $layout = $this->db->pegaNomeLayout($this->boleto["nome_banco"]);
        }
        $arquivo = BOLETO_INC_PATH . "boletos" . BOLETO_SEPARADOR . "bancos" . BOLETO_SEPARADOR . $layout;
        //echo "<h2>$arquivo</h2>";
        if (!@include_once($arquivo)) {
            $this->_mostraErro("Classe não pôde ser incluída ('$arquivo')", __FILE__, __LINE__);
        } else {
            $nome_classe = $this->_pegaLayoutClasse();
            $obj = new $nome_classe;
            $this->banco = $obj->geraDadosBanco($this->opcoes);
        }
    }

    /**
     * Método usado para substituir os 'placeholders' com o texto correto.
     *
     * @access  private
     * @param   string $chave Chave que será substituída
     * @param   string $texto Novo texto para ser usado na substituição
     * @return  void
     */
    function _escreveTexto($chave, $texto)
    {
        $tag = "%" . $chave . "%";
        $this->html_template = str_replace($tag, $texto, $this->html_template);
    }

    /**
     * Método usado para gerar o texto corretamente nos 'placeholders' do
     * template HTML do boleto.
     *
     * @access  private
     * @return  void
     */
    function _geraDadosBoleto()
    {
global $mosConfig_live_site;

        $this->_escreveTexto("HTMLFONT", "arial,helvetica,sans-serif");
        $this->_escreveTexto("BOLETO_IMAGE_URL", BOLETO_IMAGE_URL);

        //Seu logo no boleto
        $logoboleto = $this->_inicializar($this->config["servidor_http"], BOLETO_IMAGE_URL."/logo.png");
        if (!eregi("http://", $logoboleto) || !eregi("https://", $logoboleto)){
           if (substr($logoboleto, 0, 1) != "/"){
              $logoboleto = "/$logoboleto";
           }
        $logoboleto = "$mosConfig_live_site$logoboleto";
        }
//original        $this->_escreveTexto("SEU_LOGO", $this->_inicializar($this->config["servidor_http"], BOLETO_IMAGE_URL."/logo.png"));
        $this->_escreveTexto("SEU_LOGO", $logoboleto);

        // Banco
//        $this->_escreveTexto("BANK", ucfirst($this->boleto["nome_banco"]));
        $this->_escreveTexto("BANK", substr($this->banco["codigo_banco"], 0, 3));
        // Código do Banco
        $this->_escreveTexto("BANKCODE", $this->banco["codigo_banco"]);
        // Uso do banco
        $this->_escreveTexto("USOBC", $this->boleto["uso_do_banco"]);
        // Linha digitavel
        $this->_escreveTexto("LINHA", $this->banco["linha_digitavel"]);
        // cedente
        $this->_escreveTexto("CDTE", $this->boleto["cedente"]);
        // vencimento
        $this->_escreveTexto("VCTO", $this->opcoes["vencimento"]);
        // nosso numero
        $this->_escreveTexto("NNUM", $this->banco["nosso_numero"]);
        // numero documento
        $this->_escreveTexto("NDOC", $this->opcoes["numero_documento"]);
        // especie documento
        $this->_escreveTexto("EDOC", $this->boleto["especie_documento"]);
        // data do documento
        $this->_escreveTexto("DDOC", $this->opcoes["data_documento"]);
        // agencia/codigo cedente
        $this->_escreveTexto("AGCOD", $this->banco["agencia_codigo"]);

        // Valor do documento
//original        $this->_escreveTexto("VDOC", $this->opcoes["valor_documento"]);
        $this->_escreveTexto("VDOC", number_format(str_replace(',', '.', $this->opcoes["valor_documento"]), 2, ',', '.'));

        // Acrescimos
        $this->_escreveTexto("ACRES", $this->_inicializar($this->opcoes["acrescimos"], ""));
        // Valor cobrado
        $this->_escreveTexto("VCOBR", $this->_inicializar($this->opcoes["valor_cobrado"], ""));
        // Sacado
        $this->_escreveTexto("SACADO", nl2br($this->_inicializar($this->opcoes["sacado"], "Não informado")));
        // CPF
        $this->_escreveTexto("CPF", $this->_inicializar($this->opcoes["cgc_cpf"], ""));
        // Local de Pagamento
        $this->_escreveTexto("LP", $this->boleto["local_pagamento"]);
        // Sacador
//Original        $this->_escreveTexto("SACADOR", $this->boleto["sacador"]);
        $this->_escreveTexto("SACADOR", $this->_inicializar($this->opcoes["sacador"], ""));
        // Aceite
        $this->_escreveTexto("ACT", "");
        // data do processamento
        $this->_escreveTexto("DPROC", $this->_inicializar($this->opcoes["data_processamento"], $this->opcoes["data_documento"]));
        // carteira
        $this->_escreveTexto("CART", $this->boleto["carteira"]);
        //  Especificacao moeda
        $this->_escreveTexto("ESPMOED", $this->_inicializar($this->opcoes["especificacao_moeda"], "R$"));
        // quantidade
        $this->_escreveTexto("QTDE", $this->_inicializar($this->opcoes["quantidade"], ""));
        // valor da moeda
        $this->_escreveTexto("VMOED", $this->_inicializar($this->opcoes["valor_moeda"], ""));
        // descontos
        $this->_escreveTexto("DESC", $this->_inicializar($this->opcoes["descontos"], ""));
        // Deducoes
        $this->_escreveTexto("DDC", $this->_inicializar($this->opcoes["deducoes"], ""));
        // mora / multa
        $this->_escreveTexto("MULTA", $this->_inicializar($this->opcoes["multa"], ""));
		$valoranuidade= str_replace(',', '.', $this->opcoes["valor_documento"])-4.50;
		$this->_escreveTexto("VALORANUIDADEDESCRIMINADA", number_format($valoranuidade , 2, ',', '.'));
		
        // instrucoes
        $this->_escreveTexto("INSTR1", $this->_inicializar($this->opcoes["instrucoes_linha1"], $this->boleto["instrucoes_linha1"]));
        $this->_escreveTexto("INSTR2", $this->_inicializar($this->opcoes["instrucoes_linha2"], $this->boleto["instrucoes_linha2"]));
        $this->_escreveTexto("INSTR3", $this->_inicializar($this->opcoes["instrucoes_linha3"], $this->boleto["instrucoes_linha3"]));
        $this->_escreveTexto("INSTR4", $this->_inicializar($this->opcoes["instrucoes_linha4"], $this->boleto["instrucoes_linha4"]));
        $this->_escreveTexto("INSTR5", $this->_inicializar($this->opcoes["instrucoes_linha5"], $this->boleto["instrucoes_linha5"]));

        // barra de códigos
        $this->_escreveTexto("BAR", $this->barra);

        // demonstrativo
        $this->_escreveTexto("DEMONS1", $this->_inicializar($this->opcoes["demons1"], $this->boleto["demons1"]));
        $this->_escreveTexto("DEMONS2", $this->_inicializar($this->opcoes["demons2"], $this->boleto["demons2"]));
        $this->_escreveTexto("DEMONS3", $this->_inicializar($this->opcoes["demons3"], $this->boleto["demons3"]));
        $this->_escreveTexto("DEMONS4", $this->_inicializar($this->opcoes["demons4"], $this->boleto["demons4"]));
        $this->_escreveTexto("DEMONS5", $this->_inicializar($this->opcoes["demons5"], ""));
        $this->_escreveTexto("DEMONS6", $this->_inicializar($this->opcoes["demons6"], ""));
        $this->_escreveTexto("DEMONS7", $this->_inicializar($this->opcoes["demons7"], ""));
        $this->_escreveTexto("DEMONS8", $this->_inicializar($this->opcoes["demons8"], ""));
        $this->_escreveTexto("DEMONS9", $this->_inicializar($this->opcoes["demons9"], ""));

        // campos desativados para manter o padrao entre os formatos de boleto
        $this->_escreveTexto("ENDERECO", "");
        $this->_escreveTexto("CEP", "");
        $this->_escreveTexto("BAIRRO", "");
        $this->_escreveTexto("ESTADO", "");
    }


    /**
     * Método para criar o vetor de cores / imagens usado na gerações dos boletos
     * em HTML.
     *
     * @access  private
     * @return  void
     */
    function _geraCores()
    {
        $this->cores["preto"] = BOLETO_IMAGE_URL . "barra_preta.gif";
        $this->cores["branco"] = BOLETO_IMAGE_URL . "barra_branca.gif";
    }

    /**
     * Método usado na geração de barras, uma por vez.
     *
     * @access  private
     * @param   string $acao Ação que deve ser tomada
     * @return  void
     */
    function _geraCodigo($acao)
    {
        if ($acao == "comeco") {
            $this->_adicionaBarra($this->cores["preto"], $this->config["tamanho_fino"]);
            $this->_adicionaBarra($this->cores["branco"], $this->config["tamanho_fino"]);
            $this->_adicionaBarra($this->cores["preto"], $this->config["tamanho_fino"]);
            $this->_adicionaBarra($this->cores["branco"], $this->config["tamanho_fino"]);
        } elseif ($acao == "fim"){	
            $this->_adicionaBarra($this->cores["preto"], $this->config["tamanho_largo"]);
            $this->_adicionaBarra($this->cores["branco"], $this->config["tamanho_fino"]);
            $this->_adicionaBarra($this->cores["preto"], $this->config["tamanho_fino"]);
            $this->_adicionaBarra($this->cores["branco"], $this->config["tamanho_largo"]);
        } else {
            $this->_mostraErro("Ação desconhecida '$acao'", __FILE__, __LINE__);
        }
    }

    /**
     * Método usado para gerar as barras do código de barras a partir de uma
     * representação numérica da mesma.
     *
     * @access  private
     * @param   int $numero Representação numérica do código de barras
     * @return  void
     */
    function _geraBarraCodigo($numero)
    {
        $this->_geraCodigo('comeco');
        for ($i = 0; $i < strlen($numero); $i = $i+2) {
            $codigo = substr($numero, $i, 2);
            $this->_geraBarra($codigo);
        }
        $this->_geraCodigo('fim');
    }

    /**
     * Método usado para concatenar a imagem da barra no conteúdo da variável
     * que será substituída eventualmente no template HTML do boleto.
     *
     * @param   string $imagem_barra A URL da imagem da barra
     * @param   int $largura Largura da barra
     * @return  void
     */
    function _adicionaBarra($imagem_barra, $largura)
    {
//original        $this->barra .= "<img SRC=\"" . $imagem_barra . "\" width=\"" . $largura . "\" height=\"" . $this->altura_barra . "\"/>";

//Corrigido para possibilitar o envio por e-mail - Fernando Soares - http://www.fernandosoares.com.br

        $this->barra .= "<img height=\"" . $this->altura_barra . "\" \nSRC=\"" . $imagem_barra . "\" \nwidth=\"" . $largura . "\" />";
    }

    /**
     * Método usado para pegar o conteúdo original do template HTML do boleto.
     *
     * @access  private
     * @return  void
     */
    function _abreTemplate()
    {
        $this->html_template = join("", file($this->template_filename));
    }

    /**
     * Método usado para imprimir na tela o template HTML.
     *
     * @access  private
     * @return  void
     */
    function _mostraTemplate()
    {
        echo $this->html_template;
    }

    /**
     * Método usado para gravar uma mensagem de erro num arquivo padrão, para
     * ser usado eventualmente como fonte de informações mais detalhadas num
     * pedido de suporte para o software.
     *
     * @access  public
     * @param   string $erro Mensagem descrevendo o erro
     * @param   string $script Caminho completo para o script onde o erro ocorreu
     * @param   int $linha Número da linha onde o erro ocorreu
     * @return  void
     */
    //function _mostraErro($erro, $script, $linha)
    function _mostraErro($erro)
    {
        GravaErro::grava($erro, $script, $linha);
        echo "<b>$erro</b>";
        exit;
    }
}

?>