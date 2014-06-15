<?php
	require_once("sessoes.php");
	require_once("../check_user.php");
	require_once("../admin/funcoes/special_ucwords.php");


	if ($_POST["atualizar"] == "true"){
	
		$name = special_ucwords($_POST['name']);
		$data_nascimento=trim($_POST['data_nascimento']);
		$titulacao_academica=trim($_POST['titulacao_academica']);
		$sigla_instituicao = trim($_POST["sigla_instituicao"]);
		$tipo_documento = trim($_POST['tipo_documento']);
		$procura=array('.','-');
		$cpf= str_replace($procura,'',$_POST['cpf']);
		$cpf=trim(addslashes($cpf));
		$Passport=trim(addslashes($_POST['Passport']));
		$email = strtolower(addslashes( trim($_POST['email']) )); 
		$tipo_residencia = trim($_POST['tipo_residencia']);
		$endereco_res=trim(addslashes($_POST['endereco_res'])); 
		$bairro_res=trim(addslashes($_POST['bairro_res']));
		$cep_res=trim($_POST['cep_res']);
		$telefone_res=trim($_POST['telefone_res']);
		//$tipo_participante=trim($_POST['tipo_participante']);
		$modalidade_participacao=trim($_POST['modalidade_participacao']);
		$id_evento=(int)$_POST['id_evento'];

		/* País */
		$pais_res = $_POST["pais_res"];
		if($tipo_residencia == 1){
			$id_estado_res = (int) trim($_POST['id_estado_res']); 
			$id_cidade_res = (int) trim($_POST['id_cidade_res']);
			$estado_res = ''; 
			$cidade_res = '';
		}
		elseif($tipo_residencia == 2){
			$estado_res = trim($_POST['estado_res']); 
			$cidade_res = trim($_POST['cidade_res']);
			$id_estado_res = 0; 
			$id_cidade_res = 0;
		}
		else{
			$error[] = "Selecione o estado";
			$error[] = "Selecione a cidade";
		}


		// TRATA OS ERROS NOS FORMULÁRIOS		
		if ($name==""){$error[]="Infome seu nome completo"; }
		if ($data_nascimento==""){$error[]="Infome sua data de nascimento"; }
		if ($tipo_documento==""){$error[] = "Infome o seu tipo de documento";}
		if (($cpf=="") and ($Passport=="")){$error[]="Infome o CPF ou o passaporte se for estrangeiro"; }
		if ($sigla_instituicao==""){$error[]="Infome a instituição"; }
		if ($titulacao_academica==""){$error[]="Marque sua formação acadêmica"; }
		if ($email==""){
			$error[]="Infome um e-mail"; 
		}else if (!eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $email)) {
			$error[]="O e-mail informado não é válido"; 
		}
		if ($tipo_residencia==""){$error[] = "Infome o seu tipo de resid&ecirc;ncia";}
		if ($pais_res==""){$error[] = "Infome o seu pa&iacute;s";}
		if ($endereco_res==""){$error[]="Infome seu endereço completo"; }
		if ($bairro_res==""){$error[]="Informe o bairro"; }
		if ($modalidade_participacao==""){$error[]="Marque a modalidade de participação desejada"; }
		
		if(sizeof($error)==0){
			$sql_update = "UPDATE jos_users SET
						   id_estado_res = '$id_estado_res',
						   id_cidade_res = '$id_cidade_res',
						   estado_res = '$estado_res',
						   cidade_res = '$cidade_res',
						   tipo_documento = '$tipo_documento',
						   tipo_residencia = '$tipo_residencia',
						   titulacao_academica = '$titulacao_academica',
						   name ='$name',
						   data_nascimento = '$data_nascimento',
						   cpf = '$cpf',
						   Passport = '$Passport',
						   email = '$email',
						   endereco_res = '$endereco_res',
						   bairro_res = '$bairro_res',
						   cep_res = '$cep_res',
						   telefone_res = '$telefone_res',
						   sigla_instituicao = '$sigla_instituicao',
						   pais_res = '$pais_res'
						   WHERE id='".$_SESSION['id_joomla']."'";
			mysql_query($sql_update, $conexao);
			$registro_atualizado=mysql_affected_rows();
			
			$sql_update1 = "UPDATE ev_participante SET
						   id_evento = '$id_evento',
						   modalidade_participacao = '$modalidade_participacao'
						   WHERE id='".$_SESSION['id_participante']."'";
			mysql_query($sql_update1, $conexao);
			$registro_atualizado1=mysql_affected_rows();
		}
		
	}//fim form atualizar

	/*BUSCA TODOS OS ESTADOS NA TABELA*/
	$sql_estado = "SELECT cod_estados,nome FROM ev_estados";
	$qr_estados = mysql_query($sql_estado, $conexao) or die(mysql_error());

	/*BUSCA TODAS AS FORMAÇÕES ACADÊMICAS*/
	$sql_formacao = "SELECT * FROM ev_formacao_academica ORDER BY outro ASC, formacao ASC";
	$qr_formacao = mysql_query($sql_formacao, $conexao) or die(mysql_error());

	/*BUSCA TODOS OS TIPOS DE PARTICIPANTE - Modalidade de inscrição*/
	$sql_tipo_participante = "SELECT * FROM ev_tipo_participante WHERE online='sim' AND id_evento = ".$_SESSION["id_evento"]."";
	$qr_tipo_participante = mysql_query($sql_tipo_participante, $conexao) or die(mysql_error());
	
	$sql_participante = "SELECT us.*, ev.id_tipo_participante, ev.modalidade_participacao FROM ev_participante ev, jos_users us WHERE ev.id='".$_SESSION['id_participante']."' AND ev.id_associado_alab = us.id";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	$p['cpf'] = substr($p['cpf'], 0,3).'.'.substr($p['cpf'], 3,3).'.'.substr($p['cpf'], 6,3).'-'.substr($p['cpf'], 9,2);
	
	
	/* Essas varáveis podem ser setadas em dois momentos:
		- quando na primeira vez que a página for carregada (dados vindo do BD)
		- dados vindo já da atualização ($_POST["atualizar"] == "true")
		Então para exibir no form e evitar que o usuário tenha que preencher novamente, fiz o que segue. [Daniel]
	*/
	if(empty($tipo_residencia)) $tipo_residencia = $p["tipo_residencia"];
	if(empty($pais_res)) $pais_res = $p["pais_res"];
	if($tipo_residencia == 1){
		if(empty($id_estado_res)) $id_estado_res = $p["id_estado_res"];
		if(empty($id_cidade_res)) $id_cidade_res = $p["id_cidade_res"];

		// Pegar cidades do estado selecionado/escolhido anteriormente
		$sql_cidades = "SELECT cod_cidades, nome FROM ev_cidades WHERE estados_cod_estados = '".$id_estado_res."'";
		$qr_cidades  = mysql_query($sql_cidades, $conexao) or die(mysql_error());
	}
	elseif($tipo_residencia == 2){
		if(empty($estado_res)) $estado_res = $p["estado_res"];
		if(empty($cidade_res)) $cidade_res = $p["cidade_res"];
	}
	//RECUPERA NOME DO ESTADO
	$idestado=$p['id_estado_res'];
	$sql_estado_atual = "SELECT cod_estados,nome FROM ev_estados WHERE cod_estados='$idestado'";
	$qr_estados_atual = mysql_query($sql_estado_atual, $conexao) or die(mysql_error());
	$ln_estado_atual = mysql_fetch_assoc($qr_estados_atual);
	$nome_estado_atual=$ln_estado_atual['nome'];
		
	//RECUPERA NOME DA CIDADE
	$idcidade=$p['id_cidade_res'];
	$sql_cidade_atual = "SELECT nome FROM ev_cidades WHERE cod_cidades='$idcidade'";
	$cidades_atual = mysql_query($sql_cidade_atual, $conexao) or die(mysql_error());
	$mostrar_cidade_atual= mysql_fetch_array($cidades_atual);
	$nome_cidade_atual = $mostrar_cidade_atual['nome'];
	
	
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
     $(document).ready(function(){
		 
			$('#data_nascimento').mask('99/99/9999');
			$('#cpf').mask('999.999.999-99');

			if($("#escolha1").is(":checked")){
				$('#passaporte_v').hide();
				$('#passaporte_blank').hide();
				$('#passaporte_txt').hide();
				$('#cpf_v').show();
				$('#cpf_blank').show();
		
			}
			else if($("#escolha2").is(":checked")){
				$('#passaporte_v').show();
				$('#passaporte_blank').show();
				$('#passaporte_txt').show();
				$('#cpf_v').hide();
				$('#cpf_blank').hide();
			}
			else{
				$('#passaporte_v').hide();
				$('#passaporte_blank').hide();
				$('#passaporte_txt').hide();
				$('#cpf_v').hide();
				$('#cpf_blank').hide();
			}
			
			$('#escolha1').click(function(){
				$('#passaporte_v').hide();
				$('#passaporte_blank').hide();
				$('#passaporte_txt').hide();
				$('#cpf_v').show();
				$('#cpf_blank').show();
			});
			$('#escolha2').click(function(){
				$('#passaporte_v').show();
				$('#passaporte_blank').show();
				$('#passaporte_txt').show();
				$('#cpf_v').hide();
				$('#cpf_blank').hide();
			});	
////////////////////////////////////////////////////////////////
			if($("#escolha3").is(":checked")){
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').show();
				$('#cidade_nacional').show();
				$('#estado_nacional1').show();
				$('#estado_outro1').hide();
				$('#botao').show();
		
			}
			else if($("#escolha4").is(":checked")){
				$('#estado_outro').show();
				$('#cidade_outro').show();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
				$('#estado_nacional1').hide();
				$('#estado_outro1').show();
				$('#botao').show();
			}
			else{
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
				$('#estado_nacional1').hide();
				$('#estado_outro1').hide();
				$('#botao').hide();
			}
			
			$('#escolha3').click(function(){
				$('#estado_outro').hide();
				$('#cidade_outro').hide();
				$('#estado_nacional').show();
				$('#cidade_nacional').show();
				$('#estado_nacional1').show();
				$('#estado_outro1').hide();
				$('#botao').show();
			});
			$('#escolha4').click(function(){
				$('#estado_outro').show();
				$('#cidade_outro').show();
				$('#estado_nacional').hide();
				$('#cidade_nacional').hide();
				$('#estado_nacional1').hide();
				$('#estado_outro1').show();
				$('#botao').show();
			});	
		
			$("#boxes").show();
			var maskHeight = $(document).height();
            var maskWidth = $(window).width();

            $('#mask').css({'width':maskWidth,'height':maskHeight,'z-index':99,'position':'absolute','display':'block','background-color':'#CCC','opacity':0.8});
			$('#mask').fadeIn(1000);        
			$('#mask').fadeTo("slow",0.8);
			
			var winH = '40%';
			var winW = '40%';
			
		  
		  	$("#boxes").css({'top':winH,'left':winW,'position':'absolute','z-index':999,'background-color':'#FFF','display':'block'});
	
			$("#boxes").show(2000);
				
			$(function(){
				var idCidade = $('#cidade_id_res').val();
				$('#id_estado_res').change(function(){
					if( $(this).val() ) {
						$('#id_cidade_res').hide();
						$('.carregando').show();
						$.getJSON('../../administrator/components/com_users/views/user/tmpl/cidades.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
							 var option = new Array();
							for (var i = 0; i < j.length; i++) {
								
								option[i] = document.createElement('option');//criando o option
											$( option[i] ).attr( {value : j[i].cod_cidades, selected : ( idCidade == j[i].cod_cidades ) ? true : false } );//colocando o value no option
											$( option[i] ).append( j[i].nome );//colocando o 'label'
											
							}	
							$('#id_cidade_res').html(option).show();
							$('.carregando').hide();
						});
					} else {
						$('#id_cidade_res').html('<option value="">-- Escolha um estado --</option>');
					}
				});
			});
		});	
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
       <div id="box_trabalhos"><span class="txt_titulo_destaque">Dados do Participante</span>
       <?php
	   //SE EXISTIR ALGUM ERRO NO FORMULÁRIO EXIBE UM QUADRO COM OS ERROS.
	   if(sizeof($error)!= 0){ 
		   print "<p>&nbsp;</p><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <br />";
		}
		else if (($_POST["atualizar"] == "true") and (sizeof($error)== 0)){
		 /*
		   print "<p>&nbsp;</p><div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	 	   print "Seu cadastro foi atualizado com sucesso.<br />";
		   print "</div> <br />";
		 */
		 ?>
		<script>
		 alert("Seu cadastro foi atualizado com sucesso.");
		 window.top.location.href='principal.php';
		 </script>
  	  <?php
        }	
	  ?>
       <p>&nbsp;</p>
       <form id="form1" name="form1" method="post" action="participante.php">
         <table width="600" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="138" class="txt_topico_tabela"><strong>Nome completo</strong><span class="dados_obrigatorios">*</span> </td>
             <td width="462"><input name="name" type="text" class="formulario" id="name" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $name; }else{ print $p['name'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela"> Os certificados  ser&atilde;o emitidos a partir dos dados apresentados </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Data de Nascimento</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="data_nascimento" type="text" class="formulario" id="data_nascimento" size="20" maxlength="10" value="<?php if(sizeof($error)!= 0){ print $data_nascimento; }else{ print $p['data_nascimento']; } ?>" /></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela">Digite no formato dd/mm/aaaa</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td><span class="txt_topico_tabela"><strong>Institui&ccedil;&atilde;o</strong><span class="dados_obrigatorios">*</span></span></td>
             <td><input name="sigla_instituicao" type="text" class="formulario" id="sigla_instituicao" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $sigla_instituicao; }else{ print $p['sigla_instituicao'];} ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Forma&ccedil;&atilde;o Acad&ecirc;mica</strong><span class="dados_obrigatorios">*</span></td>
             <td>
             <span class="txt_resposta">
             <?php while($ln_formacao = mysql_fetch_assoc($qr_formacao)){?>
             <input type="radio" name="titulacao_academica" id="titulacao_academica" value="<?php print $ln_formacao['formacao']; ?>" <?php if(sizeof($error)!= 0){ if($titulacao_academica==$ln_formacao['formacao']){ print "checked"; }}else if($p['titulacao_academica']==$ln_formacao['formacao']){ print "checked"; } ?>  /> <?php print htmlentities($ln_formacao['formacao']); ?><br />
             <?php }?>
			  </span>              </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
            <tr>
                <td class="txt_topico_tabela"><strong>Tipo de documento</strong><span class="dados_obrigatorios">*</span></td>
                <td>
                    <input type="radio" name="tipo_documento" id="escolha1" value="1" <?php echo ($p["tipo_documento"]==1) ? "checked='checked'" : "" ; ?> />&nbsp;<span class="txt_resposta">CPF</span>&nbsp;&nbsp;
                    <input type="radio" name="tipo_documento" id="escolha2" value="2" style="margin-left:10px;" <?php echo ($p["tipo_documento"]==2) ? "checked='checked'" : "" ; ?> />&nbsp;<span class="txt_resposta">Passport</span>&nbsp;&nbsp;
                </td>
            </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr id="cpf_v">
             <td class="txt_topico_tabela"><strong>CPF</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="cpf" type="text" class="formulario" id="cpf" size="30" maxlength="14" value="<?php if(sizeof($error)!= 0){ print $cpf; }else{ print $p['cpf'];} ?>" /></td>
           </tr>
           <tr id="cpf_blank">
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr id="passaporte_v">
             <td class="txt_topico_tabela"><strong>Passaporte</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="Passport" type="text" class="formulario" id="Passport" size="30" maxlength="25" value="<?php if(sizeof($error)!= 0){ print $Passport; }else{ print $p['Passport'];} ?>" /></td>
           </tr>
           <tr id="passaporte_txt">
             <td colspan="2"><span class="txt_desc_tabela">Informe o n&uacute;mero do passaporte caso seja estrangeiro e n&atilde;o tenha CPF</span></td>
            </tr>
           <tr id="passaporte_blank">
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>E-mail</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="email" type="text" class="formulario" id="email" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $email; }else{ print $p['email'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela">Imforme um e-mail v&aacute;lido (ser&aacute; usado para entrar na &aacute;rea do participante)</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Endere&ccedil;o</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="endereco_res" type="text" class="formulario" id="endereco_res" size="60" maxlength="100" value="<?php if(sizeof($error)!= 0){ print $endereco_res; }else{ print $p['endereco_res'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela">Rua, n&uacute;mero, complemento</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Bairro</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="bairro_res" type="text" class="formulario" id="bairro_res" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $bairro_res; }else{ print $p['bairro_res'];} ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
            <tr>
                <td class="txt_topico_tabela"><strong>Tipo de Residência</strong><span class="dados_obrigatorios">*</span></td>
                <td>
                    <input type="radio" name="tipo_residencia" id="escolha3" value="1" <?php echo ($p["tipo_residencia"]==1) ? "checked='checked'" : "" ; ?> />&nbsp;<span class="txt_resposta">Brasil</span>&nbsp;&nbsp;
                    <input type="radio" name="tipo_residencia" id="escolha4" value="2" style="margin-left:10px;" <?php echo ($p["tipo_residencia"]==2) ? "checked='checked'" : "" ; ?> />&nbsp;<span class="txt_resposta">Outro país</span>
                </td>
            </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Pa&iacute;s<span class="dados_obrigatorios">*</span></strong></td>
                <td><input type="text" name="pais_res" value="<?php echo $p["pais_res"]; ?>"  class="formulario"  style="width:240px;" />      </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
            <tr id="estado_nacional">
                <td class="txt_topico_tabela" ><strong>Estado<span class="dados_obrigatorios">*</span></strong></td>
                <td>
                <select name="id_estado_res" id="id_estado_res" class="formulario">
                    <option value="0">- Selecione o estado -</option>
                    <?php while($ln_estado = mysql_fetch_array($qr_estados)){ ?>
                        <option  value="<?php print $ln_estado['cod_estados'];?>" <?php print ($ln_estado['cod_estados'] == $id_estado_res) ? "selected=\"selected\"" : "" ; ?>><?php print htmlentities($ln_estado['nome']);?></option>
                    <?php }//while ?>
                </select>
                </td>
            </tr>
           <tr id="estado_nacional1">
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
            <tr id="cidade_nacional">
                <td class="txt_topico_tabela" ><strong>Cidade<span class="dados_obrigatorios">*</span></strong></td>
                <td>
                <input type="hidden" name="cidade_id_res" id="cidade_id_res" value="<?php echo $p["id_cidade_res"];?>" />
                <select name="id_cidade_res"  id="id_cidade_res" class="formulario">
                	<option value="0">- Selecione o estado primeiro -</option>
                        <?php while($ln_cidade = mysql_fetch_array($qr_cidades)){ ?>
                            <option  value="<?php print $ln_cidade['cod_cidades'];?>" <?php print ($ln_cidade['cod_cidades'] == $id_cidade_res) ? "selected=\"selected\"" : "" ; ?>><?php print htmlentities($ln_cidade['nome']);?></option>
                        <?php }//while ?>
                </select>
                </td>
            </tr>
            <tr id="estado_outro">
                <td class="txt_topico_tabela" ><strong>Estado<span class="dados_obrigatorios">*</span></strong></td>
                <td><input type="text" name="estado_res" value="<?php echo $participante["estado_res"]; ?>"  class="formulario"  style="width:240px;" /></td>
            </tr>
           <tr id="estado_outro1">
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
            <tr id="cidade_outro">
                <td class="txt_topico_tabela" ><strong>Cidade<span class="dados_obrigatorios">*</span></strong></td>
                <td><input type="text" name="cidade_res" value="<?php echo $participante["cidade_res"]; ?>"  class="formulario"  style="width:240px;" /></td>
            </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>CEP</strong></td>
             <td><input name="cep_res" type="text" class="formulario" id="cep_res" size="20" maxlength="9" value="<?php if(sizeof($error)!= 0){ print $cep_res; }else{ print $p['cep_res'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela">Digite apenas n&uacute;meros (sem tra&ccedil;o)</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Telefone</strong></td>
             <td><input name="telefone_res" type="text" class="formulario" id="telefone_res" size="20" value="<?php if(sizeof($error)!= 0){ print $telefone_res; }else{ print $p['telefone_res'];} ?>" /></td>
           </tr>
<!--           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Modalidade de inscri&ccedil;&atilde;o</strong><span class="dados_obrigatorios">*</span></td>
             <td><span class="txt_resposta">
               <?php 
			   while($ln_tipo_participante = mysql_fetch_assoc($qr_tipo_participante)){?>
               <input type="radio" name="tipo_participante" id="tipo_participante" value="<?php print $ln_tipo_participante['id']; ?>" <?php 
			   	if($p['id_tipo_participante']==$ln_tipo_participante['id']){ print "checked=\"checked\""; } 
				?> disabled="disabled" />
               <?php print $ln_tipo_participante['nome']; ?><br />
               <?php 
			   }//while 
			   ?>
             </span> </td>
           </tr>
-->           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td><span class="txt_topico_tabela"><strong>Modalidade de participa&ccedil;&atilde;o</strong><span class="dados_obrigatorios">*</span></span></td>
             <td><span class="txt_resposta">
               <input type="radio" name="modalidade_participacao" id="modalidade_participacao" value="1" <?php if(sizeof($error)!= 0){ if($modalidade_participacao==1){ print "checked"; }}else if($p['modalidade_participacao']==1){ print "checked"; }?> />
               Com apresenta&ccedil;&atilde;o de trabalho<br />
               <input type="radio" name="modalidade_participacao" id="modalidade_participacao" value="0" <?php if(sizeof($error)!= 0){ if($modalidade_participacao==0){ print "checked"; }}else if($p['modalidade_participacao']==0){ print "checked"; }?> />
               Sem apresenta&ccedil;&atilde;o de trabalho </span></td>
           </tr>
           
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
<!--           <tr>
             <td colspan="2" class="txt_topico_tabela"><strong>J&aacute; &eacute; associado da ALAB?</strong><span class="dados_obrigatorios">*</span> <span class="txt_artigo">(<a href="http://www.alab.org.br/component/user/register" target="_blank">www.alab.org.br</a>)</span></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela">A participa&ccedil;&atilde;o com apresenta&ccedil;&atilde;o de trabalho no IX CBLA &eacute; restrita a associados   da ALAB.</td>
           </tr>
           <tr>
             <td colspan="2">
               <input type="radio" name="associado_alab" id="associado_alab" value="1" <?php if(sizeof($error)!= 0){ if($associado_alab==1){ print "checked"; }}else if($p['id_associado_alab']!=0){ print "checked"; }?> />
               <span class="txt_resposta">Sim</span>             
               <input type="radio" name="associado_alab" id="associado_alab" value="0" <?php if(sizeof($error)!= 0){ if($associado_alab==0){ print "checked"; }}else if($p['id_associado_alab']==0){ print "checked"; }?> />
               <span class="txt_resposta">N&atilde;o</span></td>
           </tr>
           <tr>
             <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
             <td colspan="2" class="txt_topico_tabela"><strong>Se j&aacute; &eacute; s&oacute; s&oacute;cio da ALAB, informe o username e senha abaixo</strong></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_topico_tabela">&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela">Username</td>
             <td><input name="username_alab" type="text" class="formulario" id="username_alab" size="30" value="<?php if(sizeof($error)!= 0){ print $username_alab; }else{ print $pega_user['username'];} ?>" /></td>
           </tr>
           <tr>
             <td class="txt_topico_tabela">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela">Senha</td>
             <td><input name="senha_alab" type="password" class="formulario" id="senha_alab" size="30" value="<?php if(sizeof($error)!= 0){ print $senha_alab; } ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
-->           <tr>
             <td><input type="submit" name="button" id="button" value="Confirmar" class="botao" /></td>
             <td><input name="atualizar" type="hidden" id="insert" value="true">
             <input name="id_evento" type="hidden" id="id_evento" value="<?php print $_SESSION['id_evento'];?>"></td>
           </tr>
         </table>
       </form>
        
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
<? //print $_SESSION['id_evento'];?>
</body>
</html>
