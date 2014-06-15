<?php
	require_once("../conexao.php");
	require_once("../check_user.php");
	require_once("../check_lang.php");
	
	$id_participante = $_SESSION['id_participante'];
	$id_evento = $_SESSION['id_evento'];	
	$data_hoje = date('Y-m-d');
	//$data_hoje="2011-03-17";
	
	$sql = "SELECT p.id_tipo_participante, t.isento_inscricao, p.cpf, p.passaporte
		FROM ev_tipo_participante t
			INNER JOIN ev_participante p ON t.id = p.id_tipo_participante
		WHERE p.id_evento = {$id_evento} AND p.id = {$_SESSION['id_participante']}";
	$result = mysql_query($sql, $conexao) or die(mysql_error());
	$participante = mysql_fetch_assoc($result);

	// Retirar possíveis espaços em branco desses atributos.
	$participante['cpf'] = trim($participante['cpf']);
	$participante['passaporte'] = trim($participante['passaporte']);
	
	/*
	echo "participante: <pre>";
		print_r($participante);
	echo "</pre>";
	/**/
		  
	$sql_participante = "SELECT * FROM ev_participante 
						 WHERE id='".$_SESSION['id_participante']."' AND id_evento='".$_SESSION['id_evento']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	$id_tipo_participante=$p['id_tipo_participante'];
	
	//print "id tipo participante: ".$participante['id_tipo_participante']."<br />";
	//print "Data hoje: ".$data_hoje."<br />";
	
	$sql_chamada = "SELECT * FROM ev_chamada WHERE id_evento = '".$_SESSION['id_evento']."' AND tipo='inscricao'";
	//echo "<br>sql: " . $sql_chamada;
	$qr_chamada = mysql_query($sql_chamada, $conexao) or die(mysql_error());
	$periodo_pagamento = FALSE;
	while($ch=mysql_fetch_assoc($qr_chamada)) {			
		if (($data_hoje >= $ch['data_inicio'] ) and ($data_hoje <= $ch['data_fim'] )) {
			$periodo_pagamento = TRUE;
			//print"id chamada: ". $ch['id']."<br />";
			$sql = "SELECT preco_reais FROM ev_chamada_tipo_participante WHERE id_chamada='".$ch['id']."' AND id_tipo_participante='".$participante['id_tipo_participante']."' ";
			$qr = mysql_query($sql, $conexao) or die(mysql_error());
			$ln = mysql_fetch_assoc($qr);
			
			// Baseado em http://br.php.net/manual/pt_BR/function.stripos.php
			$pos_ponto = stripos($ln['preco_reais'], ".");
			
			if ($pos_ponto === false) {
				$valor_boleto = $ln['preco_reais'].".00";
			}else $valor_boleto = $ln['preco_reais'];
		}//if

		// Essa condição foi adicionada no dia 11/06/2012 [Daniel], pois o pessoal do Queering Paradigms 
		// precisavam que somente o pagamento da inscrição de ouvintes fosse prolongado até o dia 10/07/2012 [editado no dia 18/06/2012: "até o dia 01/07/2012"].
		// Como esse requisito - período de pagamento de inscrição diferenciado por tipo de usuário - não estava presente no escopo inicial, acrescentei esse if somente para este caso.
		if( (date('Ymd') <= 20120701) && ($participante['id_tipo_participante'] == 13) && ($id_evento == 28) ){
		//if( $id_participante == 2510 ){ // O Rodrigo Borba pediu no dia 02/07/2012 para enviar o boleto deste participante id = 2510. Pode apagar.
			$periodo_pagamento = TRUE;
			//print"id chamada: ". $ch['id']."<br />";
			$sql = "SELECT preco_reais FROM ev_chamada_tipo_participante WHERE id_chamada='".$ch['id']."' AND id_tipo_participante='".$participante['id_tipo_participante']."' ";
			$qr = mysql_query($sql, $conexao) or die(mysql_error());
			$ln = mysql_fetch_assoc($qr);
			
			// Baseado em http://br.php.net/manual/pt_BR/function.stripos.php
			$pos_ponto = stripos($ln['preco_reais'], ".");
			
			if ($pos_ponto === false) {
				$valor_boleto = $ln['preco_reais'].".00";
			}else $valor_boleto = $ln['preco_reais'];
		} //if 
	}//while
	//echo "valor boleto: ".$valor_boleto;
	
	$pagamento = mysql_fetch_array(mysql_query("SELECT pago FROM ev_pagamento WHERE id_participante = $id_participante"));
	$pagamento = $pagamento[0];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="../css/template.css" type="text/css" />

