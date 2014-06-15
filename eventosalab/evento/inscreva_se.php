<?php 
if(!empty($_SESSION["inscrever"])){
?>
	<style type="text/css">
        .titulo_boxes {
            color:#FFFFFF;
            text-align:center;
            text-transform:uppercase;
        }
		.inscrevase{
			padding-top:10px;
		}
        .tipo_residencia{
            width:20%;
        }
        .sub_titulo{
            height:18px; 
            margin-left:10px; 
            font-size:14px;
        }
        .select_model{
            font-size:14px; 
            margin-left:10px; 
            border:solid 1px #007EC2;	
        }
		.botao_inscrevase{
			text-align:center;	
		}
		.select_1{
			margin-bottom:10px;
		}
		.btn_send{
			margin-top:25px;
			margin-bottom:5px;
			margin-left:-20px;
		}
    </style>
    <script language="javascript" type="text/javascript">
		$(document).ready(function() {
			
			$('#inscreva').click(function(){
				var maskHeight = $(document).height();
				var maskWidth = $(window).width();
	
				$('#mask').css({'width':maskWidth,'height':maskHeight,'z-index':99,'position':'absolute','display':'block','background-color':'#CCC','opacity':0.8});
				$('#mask').fadeIn(1000);        
				$('#mask').fadeTo("slow",0.8);
				
				var winH = '40%';
				var winW = '40%';
				
			  
				//$("#boxes_inscrevase").css({'top':winH,'left':winW,'position':'absolute','z-index':999,'background-color':'#FFF','display':'block'});
		
				$("#boxes_inscrevase").show(100);
				$("#boxes_participar").hide(1000);
			});
		
		});
	</script>
    <?php
	$pagina = end(explode("/", $_SERVER['PHP_SELF']));
	list($qtd_participantes) = mysql_fetch_array(mysql_query("SELECT COUNT(id) AS qtd_participantes FROM ev_participante WHERE id_evento = ".$_SESSION["id_evento"]."", $conexao));
	if($qtd_participantes < 900){ //599
		?>
		<p>&nbsp;</p>
        <div id="boxes_inscrevase" style="display:none;">
            <form action="controle.php" method="post" id="inscrevase">
            	<input name="id" type="hidden" value="<?php echo $_SESSION['id_evento']; ?>" />
                <input name="participar" type="hidden" value="true" />
                <input name="id_joomla" type="hidden" value="<?php echo $_SESSION['id_joomla']; ?>" />
                <input name="pagina" type="hidden" value="<?php echo $pagina ;?>" />
                <?php
				if($pagina == 'pag.php'){
				?>
                	<input name="view" type="hidden" value="<?php echo $_GET['view']; ?>" />
                    <input name="id_artigo" type="hidden" value="<?php echo $_GET['id']; ?>" />
                <?php 
				} 
				?>
                <h3>Tipo de Inscri&ccedil;&atilde;o</h3><br />
                <div class="select_1">
                    <span class="sub_titulo">Tipo participante: </span>
                    <select name="tipo_participacao" class="select_model">
                    <?php			
                        $busca = "SELECT id, nome, nome_en FROM ev_tipo_participante WHERE id_evento = '".$id_evento."' AND (nome_en <> 'Auditor' AND nome_en <> 'Guest' AND nome_en <> 'Committee') ORDER BY nome ASC";
                        $sql_busca = mysql_query($busca);
                        while($busca_tipo = mysql_fetch_assoc($sql_busca)){	
                    ?>
                            <option value="<?php echo $busca_tipo['id']; ?>"><?php echo techo($busca_tipo['nome'],$busca_tipo['nome_en']); ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="select_1">
                    <span class="sub_titulo">Modalidade de participa&ccedil;&atilde;o: </span>
                    <select name="modalidade" class="select_model">
                        <option value="1">Com envio de Trabalhos</option>
                        <option value="0">Sem envio de Trabalhos</option>
                    </select>
                </div>
                <div class="btn_send">
                	<input name="inscreva" id="send" type="submit" value="<?php techo('Confirmar', 'Confirm'); ?>" class="botao_inscrevase" />
                </div>
            </form>
        </div>
        <div id="boxes_participar">
        	<input name="inscreva" id="inscreva" type="button" onclick="inscrever(this);" value="<?php techo('Inscreva-se aqui para este evento', 'Sign up here for this event'); ?>" class="botao_inscrevase" />
        </div>
		<?php 
	} //if
}
?>
