<?php
	require_once("sessoes.php");
	require_once("../check_user.php");
	require_once("../admin/funcoes/special_ucwords.php");

	$id_trabalho=(int)$_POST['id_trabalho'];
		$_SESSION['id_trabalho']=$id_trabalho;
	
	$sql_participante = "SELECT name FROM jos_users WHERE id='".$_SESSION['id_joomla']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	
	$sql_trabalhos = "SELECT id, nome, descricao
					  FROM ev_tipo_trabalho 
					  WHERE id = '".$_SESSION['id_trabalho']."'";
	$qr_trabalho = mysql_query($sql_trabalhos, $conexao) or die(mysql_error());	
	$mostrar=mysql_fetch_array($qr_trabalho);
	
	//linhas temáticas para comunicação coordenada, individual e poster
	$sql_temas = "SELECT t.id, t.titulo
				  FROM ev_linha_tematica t
				  WHERE t.id_evento = '".$_SESSION['id_evento']."'";
	$qr_tema= mysql_query($sql_temas, $conexao) or die(mysql_error());
	
				
	function envia_email_ja_cadastrado($email_para_quem, $nome_para_quem, $de_quem){
				
				$id_evento_cript=base64_encode($_SESSION['id_evento']);
				
				$quemenvia="ALAB";
				$email_alab = "alab@alab.org.br";
				$assunto = "Convite para participar de evento - ALAB";
				
				$corpoemail = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
								<html>
									<head><title>ALAB</title></head>
									<body>
									<div style="height: 100%; font-family:Arial; width: 100%;left: auto; top: auto;right: auto;bottom: auto;position: static;">
									<br />
									<table width="500" cellpadding="0" cellspacing="0" style="margin-left:50px;">
										 <tr>
											<td>&nbsp;</td>
										 </tr>
										 <tr>
											<td align=\"left\">Olá '.$nome_para_quem.',<br /><br />
											'.$de_quem.' lhe convidou a fazer parte de um grupo de trabalho.<br /><br /></td>
										 </tr>
										 <tr>
											<td>&nbsp;</td>
										 </tr>
										 <tr>
											<td><a href="http://www.alab.org.br/eventosalab/cbla/index.php?acao=logout&id='.$id_evento_cript.'">http://www.alab.org.br/eventosalab</a></td>
										 </tr>													 										 
										 <tr>
											<td>&nbsp;</td>
										 </tr>
									</table>
								</div>	
								</body>
								</html>		
								';		
				$headers = "From: ".$quemenvia."  <".$email_alab.">\n";
				$headers .= "MIME-Version: 1.1\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
				$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
				mail($email_para_quem, $assunto, $corpoemail, $headers);
		}
		
	function envia_email_recebimento($params_email_recebimento){
		$conexao = $params_email_recebimento["conexao"];
		
		/* Dados evento */
		$sql = "SELECT titulo, periodo, local FROM ev_evento WHERE id=".$params_email_recebimento["id_evento"];
		$result = mysql_query($sql, $conexao);
		$row    = mysql_fetch_array($result);
		$nome_evento  = $row[0];
		$periodo_evento   = $row[1];
		$local_evento = $row[2];
		
		/* Tipo trabalho */
		$sql = "SELECT nome FROM ev_tipo_trabalho WHERE id=".$params_email_recebimento["id_tipo_trab"];
		$result = mysql_query($sql, $conexao);
		$row    = mysql_fetch_array($result);
		$tipo_trabalho = $row[0];
	
		/* Autor */
		$sql = "SELECT email FROM ev_participante WHERE id=".$params_email_recebimento["id_participante"];
		$result = mysql_query($sql, $conexao);
		$row    = mysql_fetch_array($result);
		$email_autor = $row[0];
	
		/* Configurando mail */
		$quemenvia="ALAB";
		$email_alab = "alab@alab.org.br";
		$assunto = "Confirmação de recebimento de proposta de apresentação de trabalho";
				
		$corpoemail = "Confirmamos o recebimento da sua proposta de <b>".$tipo_trabalho."</b> intitulada <b>".$params_email_recebimento["titulo_trab"]."</b> para apresentação no <b>".$nome_evento."</b>, a ser realizado no período de ".$periodo_evento." no local: ".$local_evento.".";
		// Frase original (email do dia 04-11-2010): "Confirmamos o recebimento da sua proposta de (comunicação coordenada/comunicação individual/pÿster) intitulada (nome da proposta inserido pelo participante) para apresentação no IX Congresso Brasileiro de Linguística Aplicada, a ser realizado no perído de 25 a 28 de julho de 2011 na Universidade Federal do Rio de Janeiro"
		
		$headers = "From: ".$quemenvia." <".$email_alab.">\n";
		$headers .= "MIME-Version: 1.1\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
		$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
		
		mail($email_autor, $assunto, $corpoemail, $headers);
	}
	
	if ($_POST["insert"] == "true"){
		$id_evento=(int)$_SESSION['id_evento'];
		$id_participante=(int)$_SESSION["id_participante"];
		$id_trabalho=(int)$_POST['id_trabalho'];
		$id_topico=(int)$_POST['id_topico'];
		$id_coautor=(int)$_POST['id_coautor'];
		$id_coautor2=(int)$_POST['id_coautor2'];
		$id_coautor3=(int)$_POST['id_coautor3'];	
		$tipo_poster=(int)$_POST['tipo_poster'];	
		$titulo = special_ucwords($_POST['titulo']);
		//atributos únicos de individual e poster
		$linha_tematica=$_POST['linha_tematica'];
		$autor=addslashes(trim($_POST['autor']));
		
		$insert = "";
		$value	= "";
		
		if($id_trabalho==4){ 
			$insert .= ", tipo_poster";
			$value	.= ", '$tipo_poster'";
		}
		if(!empty($_POST['id_coautor'])){
			$id_coautor=addslashes($_POST['id_coautor']);
			$cpf_passport_coautor = strtolower(addslashes( trim($_POST['cpf_passport_coautor']) ));
			$insert .= ", co_autor";
			$value 	.= ",'$id_coautor'";
		}
		if(!empty($_POST['id_coautor2'])){
			$id_coautor2=addslashes($_POST['id_coautor2']);
			$cpf_passport_coautor2 = strtolower(addslashes( trim($_POST['cpf_passport_coautor2']) ));
			$insert .= ", co_autor2";
			$value 	.= ",'$id_coautor2'";
		}
		if(!empty($_POST['id_coautor3'])){
			$id_coautor3=addslashes($_POST['id_coautor3']);
			$cpf_passport_coautor3 = strtolower(addslashes( trim($_POST['cpf_passport_coautor3']) ));
			$insert .= ", co_autor3";
			$value 	.= ",'$id_coautor3'";
		}
		
		$resumo=addslashes(trim($_POST['resumo']));
		$palavras=addslashes(trim($_POST['palavras']));
		$cont_resumo = (int)strlen($resumo);

		if (($id_trabalho==4)||($id_trabalho==5)){
			// TRATA OS ERROS NOS FORMULÁRIOS	
			if ($id_trabalho==4){ if($tipo_poster==""){$error[]="Informe a modalidade";}}
			if ($titulo==""){$error[]="Informe o título"; }
			if ($autor==""){$error[]="Informe o autor"; }
			if ($resumo==""){$error[]="Digite o resumo"; }
			elseif(($cont_resumo < 1000)){$error[]="O resumo deve conter no mínimo 1000 caracteres"; }
			elseif(($cont_resumo > 2000)){$error[]="O resumo deve conter no máximo 2000 caracteres"; }			
			if ($palavras==""){$error[]="Informe as palavras-chave"; }			
			if (($linha_tematica=="") or ($linha_tematica==0)){$error[]="Selecione a linha temática"; }
			
			if(sizeof($error)==0){
				$id_coautor=0;
				$id_coautor2=0;
				$id_coautor3=0;
				if ($cpf_passport_coautor!="") {
					$sql_email = "SELECT ev.id, us.email, us.name FROM ev_participante ev, jos_users us WHERE (us.cpf='$cpf_passport_coautor' OR us.Passport='$cpf_passport_coautor') AND id_evento='$id_evento'";
					$resultado_email = mysql_query($sql_email);
					$email_ja_cadastrado=mysql_num_rows($resultado_email);
					$ln=mysql_fetch_array($resultado_email);
					$id_coautor=$ln['id'];
					$nome_participante=$p['name'];
					$coautor=$ln['name'];
				
					if ($id_coautor!=$id_participante){
						if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no poster
							//function
							//envia_email_ja_cadastrado($email_coautor, $coautor, $nome_participante);
						}// if email ja cadastrado
					}
				 }//if coautor diferente de vazio
				 
				if ($cpf_passport_coautor2!="") {
					$sql_email = "SELECT ev.id, us.email, us.name FROM ev_participante ev, jos_users us WHERE (us.cpf='$cpf_passport_coautor2' OR us.Passport='$cpf_passport_coautor2') AND id_evento='$id_evento'";
					$resultado_email = mysql_query($sql_email);
					$email_ja_cadastrado=mysql_num_rows($resultado_email);
					$ln=mysql_fetch_array($resultado_email);
					$id_coautor2=$ln['id'];
					$nome_participante=$p['name'];
					$coautor=$ln['name'];
				
					if ($id_coautor2!=$id_participante){
						if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no poster
							//function
							//envia_email_ja_cadastrado($email_coautor, $coautor, $nome_participante);
						}// if email ja cadastrado
					}
				 }//if coautor diferente de vazio
				 
				if ($cpf_passport_coautor3!="") {
					$sql_email = "SELECT ev.id, us.email, us.name FROM ev_participante ev, jos_users us WHERE (us.cpf='$cpf_passport_coautor2' OR us.Passport='$cpf_passport_coautor2') AND id_evento='$id_evento'";
					$resultado_email = mysql_query($sql_email);
					$email_ja_cadastrado=mysql_num_rows($resultado_email);
					$ln=mysql_fetch_array($resultado_email);
					$id_coautor2=$ln['id'];
					$nome_participante=$p['name'];
					$coautor=$ln['name'];
				
					if ($id_coautor2!=$id_participante){
						if ($email_ja_cadastrado>0){//manda e-mail informando que a pessoa foi inserido no poster
							//function
							//envia_email_ja_cadastrado($email_coautor, $coautor, $nome_participante);
						}// if email ja cadastrado
					}
				 }//if coautor diferente de vazio
				$sql_insert = "INSERT INTO ev_resumo (id_evento, id_linha_tematica, id_tipo_trabalho, titulo, resumo, palavras_chave, autor $insert) VALUES ('$id_evento', '$linha_tematica',	'$id_trabalho',	'$titulo', '$resumo', '$palavras', '$id_participante' $value);";	
				mysql_query($sql_insert, $conexao) or die (mysql_error());
				$registro_inserido=mysql_affected_rows();

				// Enviar email de confirmação de recebimento de proposta de trabalho
				if($registro_inserido){
					$params_email_recebimento = array(
						"id_evento"    => $id_evento,
						"id_tipo_trab" => $id_trabalho,
						"titulo_trab"  => $titulo,
						"id_participante" => $id_participante,
						"conexao"      => $conexao
					);
					envia_email_recebimento($params_email_recebimento);
				}//if
			}
		} // fim id trabalho 4 e 5
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">