<script type="text/javascript" src="../js/jquery.js"></script> 
<script src="../js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/qp4_banner.jpg" width="990" height="215" />         
        </div>
		<div id="menu_idiomas"><a href="boleto.php?lang=pt"><img src="../images/flag_pt.gif" alt="" /></a> &nbsp; <a href="boleto.php?lang=en"><img src="../images/flag_en.gif" alt="" /></a></div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">

    <div id="artigo">
       <div id="box_trabalhos">
       		<span class="txt_titulo_destaque"><?php techo('Pagamento de inscri&ccedil;&atilde;o', 'Registration payment'); ?></span>
         <p>&nbsp;</p> 
         <?php
			if ($participante['isento_inscricao'] == 'sim'){ // Verificar se este tipo de participante está isento de pagamento de inscrição.
				echo "<p class=\"txt_topico_tabela\">"; techo('Convidados e membros da comissão do Queering Paradigms 4 não pagam a inscrição do evento.', 'Guests and committee members of the Queering Paradigms IV do not pay the event registration.'); echo "</p>";
		 	}elseif ($pagamento == "sim") { // Verificar se já pagou a inscrição.
				echo "<p class=\"txt_topico_tabela\">"; techo('O pagamento da sua inscrição já foi efetuado.', 'Payment of your registration has been made.'); echo "</p>";		 
			}elseif(!$periodo_pagamento){ // Verificar se está no período de pagamento.
				echo "<p class=\"txt_topico_tabela\">"; techo('Não está no período de pagamento.', 'It is not in the pay period.'); echo "</p>";
			}elseif(!empty($participante['cpf'])){  // Verificar se é brasileiro: CPF preenchido.
				if(!empty($valor_boleto)){ ?>
					<form action="boleto/boleto_bb.php" method="post" target="_blank">
						<input type="submit" name="button" id="button" class="botao_trabalho" value="Gerar boleto" />
						<input name="valor_boleto" type="hidden" value="<?=$valor_boleto;?>" />
						<input name="id_evento" type="hidden" value="<?=$id_evento;?>" />
						<input name="id_participante" type="hidden" value="<?=$id_participante;?>" />
					</form>
				<?php } //if
 			}// if cpf
		 	
			
			// Botão PayPal
			/*
			$tipo_participante = mysql_fetch_assoc(mysql_query("SELECT nome, nome_en FROM ev_tipo_participante WHERE id = {$id_tipo_participante} ")); ?>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="alab@alab.org.br">
				<input type="hidden" name="lc" value="<?php techo('BR', 'US'); ?>">
				<input type="hidden" name="item_name" value="Queering Paradigms IV - <?php techo($tipo_participante['nome'], $tipo_participante['nome_en']); ?>">
				<input type="hidden" name="item_number" value="<?php echo $id_participante; ?>">
				<input type="hidden" name="amount" value="<?php echo $valor_boleto; ?>">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="button_subtype" value="services">
				<input type="hidden" name="no_note" value="0">
				<input type="hidden" name="return" value="http://www.alab.org.br/eventosalab/queering/pagamento.php?id_participante=<?php echo $id_participante; ?>&valor=<?php echo $valor_boleto; ?>">
				<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHostedGuest">
				<?php if($_SESSION['lang'] == 'pt'): ?>
					<input type="image" src="https://www.paypalobjects.com/pt_BR/i/btn/btn_paynow_LG.gif" border="0" name="submit">
					<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
				<?php else: ?>
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif" border="0" name="submit">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				<?php endif; ?>
			</form>
			*/
			// fim: botão PayPal
			?>
      </div>
    </div>
       
  </div>   

  		<div id="lado_direito">
            
			<div id="links_rapidos">
	            <div class="titulo_boxes"><h2><?php techo('Área do Participante', 'Participant Area'); ?></h2></div>
                    <form action="controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td class="txt_topico_tabela"><?php techo('Ol&aacute;', 'Hello'); ?>, <?php print $_SESSION["nome_participante"];?></td>
                          </tr>
                          <tr>
                            <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" ><?php techo('sair', 'logout'); ?></a></td>
                            <!-- id = id do envento-->
                          </tr>
                        </table>
                      </div>
                    </form>

            </div>            <br />
            <!--<div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Links interessantes</h2></div>
            	<ul>
                	<li><a href="#">Documento oficial</a></li>
                	<li><a href="#">Normas a serem seguidas</a></li>
                	<li><a href="#">Site da ALAB</a></li>                                                            
                </ul>
            </div>-->
        </div><!-- lado direito -->
        <div class="clear"></div>
		<div id="footer">
              <div align="center">
                  <div class="txt_footer">ALAB - Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil</div>
              </div>	
        </div>

    </div><!-- tudo -->
</body>
</html>
