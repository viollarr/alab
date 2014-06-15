<!--BEGINN JOOMLA CONTENT -->

        <div id="joomla_container">

        	<?php 
				include("administrator/components/com_users/views/user/tmpl/conn.php");
				conection();
				$user =& JFactory::getUser();
				if ($this->countModules('left')) { 
				
					if($user-guest){
						
						$ano1 = date("Y");
						$ano2 = (date("Y")-1);
						$ano3 = (date("Y")-2);
						
						$select_vm = "SELECT category_id, category_name FROM jos_vm_category WHERE (category_name = 'Anuidade ".$ano1."' OR category_name = 'Anuidade ".$ano2."' OR category_name = 'Anuidade ".$ano3."')";
						$query_vm = mysql_query($select_vm);
						while($res_vm = mysql_fetch_array($query_vm)){
						
							$select = "SELECT a.nome FROM jos_anos_user au, jos_anos a WHERE (au.id_user = '".$user->id."' AND au.id_ano = a.id_ano)";
							$query = mysql_query($select);
							$rows = mysql_num_rows($query);
							
							if($rows == 0){
									if((substr($user->registerDate,0,4)== $ano3)){
									?>
										<script type="text/ecmascript" language="javascript">
										
											jQuery(document).ready(function() {
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano3; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=3"><span>Pagar  anuidade <?php echo $ano3;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=4"><span>Pagar anuidade <?php echo $ano2;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano2; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=4"><span>Pagar anuidade <?php echo $ano2;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano1; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}                                                 
											});
										</script>
								  
									<?php
									}
									if((substr($user->registerDate,0,4)== $ano2)){
									?>
										<script type="text/ecmascript" language="javascript">
										
											jQuery(document).ready(function() {
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano3; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=3"><span>Pagar  anuidade <?php echo $ano3;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=4"><span>Pagar anuidade <?php echo $ano2;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano2; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=4"><span>Pagar anuidade <?php echo $ano2;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano1; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}                                                 
											});
										</script>
								  
									<?php
									}
									if((substr($user->registerDate,0,4)== $ano1)){
									?>
										<script type="text/ecmascript" language="javascript">
										
											jQuery(document).ready(function() {
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano3; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=3"><span>Pagar  anuidade <?php echo $ano3;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=4"><span>Pagar anuidade <?php echo $ano2;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano2; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=4"><span>Pagar anuidade <?php echo $ano2;?> com cartão de crédito</span></a></li>');
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano1; ?>){
														jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
													}                                                 
											});
										</script>
								  
									<?php
									}
							} else {
								while($res = mysql_fetch_array($query)){
									$nome_ano = $res['nome'];
								?>
										<script type="text/ecmascript" language="javascript">
											
											
											jQuery(document).ready(function() {
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano3; ?>){
														<?php
																if($nome_ano != (date("Y")-2)){
																	?>
																	jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=3"><span>Pagar  anuidade <?php echo $ano3;?> com cartão de crédito</span></a></li>');
																	<?php
																}
														?>
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo $ano2; ?>){
														<?php
																if($nome_ano != (date("Y")-1)){
																	?>
																	jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=4"><span>Pagar anuidade <?php echo $ano2;?> com cartão de crédito</span></a></li>');
																	<?php
																}
														?>
													}
													if(<?php echo substr($user->registerDate,0,4); ?> == <?php echo  $ano1; ?>){
														<?php
																if($nome_ano != date("Y")){
																	?>
																	jQuery("#left .menu").append('<li><a href="/alab/www/pt/pagamentos?page=shop.browse&amp;category_id=2"><span>Pagar anuidade <?php echo $ano1;?> com cartão de crédito</span></a></li></ul>');
																	<?php
																}
														?>
													}
													 
											});
										</script>
								 <?php
								}
							}
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
                    
                    <?php
						$pag_current = JRequest::getVar("view");
						if($pag_current == NULL){
						?>
							<script language="javascript" type="text/ecmascript">
                                jQuery(document).ready(function() {
                                    var quantos_tr = jQuery("table tr").length;
                                    for(i = 0; i < quantos_tr; i++) {
										if(i!=0){
											jQuery(".sectiontableentry"+i).remove();
											//alert("sectiontableentry"+i);
/*											if(jQuery("a[title]")){
													jQuery(".sectiontableentry1").remove();
											}
*/										}
                                    }
                                    //jQuery(".sectiontableentry1").remove();
                                });
                            </script>
                        <?php
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