$(document).ready(function() { 

	if($("#cpf_passport_coautor2").val()){
		$("#k").val(1);
	}
	else if($("#cpf_passport_coautor3").val()){
		$("#k").val(2); 
		$("#add").hide();
	}
	else{ 
		$("#k").val(0);
	}
	
	$(".mostrar_coautor").hide();
	$(".mostrar_coautor2").hide();
	$(".mostrar_coautor3").hide();
	$(".ln2").hide();
	$(".ln3").hide();
	
	$(function(){
		var cpf_passport_coautor 	= $('#cpf_passport_coautor').val();
		var cpf_passport_coautor2 	= $('#cpf_passport_coautor2').val();
		var cpf_passport_coautor3 	= $('#cpf_passport_coautor3').val();
		
		$('#cpf_passport_coautor').bind("change",function(){
			if( $(this).val() ) {
				$.getJSON('coautor.php?search=',{cpf_passport_coautor: $('#cpf_passport_coautor').val(),nome_autor:$("#autor").val(), ajax: 'true'}, function(j){
					var option = new Array();
					for (var i = 0; i < j.length; i++) {
						if(j[i].resposta_coautores){
							if((j[i].id != $("#id_coautores2").val())&&(j[i].id != $("#id_coautores3").val())){
								$(".mostrar_coautor").show();
								$('#nome_coautor').html(j[i].name).show();
								$('#email_coautor').html(j[i].email).show();
								$('#id_coautor').html('<input type="hidden" name="id_coautor" id="id_coautores" value="'+j[i].id+'" />').show();
							}
							else{
								$("#cpf_passport_coautor").val('');
								$('#id_coautores').val('');
								alert('Impossivel inserir duas vezes o mesmo co-autor.');
							}
						}
						else{
							$('#cpf_passport_coautor').val('');
							$('#id_coautores').val('');
							$(".mostrar_coautor").hide();
							$('#cpf_passport_coautor').val('');
							alert(j[i].error);
						}
					}
				});
			}
			else{
				$('#cpf_passport_coautor').val('');
				$('#id_coautores').val('');
				$(".mostrar_coautor").hide();
			}
		});
		$('#cpf_passport_coautor2').bind("change",function(){
			if( $(this).val() ) {
				$.getJSON('coautor.php?search=',{cpf_passport_coautor: $('#cpf_passport_coautor2').val(),nome_autor:$("#autor").val(), ajax: 'true'}, function(j){
					var option = new Array();
					for (var i = 0; i < j.length; i++) {
						if(j[i].resposta_coautores){
							if((j[i].id != $("#id_coautores").val())&&(j[i].id != $("#id_coautores3").val())){
								$(".mostrar_coautor2").show();
								$('#nome_coautor2').html(j[i].name).show();
								$('#email_coautor2').html(j[i].email).show();
								$('#id_coautor2').html('<input type="hidden" name="id_coautor2" id="id_coautores2" value="'+j[i].id+'" />').show();
							}
							else{
								$("#cpf_passport_coautor2").val('');
								$('#id_coautores2').val('');
								alert('Impossivel inserir duas vezes o mesmo co-autor.');
							}
						}
						else{
							$('#cpf_passport_coautor2').val('');
							$('#id_coautores2').val('');
							$(".mostrar_coautor2").hide();
							$('#cpf_passport_coautor2').val('');
							alert(j[i].error);
						}
					}	
				});
			}
			else{
				$('#cpf_passport_coautor2').val('');
				$('#id_coautores2').val('');
				$(".mostrar_coautor2").hide();
			}
		});
		$('#cpf_passport_coautor3').bind("change",function(){
			if( $(this).val() ) {
				$.getJSON('coautor.php?search=',{cpf_passport_coautor: $('#cpf_passport_coautor3').val(),nome_autor:$("#autor").val(), ajax: 'true'}, function(j){
					var option = new Array();
					for (var i = 0; i < j.length; i++) {
						if(j[i].resposta_coautores){
							if((j[i].id != $("#id_coautores").val())&&(j[i].id != $("#id_coautores2").val())){
								$(".mostrar_coautor3").show();
								$('#nome_coautor3').html(j[i].name).show();
								$('#email_coautor3').html(j[i].email).show();
								$('#id_coautor3').html('<input type="hidden" name="id_coautor3" id="id_coautores3" value="'+j[i].id+'" />').show();
							}
							else{
								$("#cpf_passport_coautor3").val('');
								$('#id_coautores3').val('');
								alert('Impossivel inserir duas vezes o mesmo co-autor.');
							}
						}
						else{
							$('#cpf_passport_coautor3').val('');
							$('#id_coautores3').val('');
							$(".mostrar_coautor3").hide();
							$('#cpf_passport_coautor3').val('');
							alert(j[i].error);
						}
					}	
				});
			}
			else{
				$('#cpf_passport_coautor3').val('');
				$('#id_coautores3').val('');
				$(".mostrar_coautor3").hide();
			}
		});
	});
	
	if($("#cpf_passport_coautor").val()){
		$("#cpf_passport_coautor").trigger("change"); 
		$(".mostrar_coautor").show();
	}
	if($("#cpf_passport_coautor2").val()){
		$("#cpf_passport_coautor2").trigger("change"); 
		$(".mostrar_coautor2").show(); 
		$(".ln2").show();
	}
	if($("#cpf_passport_coautor3").val()){
		$("#cpf_passport_coautor3").trigger("change"); 
		$(".mostrar_coautor3").show(); 
		$(".ln3").show();
	}
	
});

