<?php
// Impedir acesso direto aos arquivos do site
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');

function limita_caracteres($texto, $limite, $quebra = true) {  

	$atual = array("<p>","&lt;p&gt;","<strong>","&lt;strong&gt;","</strong>","&lt;/strong&gt;","</p>","<br>","&lt;br /&gt;",'&lt;span class=&quot;texto&quot;&gt;','<span class="texto">');
	$troca = array("","","","","","","","","","","");
    $texto=str_replace($atual,$troca,$texto);	


     $tamanho = strlen($texto);  
     // Verifica se o tamanho do texto � menor ou igual ao limite  
     if ($tamanho <= $limite) {  
         $novo_texto = $texto;  
     // Se o tamanho do texto for maior que o limite  
     } else {  
         // Verifica a op��o de quebrar o texto  
         if ($quebra == true) {  
             $novo_texto = trim(substr($texto, 0, $limite)).'...';  
         // Se n�o, corta $texto na �ltima palavra antes do limite  
         } else {  
             // Localiza o �tlimo espa�o antes de $limite  
             $ultimo_espaco = strrpos(substr($texto, 0, $limite), ' ');  
             // Corta o $texto at� a posi��o localizada  
             $novo_texto = trim(substr($texto, 0, $ultimo_espaco)).'...';  
         }  
     }  

	//$atual = array("<p>","&lt;p&gt;","<strong>","&lt;strong&gt;","</strong>","&lt;/strong&gt;","</p>","<br>","&lt;br /&gt;",'&lt;span class=&quot;texto&quot;&gt;','<span class="texto">');
	//$troca = array("","","","","","","","","","","");
    //$nova_frase=str_replace($atual,$troca,$novo_texto);	
    
	// Retorna o valor formatado  
	return $novo_texto;  
} 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
	
    <jdoc:include type="head" />
	<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="templates/system/css/general.css" type="text/css" />
	<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/editor.css" type="text/css" />

	<script type="text/javascript" src="templates/<?php echo $this->template; ?>/js/jquery.js"></script> 
	<script type="text/javascript" src="templates/<?php echo $this->template; ?>/js/jquery.corner.js"></script>

 <script language="javascript" type="text/javascript">
                                <!--
                                        function submitjnewslettermod1(formname) {
                                                var form = eval('document.'+formname);if(!form.elements) form = form[1];var place = form.email.value.indexOf("@",1);var point = form.email.value.indexOf(".",place+1);
                                if (form.name.value == "" || form.name.value == "Nome") {
                                        alert( "Por favor, informe seu nome." );return false;
                                } if (form.email.value == "" || form.email.value == "E-mail") {alert( "Por favor, informe um endereA�o de e-mail vAAlido." );return false;
                                                                        } else {if ((place > -1)&&(form.email.value.length >2)&&(point > 1)){form.submit();return true;
                                                                                                } else {alert( "Por favor, informe um endereA�o de e-mail vAAlido." );return false;}}}
                                                //-->
                        </script>


	<title>ALAB - Associa��o de Lingu�stica Aplicada do Brasil</title>

	<?php // Trecho necess�rio para esconder os blocos que n�o estiverem com m�dulos setados
		$pag_current = JRequest::getVar("view");
		$exibirPagInterna = false;
		if ($pag_current!="frontpage"){
			$exibirPagInterna = true;
		}
		
		$qtdModulosMenuInterno = $this->countModules("menu_interno");
		$qtdModulosMenuUsuarioAssociado = $this->countModules("menu_interno_restrito");
		$exibirMenuInterno = false;
		if (($qtdModulosMenuInterno>=1) or ($qtdModulosMenuUsuarioAssociado>=1) ){
		//if ($qtdModulosMenuInterno>=1){
			$exibirMenuInterno = true;
		}
		
	?>

</head>

<body>
<?php 
	$user =& JFactory::getUser();
	/* $user->guest ser� 1 se n�o houver ningu�m logado */
	if ($user->guest) {
		$width_box_logout = "210px;";
		$exibir_box_logout = false;
	}else {
		$width_box_logout = "420px;";
		$exibir_box_logout = true;
	} // fim else
