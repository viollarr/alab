<?php
	require_once("sessoes.php");
	require_once("../check_user.php");
	$data_hoje=date('Y-m-d');
	//$data_hoje="2011-02-01";

	$sql_chamada = "SELECT data_fim 
					FROM ev_chamada 
					WHERE 
						id_evento='".$_SESSION['id_evento']."' 
						AND tipo='trabalho' 
						AND estado = 'ativa'
					ORDER BY ordem DESC LIMIT 1";
	$qr_chamada = mysql_query($sql_chamada, $conexao) or die(mysql_error());
	$m_chamada = mysql_fetch_assoc($qr_chamada);
	$ultima_chamada_trabalho = $m_chamada['data_fim'];
	//$ultima_chamada_trabalho = "2011-01-25"; // teste
	
	//RESUMOS DE COMUNICAÇÃO INDIVIDUAL E POSTER
	$sql_resumos = "SELECT r.id AS idresumo, tt.nome AS tipodetrabalho, r.titulo AS tituloresumo, r.id_linha_tematica, r.titulo, r.id_tipo_trabalho, r.id_simposio, r.id_comunicacao_coordenada, r.autor, r.co_autor, r.co_autor2, r.co_autor3, r.resumo, r.palavras_chave   
					FROM ev_resumo r, ev_tipo_trabalho tt
					WHERE  r.id_tipo_trabalho = tt.id AND
					(r.autor='".$_SESSION['id_participante']."' OR r.co_autor='".$_SESSION['id_participante']."' OR r.co_autor2='".$_SESSION['id_participante']."' OR r.co_autor3='".$_SESSION['id_participante']."') AND 
					r.id_evento='".$_SESSION['id_evento']."' AND
					(r.id_tipo_trabalho='5' OR r.id_tipo_trabalho='4')
					ORDER BY r.id ASC";
	$resumos = mysql_query($sql_resumos, $conexao) or die(mysql_error());
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />
<style type="text/css">
	.titulo_boxes {
		color:#FFFFFF;
		text-align:center;
		text-transform:uppercase;
	}
</style>
<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

<script type="text/javascript">
/*
	function mostra_div(id) {
    //tem que tratar browsers diferentemente
	  if (document.getElementById) { // DOM3 = IE5, NS6
			document.getElementById(id).style.display = 'block';
	  }
	  else {
			if (document.layers) { // Netscape 4
			  document.id.display = 'block';
			}
			else { // IE 4
			  document.all.id.style.display = 'block';
			}
	  }
	}
	function esconde_div(id) {
	  //tem que tratar browsers diferentemente
	  if (document.getElementById) { // DOM3 = IE5, NS6
			document.getElementById(id).style.display = 'none';
	  }
	  else {
			if (document.layers) { // Netscape 4
			  document.id.display = 'none';
			}
			else { // IE 4
			  document.all.id.style.display = 'none';
			}
	  }
	 } 
*/		
		
	function counterUpdate(opt_countedTextBox, opt_countBody, opt_maxSize) {
        var countedTextBox = opt_countedTextBox ?
                opt_countedTextBox : "countedTextBox";
        var countBody = opt_countBody ? opt_countBody : "countBody";
        var maxSize = opt_maxSize ? opt_maxSize : 1024;
    
        var field = document.getElementById(countedTextBox);
        if (field && field.value.length >= maxSize) {
            field.value = field.value.substring(0, maxSize);
        }
        var txtField = document.getElementById(countBody);
        if (txtField) {  
            txtField.innerHTML = field.value.length;
        }
    }	
</script>
</head>