function add(){
	if($('#k').val() == 0){
		$(".ln2").show();
		$('#k').val(1);
	}
	else if($('#k').val() == 1){
		$(".ln3").show();
		$("#k").val(2);
		$("#add").hide();
	}
		
}

function remove(e){
	$("."+$(e).parents("tr").attr("class")+"").hide();
	$("."+$(e).attr("title")+"").hide();
	$("#add").show();
	$("#k").val($("#k").val()-1);

	if($(e).attr("title") == 'mostrar_coautor2'){
		$("#cpf_passport_coautor2").val('');
		$("#id_coautores2").val('');
	}
	if($(e).attr("title") == 'mostrar_coautor3'){
		$("#cpf_passport_coautor3").val('');
		$("#id_coautores3").val('');
	}

}

</script>	
<script language="javascript">
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
		<div id="box_trabalhos">
	    <p class="txt_categorias"><strong>Envio de trabalho</strong></p>
       <p class="txt_titulo_destaque"><?=$mostrar['nome']; ?></p>
       <p class="txt_titulo_noticias_2"><?=$mostrar['descricao']; ?></p>
       <p class="txt_titulo_noticias_2">Entre abaixo com os dados referentes ao seu trabalho.</p>
	   <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
		
		if (($_POST["insert"] == "true") and (sizeof($error)== 0)){
		  //print "<br /><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	  //print "Seu trabalho foi enviado com sucesso.<br />";
		  //print "</div> <br />";
		?>
		 <script>
		 alert("Seu trabalho foi enviado com sucesso.");
		 window.top.location.href='resumos.php';
		 </script>
         <?php
		}	
	  ?>
      <p>&nbsp;</p>
        <form id="form_trabalho" name="form_trabalho" method="post" action="trabalho.php" >
			 <?php include('formulario.php');?>
        </form>
       <p>&nbsp;</p>
       <p>&nbsp;</p>       
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
