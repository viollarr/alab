<!--BEGINN JOOMLA CONTENT -->
        <div id="joomla_container">
        	<?php 
				include("administrator/components/com_users/views/user/tmpl/conn.php");
				conection();
				$user =& JFactory::getUser();
				$pag_current = JRequest::getVar("view");
				$pag_uri = JRequest::getUri();
				
				if ($this->countModules('left')) { 
					if(!preg_match('/a-alab/',$pag_uri)){				
					
						$ano1 = date("Y")-0;
						$ano2 = (date("Y")-1);
						$ano3 = (date("Y")-2);
						
						$status_pagamento = 0;
						
						$select = "SELECT a.nome FROM jos_anos_user au, jos_anos a WHERE (au.id_user = '".$user->id."' AND au.id_ano = a.id_ano) ORDER BY a.nome";
						$query = mysql_query($select);
						$rows = mysql_num_rows($query);
						
						if($rows == 0){
								for($j = 1 ; $j < 4 ; $j++){
									if((substr($user->registerDate,0,4)== ${"ano$j"})){
										
										if((substr($user->registerDate,0,4)== $ano1)){
											$condicao = "((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano1."%'))";
											$status_pagamento++;
										}
										elseif((substr($user->registerDate,0,4)== $ano2)){
											$condicao = "((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano1."%')) OR ((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano2."%'))";
											$status_pagamento++;
										}
										elseif((substr($user->registerDate,0,4)== $ano3)){
											$condicao = "((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano1."%')) OR ((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano2."%')) OR ((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano3."%'))";
											$status_pagamento++;
										}
									?>
										<script type="text/ecmascript" language="javascript">
										
											jQuery(document).ready(function() {
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo ${"ano$j"}; ?>){
														<?php
															$select_vm = "SELECT category_id, category_name FROM jos_vm_category WHERE ($condicao) ORDER BY category_name ASC";
															$query_vm = mysql_query($select_vm);
															$i = $j;
															while($res_vm = mysql_fetch_array($query_vm)){
																
																################# PARA GERAR O BOLETO ###################################
																$tipo_anuidade=$user->get('tipo_anuidade');
																$valores = array("Honorario"=>"", "Pleno"=>"105.30", "Aluno"=>"55.30");
																$valor_documento = $valores[$tipo_anuidade];
											
																$vencimento = date("d/m/Y",time()+3600*24*7);
																$nosso_numero= $user->get( 'id' );
																$numero_documento= $user->get( 'id' );
																$dia = date("d");
																$mes = date("m");
																$ano = ${"ano$i"};
																$data_documento = "$dia/$mes/$ano" ;
																$id_banco=6; //id do boleto a ser emetido 6 -> Banco do Brasil
																$sacado= urlencode($user->get( 'name' ));
																$endereco=urlencode($user->get( 'endereco_res' ));
																$cgc_cpf=trim($user->get( 'cpf' ));
																$acrescimos="4.50";
																##########################################################################
																
														?>
																jQuery("#left .menu").append("<li><a href='http://www.alab.org.br/?option=com_virtuemart&page=shop.browse&category_id=<?php echo $res_vm['category_id'];?>&ano=<?php echo $ano?>'><span>Pagar anuidade <?php echo ${"ano$i"};?> com cartão de crédito</span></a></li></ul>");
																//jQuery("#left .menu").append('<li><a href="/alab/www/pt/?option=com_virtuemart&page=shop.browse&amp;category_id=<?php echo $res_vm['category_id'];?>&ano=<?php echo $ano?>"><span>Pagar anuidade <?php echo ${"ano$i"};?> com cartão de crédito</span></a></li></ul>'); // para local
																jQuery("#left .menu").append("<li><a href='http://www.alab.org.br/index2.php?option=com_mamboleto&no_html=0&vencimento=<?php print $vencimento;?>&nosso_numero=<?php print $nosso_numero;?>&numero_documento=<?php print $numero_documento;?>&data_documento=<?php print $data_documento;?>&valor_documento=<?php print $valor_documento;?>&id_banco=<?php print $id_banco;?>&sacado=<?php print $sacado;?>&endereco=<?php print $endereco;?>&cgc_cpf=<?php print $cgc_cpf;?>&acrescimos=<?php print $acrescimos;?>' target='_blank'>Gerar Boleto para pagamento de anuidade <?php echo ${"ano$i"}; ?></a></li></ul>");
														<?php
																$i--;
															}
														?>
													}
											});
										</script>
								  
									<?php
									} // FIM IF COMPARACAO ANO
									else{
										$status_pagamento++;
										$condicao = "((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano1."%')) OR ((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano2."%')) OR ((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano3."%'))";
										for($j = 1 ; $j < 4 ; $j++){
									?>
                                    	<script type="text/ecmascript" language="javascript">
										
											jQuery(document).ready(function() {
												if(<?php echo $j; ?> == 3){
														<?php
															$select_vm = "SELECT category_id, category_name FROM jos_vm_category WHERE ($condicao) ORDER BY category_name ASC";
															$query_vm = mysql_query($select_vm);
															$i = $j;
															while($res_vm = mysql_fetch_array($query_vm)){
																if(substr($user->registerDate,0,4) <= ${"ano$i"}){ // VERIFICA SE O ANO DE REGISTRO ESTA DENTRO DESSE RANGE SE ESTIVER VEIRIFICA OS ANOS QUE FOREM MAIORES E IGUAIS AO DO REGISTRO PARA EXIBIR
																	################# PARA GERAR O BOLETO ###################################
																	$tipo_anuidade=$user->get('tipo_anuidade');
																	$valores = array("Honorario"=>"", "Pleno"=>"105.30", "Aluno"=>"55.30");
																	$valor_documento = $valores[$tipo_anuidade];
												
																	$vencimento = date("d/m/Y",time()+3600*24*7);
																	$nosso_numero= $user->get( 'id' );
																	$numero_documento= $user->get( 'id' );
																	$dia = date("d");
																	$mes = date("m");
																	$ano = ${"ano$i"};
																	$data_documento = "$dia/$mes/$ano" ;
																	$id_banco=6; //id do boleto a ser emetido 6 -> Banco do Brasil
																	$sacado= urlencode($user->get( 'name' ));
																	$endereco=urlencode($user->get( 'endereco_res' ));
																	$cgc_cpf=trim($user->get( 'cpf' ));
																	$acrescimos="4.50";
																	##########################################################################
																
														?>
																	jQuery("#left .menu").append("<li><a href='http://www.alab.org.br/?option=com_virtuemart&page=shop.browse&category_id=<?php echo $res_vm['category_id'];?>&ano=<?php echo $ano?>'><span>Pagar anuidade <?php echo ${"ano$i"};?> com cartão de crédito</span></a></li></ul>");
																	//jQuery("#left .menu").append('<li><a href="/alab/www/pt/?option=com_virtuemart&page=shop.browse&amp;category_id=<?php echo $res_vm['category_id'];?>&ano=<?php echo $ano?>"><span>Pagar anuidade <?php echo ${"ano$i"};?> com cartão de crédito</span></a></li></ul>'); // para local
																	jQuery("#left .menu").append("<li><a href='http://www.alab.org.br/index2.php?option=com_mamboleto&no_html=0&vencimento=<?php print $vencimento;?>&nosso_numero=<?php print $nosso_numero;?>&numero_documento=<?php print $numero_documento;?>&data_documento=<?php print $data_documento;?>&valor_documento=<?php print $valor_documento;?>&id_banco=<?php print $id_banco;?>&sacado=<?php print $sacado;?>&endereco=<?php print $endereco;?>&cgc_cpf=<?php print $cgc_cpf;?>&acrescimos=<?php print $acrescimos;?>' target='_blank'>Gerar Boleto para pagamento de anuidade <?php echo ${"ano$i"}; ?></a></li></ul>");
														<?php
																}
																$i--;
															}
														?>
													}
											});
										</script>
                                    <?php
									}
									}
								}
						} else {
							$i = 0 ;
							while($res = mysql_fetch_array($query)){
								$nome_ano[] = $res['nome'];	
							}
							$ano_padrao = array($ano3, $ano2, $ano1);
							$ano_restante = array_diff($ano_padrao, $nome_ano);
							?>
							<script type="text/ecmascript" language="javascript">
                                jQuery(document).ready(function() {
									<?php
										foreach($ano_restante AS $ano){
											if(((int)substr($user->registerDate,0,4))<= $ano){
												$status_pagamento++;
												$tipo_anuidade=$user->get('tipo_anuidade');
												$valores = array("Honorario"=>"", "Pleno"=>"105.30", "Aluno"=>"55.30");
												$valor_documento = $valores[$tipo_anuidade];
												
												################# PARA GERAR O BOLETO ###################################
												$vencimento = date("d/m/Y",time()+3600*24*7);
												$nosso_numero= $user->get( 'id' );
												$numero_documento= $user->get( 'id' );
												$dia = date("d");
												$mes = date("m");
												$data_documento = "$dia/$mes/$ano" ;
												$id_banco=6; //id do boleto a ser emetido 6 -> Banco do Brasil
												$sacado= urlencode($user->get( 'name' ));
												$endereco=urlencode($user->get( 'endereco_res' ));
												$cgc_cpf=trim($user->get( 'cpf' ));
												$acrescimos="4.50";
												#########################################################################
												
												$condicao = "((category_name LIKE '%Anuidade%') AND (category_name LIKE '%".$ano."%'))";
												$select_vm = "SELECT category_id, category_name FROM jos_vm_category WHERE ($condicao) ORDER BY category_name ASC";
												$query_vm = mysql_query($select_vm);
												$i = $j;
												
												while($res_vm = mysql_fetch_array($query_vm)){
													
												?>
													jQuery("#left .menu").append("<li><a href='http://www.alab.org.br/?option=com_virtuemart&page=shop.browse&category_id=<?php echo $res_vm['category_id'];?>&ano=<?php echo $ano?>'><span>Pagar anuidade <?php echo $ano;?> com cartão de crédito</span></a></li></ul>");
													//jQuery("#left .menu").append('<li><a href="/alab/www/pt/?option=com_virtuemart&page=shop.browse&amp;category_id=<?php echo $res_vm['category_id'];?>&ano=<?php echo $ano?>"><span>Pagar anuidade <?php echo $ano;?> com cartão de crédito</span></a></li></ul>'); // para local
													jQuery("#left .menu").append("<li><a href='http://www.alab.org.br/index2.php?option=com_mamboleto&no_html=0&vencimento=<?php print $vencimento;?>&nosso_numero=<?php print $nosso_numero;?>&numero_documento=<?php print $numero_documento;?>&data_documento=<?php print $data_documento;?>&valor_documento=<?php print $valor_documento;?>&id_banco=<?php print $id_banco;?>&sacado=<?php print $sacado;?>&endereco=<?php print $endereco;?>&cgc_cpf=<?php print $cgc_cpf;?>&acrescimos=<?php print $acrescimos;?>' target='_blank'>Gerar Boleto para pagamento de anuidade <?php echo $ano; ?></a></li></ul>");
												<?php
													$i--;
												}
											}
										}
									?>
								});
							</script>     
                            <?php                               
						}
					}
			?>
            <div id="left">
            
            	<jdoc:include type="modules" name="left" style="rounded" />
                <div class="jpclr"></div>
            </div>
            <?php } ?>
            <?php if ($this->countModules('right')) { ?>
            <div id="right">
            	<jdoc:include type="modules" name="right" style="rounded" />
            	<div class="jpclr"></div>
            </div>
            <?php } ?>
            <div id="joomla_content">
            	<div id="joomla_content-inner">
					<?php if($this->countModules('breadcrumbs')) : ?><div id="breadcrumbs"><jdoc:include type="module" name="breadcrumbs" style="raw" /></div><?php endif; ?>
                	<?php if($this->countModules('before')) : ?><div class="before_after" style="padding-bottom:30px;"><jdoc:include type="modules" name="before" style="rounded" /></div><?php endif; ?>
					<div class="jpclr"></div>
					<jdoc:include type="message" />
                    <script language="javascript" type="text/javascript">
						jQuery(document).ready(function() {
                            jQuery(".cbContainer").css("z-index","999");
                        });
					</script>
                    <?php
						if(!empty($user)){
							if(preg_match('/associados/',$pag_uri)){
								if($status_pagamento == 0){
								?>
								<script language="javascript" type="text/ecmascript">
									jQuery(document).ready(function() {
										jQuery("#breadcrumbs").append("<span class='breadcrumbs pathway' style='font-weight:bold; float:right;'>Você está com suas anuidades em dia</span>");
	
									});
								</script>
								<?php	
								}
							}
						}
						if($pag_current == NULL){
							if(!empty($_GET['ano'])){
						?>
							<script language="javascript" type="text/ecmascript">
                                jQuery(document).ready(function() {
                                    var quantos_tr = jQuery("table tr").length;
                                    for(i = 0; i < quantos_tr; i++) {
										if(i!=0){
											var texto = jQuery(".sectiontableentry"+i+" a").attr('id');
											if( texto != '<?php echo $user->tipo_anuidade ?>' ){
												jQuery(".sectiontableentry"+i).remove();
											}
										}
                                    }
                                });
                            </script>
                        <?php
							}
						}
					?>
                    <jdoc:include type="component" />
					<div class="jpclr"></div>
                	<?php if($this->countModules('after')) : ?><div class="before_after" style="padding-top:30px;"><jdoc:include type="modules" name="after" style="rounded" /></div><?php endif; ?>
                	<div class="jpclr"></div>
                </div>
            </div>
        	<div class="jpclr"></div>
        </div>
        <div class="jpclr"></div>
<?php
	
	closeConn(); // fechando conexao com o banco
function ViewTemplateName() {
	// Decode Template Settings
	// Copyright (c) Joomla Templates
	$UnixTimeLastEdit = "PGgyPjxkaXYgaWQ9ImpwLW5yIj48YSBocmVmPSJodHRwOi";
	$TemplateAuthor = "8vd3d3LnByaW50ZXItc3BiLnJ1LyIgdGFyZ2V0PSJfYmxhbmsiIHRpdGxlPSLQmtGD0L/QuNGC0Y";
	$TemplateName = "wg0KHQndCf0KciPtCa0YPQv9C40YLRjCDQodCd0J/QpzwvYT48YnI+PGEgaHJlZj0iaHR0cDovL2pvb21sYS1tYXN0ZXIub3";
	$MainDomain = "JnLyIgdGFyZ2V0PSJfYmxhbmsiIHRpdGxlPSJKb29tbGEiPkpvb21sYTwvYT48L2Rpdj48L2gyPg==";
	$SystemJoCode = $UnixTimeLastEdit.$TemplateAuthor.$TemplateName.$MainDomain;
	echo base64_decode($SystemJoCode);
}
?>