?>
    <div id="tudo">
		<div id="header">
       	  <div id="menu_topo">
            <br />
                <jdoc:include type="modules" name="topomenu" style="xhtml" />
			</div>    
            <div id="logo">
            <br />
		    <a href="index.php"><img src="templates/<?php echo $this->template; ?>/images/logo.gif" border="0" /></a><br />
				<p>Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil</p>
            </div>
        	<div id="login_associado">
            	<h3>ESPA&Ccedil;O DO ASSOCIADO</h3>
            <?php if ($exibir_box_logout){ ?>
            <jdoc:include type="modules" name="logout_associado" style="xhtml" />
            <?php }else{ // N�o est� logado. MOSTRAR CAMPOS PARA FAZER LOGIN ?>
            <jdoc:include type="modules" name="login_associado" style="xhtml" />
            <?php }?>            
            </div>
          <div class="clear"></div>
			<div id="menu_principal">
                <jdoc:include type="modules" name="menu_principal" style="xhtml" />
            </div>        	
      </div>
        <div class="clear"></div>
<?php if ($exibirPagInterna==false) {?>        
        <div id="centro">
            <div id="banner">
                <jdoc:include type="modules" name="banner_destaque" style="xhtml" />
            </div>
         	<?php
		 	  $qtdModulosBannerDestaque = $this->countModules("banner_destaque");
			  if ($qtdModulosBannerDestaque>0){
			?> 
	            <div style="height:10px;"></div>
            <?php }	?>
			<div id="container">
	            <div class="titulo_boxes">
	              <h2>Not&iacute;cias</h2>
	            </div>
                <br />
            	<div id="noticia_destaque">
                <jdoc:include type="modules" name="noticia_destaque" style="xhtml" />
                </div>
                <div id="outras_noticia">
                <jdoc:include type="modules" name="outras_noticia" style="xhtml" />
                <br />
                <img src="templates/<?php echo $this->template; ?>/images/bullet.gif" width="9" height="9" /><span class="txt"> <a href="index.php?option=com_content&view=section&layout=blog&id=2">Clique aqui para ver todas as not&iacute;cias</a></span>
                </div>
                <div class="clear"></div>
          </div>
        </div>   
<?php } //fim do if 
elseif ($exibirPagInterna==true) { 
?>
        <div id="centro">
              <div id="container">
                        <div class="breadbrumbs_boxes">
                          <h2><jdoc:include type="module" name="breadcrumbs" /></h2>
                </div>
                      <br />
                  <div id="conteudo">
                        <div class="txt_titulo_destaque"><!--A ALAB-->
						<?php 
							global $mainframe;
					
							// Get the PathWay object from the application
							$pathway =& $mainframe->getPathway();
							$items   = $pathway->getPathWay();
					
							$count = count($items);
							for ($i = 0; $i<$count; $i++){
								$items[$i]->name = stripslashes(htmlspecialchars($items[$i]->name));
								$items[$i]->link = JRoute::_($items[$i]->link);
							}
							
							//print "<br>\$items = "; print_r($items); print "<br>";
							print $items[0]->name;
						?>
						</div>  
                        <hr>
                     <?php 
					 	$width_artigo = "";
						if ($exibirMenuInterno==true) { ?>
                    <div id="menu_secundario">
                            <jdoc:include type="modules" name="menu_interno" style="xhtml" />                            
                            <?php if ($exibir_box_logout){ ?>
	                            <jdoc:include type="modules" name="menu_interno_restrito" style="xhtml" />
								<?php if($this->countModules("menu_interno_restrito")!=0) { ?>
									<?php
									$tipo_anuidade=$user->get('tipo_anuidade');
									$valores = array("Honorario"=>"", "Pleno"=>"74.50", "Aluno"=>"39.50");
									$valor_documento = $valores[$tipo_anuidade];
									//$valor_documento = "1.10"; TESTE
									if(!empty($valor_documento)){
										$vencimento = date("d/m/Y",time()+3600*24*7);
										$nosso_numero= $user->get( 'id' );
										$numero_documento= $user->get( 'id' );
										$data_documento = date("d/m/Y") ;
										$id_banco=6; //id do boleto a ser emetido 6 -> Banco do Brasil
										$sacado=$user->get( 'name' );
										$endereco=$user->get( 'endereco_res' );
										$cgc_cpf=trim($user->get( 'cpf' ));
										$acrescimos="4.50";
										?>
										<ul style="margin-top:-2px;"><li>
											<a href="http://www.alab.org.br/index2.php?
												option=com_mamboleto
												&no_html=0
												&vencimento=<?php print $vencimento;?>
												&nosso_numero=<?php print $nosso_numero;?>
												&numero_documento=<?php print $numero_documento;?>
												&data_documento=<?php print $data_documento;?>
												&valor_documento=<?php print $valor_documento;?>
												&id_banco=<?php print $id_banco;?>
												&sacado=<?php print $sacado;?>
												&endereco=<?php print $endereco;?>
												&cgc_cpf=<?php print $cgc_cpf;?>
                                                &acrescimos=<?php print $acrescimos;?>" target="_blank">Gerar Boleto</a>
										</li></ul>
									<?php }//fim if ?>
								<?php }//fim if ?>
							<?php }else{ ?>
							<jdoc:include type="modules" name="menu_interno_nao_restrito" style="xhtml" />
							<?php } ?>                            
                    </div>
                   <?php } else $width_artigo = "style='width: 100%;'"; ?>
                    <div id="artigo" <?php print $width_artigo; ?>>
						<span class="txt_artigo">                       
                        <jdoc:include type="component" />
						<?php 
                   		$option_current = JRequest::getVar("option");
						$view_current = JRequest::getVar("view");
						$id_current = JRequest::getVar("id");
						
						if ( ($option_current=='com_content') and ($view_current=='article') and ($id_current=='21') ){
							$vencimento=$_REQUEST['vencimento'];
							$nn=$_REQUEST['numero_documento'];
							$data_documento=$_REQUEST['data_documento'];
							$valor_documento=$_REQUEST['valor_documento'];
							$id_banco=$_REQUEST['id_banco'];
							$sacado=$_REQUEST['sacado'];
							$endereco=$_REQUEST['endereco'];
							$cgc_cpf=$_REQUEST['cgc_cpf'];
							$acrescimos=$_REQUEST['acrescimos'];
	
							print "<a href='index2.php?option=com_mamboleto&no_html=0&vencimento=$vencimento&nosso_numero=$nn&numero_documento=$nn&data_documento=$data_documento&valor_documento=$valor_documento&id_banco=$id_banco&sacado=$sacado&endereco=$endereco&cgc_cpf=$cgc_cpf&acrescimos=$acrescimos' target='_blank'><b>Clique aqui para gerar o Boleto</b></a>";
						}
						?>
                        </span>
                        </div>
                  </div>
                  <div class="clear"></div>
              </div>
        </div>
<?php 
}//$exibirPagInterna
 ?>
        <div id="lado_direito">
        	<div id="user1">
	            <div class="titulo_boxes"><h2>RBLA</h2></div>
                <div align="center">
                  <br />
                  <!--
                  <a href="#"><img src="images/imagem_revista.jpg" border="0" /></a>
                  <br />
                  <span class="destaque_revista">REVISTA BRASILEIRA<br />
                  DE LINGU&Iacute;STICA APLICADA</span><br />
                  <span class="txt">conhe&ccedil;a melhor esse projeto</span></div>
                  -->
                  <jdoc:include type="modules" name="user1" style="xhtml" />
	        	</div>
            </div>
            <div id="links_rapidos">
				<div class="titulo_boxes"><h2>Seja um associado ALAB</h2></div>
            	<!--<ul>
                	<li><a href="#">Conhe�a as vantagens</a></li>
                	<li><a href="#">Leia o regulamento</a></li>
                	<li><a href="#">Efetue o pagamento</a></li>
                	<li><a href="#">Saiba como usar</a></li>                                                            
                </ul>
                -->
                <jdoc:include type="modules" name="links_rapidos" style="xhtml" />
            </div>
            <div id="banner_secundario">
                <jdoc:include type="modules" name="banner_secundario" style="xhtml" />
            </div>

            <!--<div id="newsletter">
            	<div class="titulo_boxes"><h2>Assine a Newsletter</h2></div>
            	
                <br />
                <div align="center">
          
                <jdoc:include type="modules" name="newsletter _tirar_isso_tudo_e_s�_deixar_newsletter  " style="xhtml" />
				</div>
            </div>
            -->
        </div>
        <div class="clear"></div>

		<div id="footer">
            <!--
            <div class="footer_menu_wrapper">
                <ul id="footer_menu">
                        <div id="item">
                            <li><strong>A ALAB</strong>
                                <ul>
                                    <li><a href="/produtos/hospedagem.html" title="Hospedagem de Sites" >A Associa&ccedil;&atilde;o</a></li>
                                    <li><a href="/produtos/revenda.html" title="Revenda de Hospedagem" >Hist&oacute;ria</a></li>
                                    <li><a href="/produtos/windows-streaming-media.html" title="Windows Streaming Media" >Diretoria</a></li>
                                    <li><a href="/produtos/windows-streaming-media.html" title="Windows Streaming Media" >Ementa</a></li>                                
                                </ul>
                            </li>
                         </div>  
                         <div id="item"> 
                            <li><strong>Not&iacute;cias</strong>
                              <ul>
                                    <li><a href="/produtos/cloud-server.html" title="Cloud Server">Alab</a></li>
                                    <li><a href="/produtos/private-cloud.html" title="Private Cloud">Concursos</a></li>
                                    <li><a href="/produtos/private-cloud.html" title="Private Cloud">Congressos</a></li>
                                    <li><a href="/produtos/private-cloud.html" title="Private Cloud">Publica��es</a></li>
                                    <li><a href="/produtos/private-cloud.html" title="Private Cloud">Inscri��es</a></li>                                                                                                
                                </ul>
                            </li>
                         </div>  
                         <div id="item">
                            <li> <strong>Publica&ccedil;&otilde;es</strong>
                                <ul>
                                    <li><a  title="Registro de Dom�nio" href="/produtos/registro-dominio.html">RBLA</a></li>
                                    <li><a title="Registro de Dom�nio" href="/produtos/registro-dominio.html#aba_transferencia">Outras <br />
                                    publica��es</a></li>
                              </ul>
                            </li>
                         </div>  
                         <div id="item">
                            <li> <strong>Eventos</strong>
                              <ul>
                                    <li><a href="/produtos/servidores-dedicados.html" title="Servidores Dedicados" >Congressos</a></li>
                                    <li><a href="/produtos/outsourcing.html" title="Outsourcing" >Simp�sios</a></li>
                                </ul>
                            </li>
                         </div>  
                         <div id="item">
                            <li> <strong>Associados</strong>
                  <ul>
                                    <li><a href="/produtos/mobimail.html" title="Mobimail" >Espa�o do <br />
                                associado</a></li>
                            <li><a href="/produtos/email-marketing.html" title="E-mail Marketing">Associe-se</a></li>
                                    <li><a href="/produtos/email-marketing.html" title="E-mail Marketing">Busca por <br />
                            membro</a></li>                                
                              </ul>
                            </li>
                         </div>  
                         <div id="item">
                            <li> <strong>Links</strong>
                              <ul>
                                    <li><a href="/produtos/pabx-virtual.html" title="PABX Virtual" >Brasil</a></li>
                                    <li><a href="/produtos/call-center-virtual.html" title="Call Center Virtual" >Mundo</a></li>
                                    <li><a href="/produtos/call-center-virtual.html" title="Call Center Virtual" >Associa��es</a></li>                                
                                </ul>
                            </li>
                         </div>  
                         <div id="item">
                            <li> <strong>Biblioteca</strong>
                              <ul>
                                    <li><a href="/produtos/loja-pronta.html" title="Loja Pronta" >Buscar artigo</a></li>
                                    <li><a href="/produtos/pagamento-certo.html" title="Pagamento Certo">Busca por autor</a></li>
                                    <li><a href="/produtos/gateway-pagamento.html" title="Gateway de Pagamentos" >Escrever artigo</a></li>
                                </ul>
                            </li>
                         </div>  
                         <div id="item">
                            <li> <strong>Newsletter</strong>
                              <ul>
                                    <li><a href="/produtos/loja-pronta.html" title="Loja Pronta">Assine</a></li>
                                </ul>
                            </li>
                         </div>  
                </ul>
          </div>
          -->
          <div class="menu_footer">
          <jdoc:include type="modules" name="menu_footer" style="xhtml" />
		  </div>	
          
              <div align="center">
                  <img src="templates/<?php echo $this->template; ?>/images/separador_rodape.jpg" />
                  <div class="txt_footer">ALAB - Associa&ccedil;&atilde;o de Lingu&iacute;stica Aplicada do Brasil | Av.Hor&aacute;cio   Macedo 2151 sala F-317  
                  Cidade Universit&aacute;ria CEP 21.941-917 &nbsp;Rio de Janeiro - RJ &nbsp;Tel. 55 (021) 2598-9701</div>
          </div>	
        </div>
    </div>
</body>
</html>
