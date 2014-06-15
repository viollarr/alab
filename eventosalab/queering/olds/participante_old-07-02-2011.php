<?php
	require_once("conexao.php");
	require_once("check_user.php");
	require_once("admin/funcoes/special_ucwords.php");

	
	if ($_POST["atualizar"] == "true"){
	
		$nome = special_ucwords($_POST['nome']);
		$datanascimento=trim($_POST['datanascimento']);
			$datanascimento_traco=implode("-", array_reverse(explode("/", "$datanascimento")));
		$formacao_academica=trim($_POST['formacao_academica']); 
		$cpf=addslashes($_POST['cpf']);
		$email = strtolower(addslashes( trim($_POST['email']) )); 
		$senha=trim($_POST['senha']); 
		$endereco=trim(addslashes($_POST['endereco'])); 
		$bairro=trim(addslashes($_POST['bairro']));
		$cep=trim($_POST['cep']);
		$telefone=trim($_POST['telefone']);
		$tipo_participante=trim($_POST['tipo_participante']);
		$modalidade_participacao=trim($_POST['modalidade_participacao']);
		$associado_alab=trim($_POST['associado_alab']);
		$username_alab=trim(addslashes($_POST['username_alab']));
		$senha_alab=trim($_POST['senha_alab']);
		$id_evento=(int)$_POST['id_evento'];

		/* País */
		$selecao_pais = $_POST["selecao_pais"];
		if(!empty($selecao_pais)){
			if($selecao_pais == "outro"){ 
				$pais   = addslashes( $_POST["outro_pais"] );
				if (empty($pais)){ $error[] = "Informe o seu pa&iacute;s"; }
			}elseif($selecao_pais == "brasil"){
				$pais   = "Brasil";
				$estado = (int) trim($_POST['estado']); 
				$cidade = (int) trim($_POST['cidade']);
				
				if (empty($estado)){ $error[] = "Selecione o estado"; }
				if (empty($cidade)){ $error[] = "Selecione a cidade"; }
			}//elseif
			else{ $error[] = "Nenhum pa&iacute;s foi preenchido"; }
		}else{ $error[] = "Infome o seu pa&iacute;s"; }


		// TRATA OS ERROS NOS FORMULÁRIOS		
		if ($nome==""){$error[]="Infome seu nome completo"; }
		if ($datanascimento==""){$error[]="Infome sua data de nascimento"; }
		if (($cpf=="") and ($passaporte=="")){$error[]="Infome o CPF ou o passaporte se for estrangeiro"; }
		if ($instituicao==""){$error[]="Infome a instituição"; }
		if ($formacao_academica==""){$error[]="Marque sua formação acadêmica"; }
		if ($email==""){
			$error[]="Infome um e-mail"; 
		}else if (!eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $email)) {
			$error[]="O e-mail informado não é válido"; 
		}
		if ($senha==""){$error[]="Infome uma senha para acesso deste evento"; }
		if ($endereco==""){$error[]="Infome seu endereço completo"; }
		if ($bairro==""){$error[]="Informe o bairro"; }
		/*
		if ($estado==""){$error[]="Selecione o estado"; }
		if ($cidade==""){$error[]="Selecione a cidade"; }
		*/
		//if ($cep==""){$error[]="Informe o CEP"; }
		if ($tipo_participante==""){$error[]="Marque a modalidade de inscrição desejada"; }
		if ($modalidade_participacao==""){$error[]="Marque a modalidade de participação desejada"; }
		//if (($modalidade_participacao==1) and ($associado_alab==0)){$error[]="Para a modalidade de envio de trabalho é preciso ser associado da ALAB"; }
		/*
		if ($modalidade_participacao==1){
			if($associado_alab==0){
				if(empty($passaporte)) $error[]="Para a modalidade de envio de trabalho: (a) caso seja brasileiro deve ser associado da ALAB; (b) caso não seja brasileiro, favor preencher o Passaporte.";
			}//if
		}//if
		*/
		if ($associado_alab==""){ $error[]="Marque se você é associado ALAB ou não"; }
		if ($associado_alab==1){
			if ($username_alab==""){$error[]="Infome o seu username de associado ALAB"; }
			if ($senha_alab==""){$error[]="Infome a sua senha de associado ALAB"; }			
		}
		if (($associado_alab==1) and ($username_alab!="") and ($senha_alab!="")){
			// Obter senha cifrada do usuário no joomla  
			$sql_user = "SELECT id,username,password FROM jos_users WHERE username='$username_alab' AND block=0";
			$resultado_user = mysql_query($sql_user);
			$pega_user = mysql_fetch_array($resultado_user);
			$senhaCripto = $pega_user['password'];
			$id_user_joomla=0;
			
			if($senhaCripto){
				$partes = explode( ':', $senhaCripto );
				$cripto = $partes[0];
				$sal = $partes[1];
				// Criar hash com a senha fornecida com o sal (se houver)
				$novoHash = ($sal) ? md5($senha_alab.$sal) : md5($senha_alab);

				if( $novoHash == $cripto ) { 
					//echo "Acesso autorizado";
					$id_user_joomla = $pega_user['id'];
				} else { 
					$error[]="A senha de associado ALAB informada não confere";
				}
			} else {
				$error[]="O username de associado ALAB informado não está cadastrado no site da ALAB";
			}
		}
		
		if(sizeof($error)==0){
			$sql_update = "UPDATE ev_participante SET
						   id_tipo_participante = '$tipo_participante',
						   id_evento = '$id_evento',
						   id_estado = '$estado',
						   id_cidade = '$cidade',
						   id_formacao = '$formacao_academica',
						   nome ='$nome',
						   datanascimento = '$datanascimento_traco',
						   cpf = '$cpf',
						   passaporte = '$passaporte',
						   email = '$email',
						   senha = '$senha',
						   endereco = '$endereco',
						   bairro = '$bairro',
						   cep = '$cep',
						   telefone = '$telefone',
						   modalidade_participacao = '$modalidade_participacao', 
						   id_associado_alab = '$id_user_joomla',						   
						   instituicao = '$instituicao',
						   pais = '$pais',
						   presenca = 'nao'
						   WHERE id='".$_SESSION['id_participante']."'";
			mysql_query($sql_update, $conexao);
			$registro_atualizado=mysql_affected_rows();
		}
		
		/*
		//BUSCA NOME DO ESTADO SELECIONADO PARA PREENCHER O CAMPO ESTADO QUANDO RETORNAR UM ERRO
		if ($estado) {
			$sql_estado_selecionado = "SELECT cod_estados,nome FROM ev_estados WHERE cod_estados='$estado'";
			$qr_estados_selecionado = mysql_query($sql_estado_selecionado, $conexao) or die(mysql_error());
			$ln_estado_selecionado = mysql_fetch_assoc($qr_estados_selecionado);
			$nome_estado=$ln_estado_selecionado['nome'];
		}
		
		//BUSCA NOME DA CIDADE SELECIONADA PARA PREENCHER O CAMPO CIDADE QUANDO RETORNAR UM ERRO
		if ($cidade) {
			$sql_cidade_selecionado = "SELECT nome FROM ev_cidades WHERE cod_cidades='$cidade'";
			$cidades_selecionado = mysql_query($sql_cidade_selecionado, $conexao) or die(mysql_error());
			$mostrar_cidade_selecionado= mysql_fetch_array($cidades_selecionado);
			$nome_cidade = $mostrar_cidade_selecionado['nome'];
		}
		*/

	
	}//fim form atualizar
	
	/*BUSCA TODOS OS ESTADOS NA TABELA*/
	$sql_estado = "SELECT cod_estados,nome FROM ev_estados";
	$qr_estados = mysql_query($sql_estado, $conexao) or die(mysql_error());

	/*BUSCA TODAS AS FORMAÇÕES ACADÊMICAS*/
	$sql_formacao = "SELECT * FROM ev_formacao_academica ORDER BY outro ASC, formacao ASC";
	$qr_formacao = mysql_query($sql_formacao, $conexao) or die(mysql_error());

	/*BUSCA TODOS OS TIPOS DE PARTICIPANTE - Modalidade de inscrição*/
	$sql_tipo_participante = "SELECT * FROM ev_tipo_participante WHERE online='sim'";
	$qr_tipo_participante = mysql_query($sql_tipo_participante, $conexao) or die(mysql_error());
	
	$sql_participante = "SELECT * FROM ev_participante WHERE id='".$_SESSION['id_participante']."'";
	$qr_participante = mysql_query($sql_participante, $conexao) or die(mysql_error());
	$p=mysql_fetch_assoc($qr_participante);
	
	
	/* Essas varáveis podem ser setadas em dois momentos:
		- quando na primeira vez que a página for carregada (dados vindo do BD)
		- dados vindo já da atualização ($_POST["atualizar"] == "true")
		Então para exibir no form e evitar que o usuário tenha que preencher novamente, fiz o que segue. [Daniel]
	*/
	if(empty($pais)) $pais = $p["pais"];
	if($pais == "Brasil"){
		if(empty($estado)) $estado = $p["id_estado"];
		if(empty($cidade)) $cidade = $p["id_cidade"];

		// Pegar cidades do estado selecionado/escolhido anteriormente
		$sql_cidades = "SELECT cod_cidades, nome FROM ev_cidades WHERE estados_cod_estados = '".$estado."'";
		$qr_cidades  = mysql_query($sql_cidades, $conexao) or die(mysql_error());
	}elseif(empty($pais)){ $pais = "Preencha com um país"; }

	//RECUPERA NOME DO ESTADO
	$idestado=$p['id_estado'];
	$sql_estado_atual = "SELECT cod_estados,nome FROM ev_estados WHERE cod_estados='$idestado'";
	$qr_estados_atual = mysql_query($sql_estado_atual, $conexao) or die(mysql_error());
	$ln_estado_atual = mysql_fetch_assoc($qr_estados_atual);
	$nome_estado_atual=$ln_estado_atual['nome'];
		
	//RECUPERA NOME DA CIDADE
	$idcidade=$p['id_cidade'];
	$sql_cidade_atual = "SELECT nome FROM ev_cidades WHERE cod_cidades='$idcidade'";
	$cidades_atual = mysql_query($sql_cidade_atual, $conexao) or die(mysql_error());
	$mostrar_cidade_atual= mysql_fetch_array($cidades_atual);
	$nome_cidade_atual = $mostrar_cidade_atual['nome'];
	
	//RECUPERA USERNAME ASSOCIADO ALAB
	if ($p['id_associado_alab']!=0){
		$sql_user = "SELECT id,username,password FROM jos_users WHERE id='".$p['id_associado_alab']."' AND block=0";
		$resultado_user = mysql_query($sql_user);
		$pega_user = mysql_fetch_array($resultado_user);
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

<script type="text/javascript">
     $(document).ready(function(){
         
         $("select[name=estado]").change(function(){
            $("select[name=cidade]").html('<option value="0">Carregando...</option>');
            
            $.post("cidades.php",
                  {estado:$(this).val()},
                  function(valor){
                     $("select[name=cidade]").html(valor);
                  }
            )
         })
      })
	  
	$(function() {
		$('#datanascimento').mask('99/99/9999');
		/*$('#cep').mask('99999-999');
		$('#cpf').mask('99999999999');
		$('#telefone').mask('(99) 9999-9999');*/
	});
</script>

<script type="text/javascript">
	function exibir_estados_cidades(){
        $("#estados_cidades").show();
		$("#outro_pais").hide();
	}//function

	function exibir_outro_pais(){
        $("#outro_pais").css("display", "inline");
		$("#estados_cidades").hide();
	}//function
</script>

</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner pequeno.jpg" width="990" height="215" />
        </div>

        <div style="margin-left:30px;">
        	<span class="menuinterno"><a href="principal.php">Envio de trabalho</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="participante.php">Editar Dados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resumos.php">Resumos enviados</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="boleto.php">Impressão de boleto</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="cartaaceite.php">CartA de aceite</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="certificadoparticipacao.php">Certificado de participação</a></span>
		</div>
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
             <td width="462"><input name="nome" type="text" class="formulario" id="nome" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $nome; }else{ print $p['nome'];} ?>" /></td>
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
             <td><input name="datanascimento" type="text" class="formulario" id="datanascimento" size="20" maxlength="10" value="<?php if(sizeof($error)!= 0){ print $datanascimento; }else{ print implode("/", array_reverse(explode("-", $p['datanascimento']))); } ?>" /></td>
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
             <td><input name="instituicao" type="text" class="formulario" id="instituicao" size="50" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $instituicao; }else{ print $p['instituicao'];} ?>" /></td>
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
             <input type="radio" name="formacao_academica" id="formacao_academica" value="<?php print $ln_formacao['id_formacao']; ?>" <?php if(sizeof($error)!= 0){ if($formacao_academica==$ln_formacao['id_formacao']){ print "checked"; }}else if($p['id_formacao']==$ln_formacao['id_formacao']){ print "checked"; } ?>  /> <?php print htmlentities($ln_formacao['formacao']); ?><br />
             <?php }?>
			  </span>              </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>CPF</strong></td>
             <td><input name="cpf" type="text" class="formulario" id="cpf" size="30" maxlength="11" value="<?php if(sizeof($error)!= 0){ print $cpf; }else{ print $p['cpf'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2" class="txt_desc_tabela">Digite apenas n&uacute;meros (sem ponto e tra&ccedil;o)</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Passaporte</strong></td>
             <td><input name="passaporte" type="text" class="formulario" id="passaporte" size="30" maxlength="25" value="<?php if(sizeof($error)!= 0){ print $passaporte; }else{ print $p['passaporte'];} ?>" /></td>
           </tr>
           <tr>
             <td colspan="2"><span class="txt_desc_tabela">Informe o n&uacute;mero do passaporte caso seja estrangeiro e n&atilde;o tenha CPF</span></td>
            </tr>
           <tr>
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
             <td class="txt_topico_tabela">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Senha</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="senha" type="password" class="formulario" id="senha" size="20" maxlength="30" value="<?php if(sizeof($error)!= 0){ print $senha; }else{ print $p['senha'];} ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Endere&ccedil;o</strong><span class="dados_obrigatorios">*</span></td>
             <td><input name="endereco" type="text" class="formulario" id="endereco" size="60" maxlength="100" value="<?php if(sizeof($error)!= 0){ print $endereco; }else{ print $p['endereco'];} ?>" /></td>
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
             <td><input name="bairro" type="text" class="formulario" id="bairro" size="40" maxlength="70" value="<?php if(sizeof($error)!= 0){ print $bairro; }else{ print $p['bairro'];} ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>Pa&iacute;s<span class="dados_obrigatorios">*</span></strong></td>
             <td>
             	<input type="radio" name="selecao_pais" id="selecao_pais" value="brasil" onclick="exibir_estados_cidades()" <?php print ($pais == "Brasil") ? "checked=\"checked\"" : "" ; ?> />&nbsp;<span class="txt_resposta">Brasil</span>
                &nbsp;&nbsp;
             	<input type="radio" name="selecao_pais" id="selecao_pais" value="outro" onclick="exibir_outro_pais()" <?php 
					if( (!empty($pais) && $pais != "Brasil") || ($selecao_pais == "outro") ) print "checked=\"checked\""; 
					?> />&nbsp;<span class="txt_resposta">Outro</span>
                &nbsp;
                <span id="outro_pais" style="display:<?php if( (!empty($pais) && $pais != "Brasil") || ($selecao_pais == "outro") ) print "inline"; ?>;">
                	<input type="text" name="outro_pais" class="formulario" style="width:240px;" value="<?php if( (!empty($pais) && $pais != "Brasil") ) print $pais; ?>" />
                </span>
             </td>
           </tr>
           <tr>
           	<td colspan="2">
            	<table border="0" cellpadding="0" cellspacing="0" id="estados_cidades" style="display:<?php if( (!empty($pais) && $pais != "Brasil") || ($selecao_pais == "outro") ) print "none"; ?>;">
                   <tr>
                     <td class="txt_topico_tabela" style="width:138px;">
                        <br />
                        <strong>Estado<span class="dados_obrigatorios">*</span></strong>
                     </td>
                     <td>
                        <label>
                        <br />
                           <select name="estado" class="formulario" id="estado">
                                <?php 
								/*
								if(sizeof($error)!= 0){ ?>
                                <option value="<?php if(sizeof($error)!= 0){ print $estado; } ?>"><?php if(sizeof($error)!= 0){ print htmlentities($nome_estado); } ?></option>
                                <?php } else{ ?>
                                <option value="0">- Selecione o estado -</option>
                                <?php }  while($ln_estado = mysql_fetch_assoc($qr_estados)){?>
                                <option  value="<?php print $ln_estado['cod_estados'];?>"><?php print htmlentities($ln_estado['nome']);?></option>
                                <?php } 
								*/
								?>
                                
                                <option value="0">- Selecione o estado -</option>
                                <?php while($ln_estado = mysql_fetch_array($qr_estados)){ ?>
	                                <option  value="<?php print $ln_estado['cod_estados'];?>" <?php print ($ln_estado['cod_estados'] == $estado) ? "selected=\"selected\"" : "" ; ?>><?php print htmlentities($ln_estado['nome']);?></option>
                                <?php }//while ?>
                           </select>
                        </label>
                        <br /><br />
                    </td>
                   </tr>
                   <tr>
                     <td class="txt_topico_tabela" ><strong>Cidade<span class="dados_obrigatorios">*</span></strong></td>
                     <td>
                      <select name="cidade" class="formulario" id="cidade">
                         <?php 
						 /*
						 if(sizeof($error)!= 0){ ?>
                             <option value="<?php print $cidade;?>" selected="selected"><?php print htmlentities($nome_cidade);?></option>
                         <?php 
                                $sql_cid = "SELECT * FROM ev_cidades WHERE estados_cod_estados='$estado'";
                                $cid = mysql_query($sql_cid, $conexao) or die(mysql_error());
                                while($mostrar_cid= mysql_fetch_array($cid)){
                                    $id_cid = $mostrar_cid['cod_cidades'];
                                    $nome_cid = $mostrar_cid['nome'];
                                    print '<option value="'. $id_cid.'">'. htmlentities($nome_cid).'</option>';
                                }	
                         }else{ ?>
                             <option  value="0" selected="selected" disabled="disabled">- Selecione o estado primeiro -</option>
                         <?php } 
						 */
						 ?>

						<?php if(empty($qr_cidades)){ ?>
                        <option value="0">- Selecione o estado primeiro -</option>
                        <?php }else { ?>
	                        <?php while($ln_cidade = mysql_fetch_array($qr_cidades)){ ?>
	                            <option  value="<?php print $ln_cidade['cod_cidades'];?>" <?php print ($ln_cidade['cod_cidades'] == $cidade) ? "selected=\"selected\"" : "" ; ?>><?php print htmlentities($ln_cidade['nome']);?></option>
	                        <?php }//while 
						}//else ?>
                      </select>
                     </td>
                   </tr>
                </table>
            </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td class="txt_topico_tabela"><strong>CEP</strong></td>
             <td><input name="cep" type="text" class="formulario" id="cep" size="20" maxlength="9" value="<?php if(sizeof($error)!= 0){ print $cep; }else{ print $p['cep'];} ?>" /></td>
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
             <td><input name="telefone" type="text" class="formulario" id="telefone" size="20" value="<?php if(sizeof($error)!= 0){ print $telefone; }else{ print $p['telefone'];} ?>" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <? if(($p['id_tipo_participante']!=8) and ($p['id_tipo_participante']!=10)){ ?>
           <tr>
             <td class="txt_topico_tabela"><strong>Modalidade de inscri&ccedil;&atilde;o</strong><span class="dados_obrigatorios">*</span></td>
             <td><span class="txt_resposta">
               <?php while($ln_tipo_participante = mysql_fetch_assoc($qr_tipo_participante)){?>
               <input type="radio" name="tipo_participante" id="tipo_participante" value="<?php print $ln_tipo_participante['id']; ?>" <?php if(sizeof($error)!= 0){ if($tipo_participante==$ln_tipo_participante['id']){ print "checked"; }}else if($p['id_tipo_participante']==$ln_tipo_participante['id']){ print "checked"; } ?> />
               <?php print htmlentities($ln_tipo_participante['nome']); ?><br />
               <?php }?>
             </span> </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <? }else{?>
		   	<input name="tipo_participante" type="hidden" value="<?=$p['id_tipo_participante']?>" />
		   <? } ?>
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
           <tr>
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
           <tr>
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
            
			<div id="links_rapidos">
	            <div class="titulo_boxes"><h2>Área do Participante</h2></div>
                    <form action="controle.php" method="post">
                      <div align="center" style="margin-top:15px;">
                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td class="txt_topico_tabela">Ol&aacute;, <?php print $_SESSION["nome_participante"];?></td>
                          </tr>
                          <tr>
                            <td class="txt"><a href="controle.php?acao=logout&id=<?php print $id_evento; ?>" >sair</a></td>
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
<? //print $_SESSION['id_evento'];?>
</body>
</html>