<body>
<div id="tudo">

		<div id="header">
        <img src="../admin2012/telas/imgs_topo_eventos/<?php echo $_SESSION['imagem_topo'] ;?>" width="990" height="215" />       
        </div>
		<?php require("menu_participante.php"); ?>
		<p>&nbsp;</p>
		<div class="clear"></div>
        
  <div id="centro">
    <div id="artigo">
       <div id="box_trabalhos"><span class="txt_titulo_destaque">Resumo enviado</span>
		<p>&nbsp;</p>
        <?php 
		/*********************************************
		* Pôsteres e Papers *
		**********************************************/
		while($m_resumos=mysql_fetch_array($resumos)){ 
			//busca nome da linha tematica
			$sql_tematica="SELECT titulo FROM ev_linha_tematica WHERE id='".$m_resumos['id_linha_tematica']."'";
			$qr_tematica=mysql_query($sql_tematica, $conexao) or die(mysql_error());
			$ln_tematica=mysql_fetch_array($qr_tematica);
			
			//busca nome do autor se existir
			if ($m_resumos['autor']!=0){
				$sql_autor="SELECT us.name FROM jos_users us, ev_participante ev WHERE ev.id='".$m_resumos['autor']."' AND ev.id_associado_alab = us.id";
				$qr_autor=mysql_query($sql_autor, $conexao) or die(mysql_error());
				$ln_autor=mysql_fetch_array($qr_autor);
			}
			//busca nome do cocautor se existir
			if ($m_resumos['co_autor']!=0){
				$sql_coautor="SELECT us.name FROM jos_users us, ev_participante ev WHERE ev.id='".$m_resumos['co_autor']."' AND ev.id_associado_alab = us.id";
				$qr_coautor=mysql_query($sql_coautor, $conexao) or die(mysql_error());
				$ln_coautor=mysql_fetch_array($qr_coautor);
			}
			if ($m_resumos['co_autor2']!=0){
				$sql_coautor2="SELECT us.name FROM jos_users us, ev_participante ev WHERE ev.id='".$m_resumos['co_autor2']."' AND ev.id_associado_alab = us.id";
				$qr_coautor2=mysql_query($sql_coautor2, $conexao) or die(mysql_error());
				$ln_coautor2=mysql_fetch_array($qr_coautor2);
			}
			if ($m_resumos['co_autor3']!=0){
				$sql_coautor3="SELECT us.name FROM jos_users us, ev_participante ev WHERE ev.id='".$m_resumos['co_autor3']."' AND ev.id_associado_alab = us.id";
				$qr_coautor3=mysql_query($sql_coautor3, $conexao) or die(mysql_error());
				$ln_coautor3=mysql_fetch_array($qr_coautor3);
			}

					
			?>
			         <p>&nbsp;</p>
					 <p class="txt_categorias"><b><?php if ($m_resumos['id_tipo_trabalho']==5){print "Paper";} if ($m_resumos['id_tipo_trabalho']==4){print "Pôster";} ?></b></p>
                     <div style="background:#F2FBFF; border:1px solid #AADBFF; padding:10px 10px 0 10px;">
                     <?php if ($data_hoje <= $ultima_chamada_trabalho){ ?>
                     <form action="editarresumo.php" method="post">
                     <input name="id_resumo" type="hidden" value="<?=$m_resumos['idresumo'];?>" />
                     <input name="" type="image" src="http://www.alab.org.br/eventosalab/images/edit_f2.png" />
                     </form>
                     <?php } else{?>
							<p class="dados_obrigatorios">O prazo para edi&ccedil;&atilde;o de trabalho encerrou.</p>
						 <?php }//else?>
                     <br />
                     <table width="550" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Linha temática:</strong></td>
                        <td width="403" class="txt_resposta"><?php print $ln_tematica['titulo'];?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Título:</strong></td>
                        <td width="403" class="txt_resposta"><span style="text-transform:uppercase"><?php print $m_resumos['titulo'];?></span></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Autor:</strong></td>
                        <td width="403" class="txt_resposta"><?php print mb_strtoupper($ln_autor['name']);?></td>
                      </tr>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Co-autor:</strong></td>
                        <td width="403" class="txt_resposta"><?php print mb_strtoupper($ln_coautor['name']); if ($m_resumos['co_autor']==0){print '-';}?></td>
                      </tr>
                      <?php
					  if($m_resumos['co_autor2']!=0){
					  ?>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Co-autor 2:</strong></td>
                        <td width="403" class="txt_resposta"><?php print mb_strtoupper($ln_coautor2['name']);?></td>
                      </tr>
                      <?php
					  }
					  if($m_resumos['co_autor3']!=0){
					  ?>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Co-autor 3:</strong></td>
                        <td width="403" class="txt_resposta"><?php print mb_strtoupper($ln_coautor3['name']);?></td>
                      </tr>
                      <?php
					  }
					  ?>
                      <tr>
                        <td width="137" class="txt_topico_tabela"><strong>Resumo:</strong></td>
                        <td width="403" class="txt_resposta" style="word-wrap:break-word;"><?php print nl2br($m_resumos['resumo']);?></td>
                      </tr>                  
                      <tr>
                        <td class="txt_topico_tabela"><strong>Palavras-chave:</strong></td>
                        <td class="txt_resposta"><?php print $m_resumos['palavras_chave'];?></td>
                      </tr>
                    </table>
					<br />
         </div>
		 <?php
		 } // while
		/**************************************************
		* fim: Pôsteres Papers *
		**************************************************/
		?>
      </div>
    </div>
  </div>   

  		<div id="lado_direito">
        	<?php require_once("login_logout.php"); ?>
 			<br />
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
