<?php
	session_start();
	require_once("conexao.php");

	//$id_evento_codificado=addslashes($_REQUEST['id']);
	
	$id_evento=$_SESSION['id_evento'];

	if ($_POST["insert"] == "true"){
		$email=addslashes(trim($_POST['email_user']));
	    $id_evento=(int)$_POST['id_ev'];
		//$id_evento_cod=$_POST['id_ev'];
		//$id_evento=base64_decode($id_evento_cod);
		
		if ($email==""){
			$error[]="Infome um e-mail"; 
		}else if (!eregi("^[-_a-z0-9]+(\\.[-_a-z0-9]+)*\\@([-a-z0-9]+\\.)*([a-z]{2,4})$", $email)) {
			$error[]="O e-mail informado não é válido"; 
		}
		
		if(sizeof($error)==0){
			$sql = "SELECT nome, email, senha FROM ev_participante WHERE email='$email' AND id_evento='$id_evento'";
			$qr= mysql_query($sql,$conexao);
			$ln=mysql_fetch_array($qr);
			$registro=mysql_num_rows($qr);
			
			//print $registro;
			
			if ($registro>=1){
				$nome=$ln["nome"];
				$email=$ln["email"];
				$senha=$ln["senha"];
				
				$quemenvia="ALAB";
				$email_alab = "alab@alab.org.br";
				$assunto = "Senha de acesso - Evento ALAB";
				
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
											<td align=\"left\">Olá '.$nome.', Segue abaixo seu login e senha de acesso do evento da ALAB:</td>
										 </tr>
										 <tr>
											<td>&nbsp;</td>
										 </tr>										 
										 <tr>
											<td align=\"left\"><strong>E-mail: </strong>'.$email.'</td>
										 </tr>
										 <tr>
											<td align=\"left\"><strong>Senha: </strong>'.$senha.'</td>
										 </tr>
										 <tr>
											<td>&nbsp;</td>
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
				//$headers .= "Bcc: ".$quemenvia."  <".$email_arte.">\n"; Cópia Oculta
				//$headers .= "MIME-Version: 1.0\n";
				$headers .= "MIME-Version: 1.1\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
				$headers .= "X-Priority: 3\n"; // 1 Urgente, 3 Normal 
				
				mail($email, $assunto, $corpoemail, $headers);
				echo "<script>alert('A senha foi enviada para seu e-mail.'); window.top.location.href='http://www.alab.org.br/eventosalab/pass.php';</script>";

			}else{
				echo "<script>alert('Não existe nenhum registro com o e-mail informado.'); window.top.location.href='http://www.alab.org.br/eventosalab/pass.php';</script>";				
			}
		}
		
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de eventos ALAB</title>
<link rel="stylesheet" href="css/template.css" type="text/css" />
</head>

<body>
<div id="tudo">

		<div id="header">
		<img src="http://www.alab.org.br/images/stories/alab/Banners/cbla_banner_final_pequeno.jpg" width="990" height="215" />        
        </div>
		<!--<div id="menu_eventos_alab">

        </div>--> 
		<div class="clear"></div>
        
  <div id="centro">
     <div id="artigo">
     <div id="box_trabalhos">
       <p><span class="txt_titulo_destaque">Lembrar senha</span><br />
       <p class="txt_titulo_noticias_2">Informe abaixo o e-mail cadastrado neste evento.</p>
       <p>&nbsp;</p>
       <?php if(sizeof($error)!= 0){ 
        print "<div style=\"width:460px; font-family: Arial,Verdana; font-size:12px; padding: 10px 0 10px 10px; color:#7F8386; background-color:#FFFFCC; border: 1px solid #FFFF66;\">";
	  			foreach ($error as $err){
					print $err . "<br />";
				}
			print "</div> <p>&nbsp;</p>";		
       }?>
       
       <form action="pass.php" method="post" name="form1" class="txt_topico_tabela" id="form1">
         <strong>         </strong>
         <table width="500" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="52"><strong>E-mail: </strong>
               <label> </label></td>
             <td width="448"><input name="email_user" type="text" class="formulario" id="email_user" size="45" /></td>
           </tr>
           
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td colspan="2"><input type="submit" name="button" id="button" value="Enviar para meu e-mail" class="botao" />
             <input name="insert" type="hidden" id="insert" value="true">
             <input name="id_ev" type="hidden" id="id_ev" value="<?=$id_evento;?>">             </td>
            </tr>
         </table>
         <label></label>
       </form>
       <p>&nbsp;</p>
       <span class="menuinterno"><a href="index.php?acao=logout&id=<? print base64_encode($id_evento); ?>">voltar</a></span>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
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
                            <td width="51" class="txt_topico_tabela">e-mail:</td>
                            <td width="149"><input name="login" type="text" class="formulario" size="26"></td>
                          </tr>
                          <tr>
                            <td class="txt_topico_tabela">senha:</td>
                            <td><input name="pass" type="password" class="formulario" size="15" >&nbsp;<input type="submit" class="botao" value="entrar" /><input name="id_evento" type="hidden" value="<?php print $_SESSION['id_evento'];?>"><input type="hidden" name="logar" value="true"></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <!-- id = id do envento-->
                            <td class="txt"><div align="left"><a href="pass.php" >esqueci minha senha</a></div></td>
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
