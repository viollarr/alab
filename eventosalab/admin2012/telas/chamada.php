<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../evento/js/jquery.js"></script> 
<script src="../evento/js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$("#data_inicio").mask("99/99/9999");
		$("#data_fim").mask("99/99/9999");
	});
</script>
<?php 
$chamada = $GLOBALS["chamadas"][0];
$precos_chamada = $GLOBALS["precos_chamada"];
$tipos_participante = $GLOBALS["tipos_participante"];
?>
Chamada<?php if(!empty($GLOBALS["titulo_tipo"])) print " de ".$GLOBALS["titulo_tipo"];?> - <?php print $GLOBALS["titulo_view"]; ?>
<br /><br />
<form action="controle.php" method="post">
    <input type="hidden" name="ctrl" value="chamada" />
    <input type="hidden" name="acao" value="salvar_edicao" />
    <input type="hidden" name="id" value="<?php echo $chamada["id"]; ?>" />
    <table class="tab_admin">
        <tr>
            <td>
                Ordem: 
            </td>
            <td>
                <input type="text" name="ordem" value="<?php echo $chamada["ordem"]; ?>" class="formulario" style="width:20px; text-align:center"/> 
                (N&uacute;mero inteiro positivo)
            </td>
      	</tr>
        <tr>
            <td>
                Data inicial: 
            </td>
            <td>
       	    <?php 
				if(!empty($chamada["data_inicio"]) && $chamada["data_inicio"]!="0000-00-00"){
					$arr_data_ini = explode("-", $chamada["data_inicio"]);
					$data_ini_format = $arr_data_ini[2]."/".$arr_data_ini[1]."/".$arr_data_ini[0];
				}//if
				?>
                <input type="text" name="data_inicio" id="data_inicio" value="<?php echo $data_ini_format; ?>" class="formulario" style="width:80px; text-align:center;"/>
                &nbsp;  (Ex: dd/mm/aaaa)            </td>
        </tr>
        <tr>
            <td>
                Data final: 
            </td>
            <td>
   	      <?php 
				if(!empty($chamada["data_fim"]) && $chamada["data_fim"]!="0000-00-00"){
					$arr_data_fim = explode("-", $chamada["data_fim"]);
					$data_fim_format = $arr_data_fim[2]."/".$arr_data_fim[1]."/".$arr_data_fim[0];
				}//if
				?>
                <input type="text" name="data_fim" id="data_fim" value="<?php echo $data_fim_format; ?>" class="formulario" style="width:80px; text-align:center;"/>
                &nbsp;  (Ex: dd/mm/aaaa)            </td>
        </tr>
        <tr>
            <td>
                Estado:
            </td>
            <td>
                <input type="radio" name="estado" value="ativa" 
					<?php ($chamada["estado"] == "ativa") ? print "checked" : print "" ; ?> class="formulario"/>Ativa
                <input type="radio" name="estado" value="cancelada" 
                	<?php ($chamada["estado"] == "cancelada") ? print "checked" : print "" ; ?> class="formulario"/>Cancelada
            </td>
        </tr>
        <tr>
            <td>
                Tipo:
            </td>
            <td>
                <input type="radio" name="tipo" value="trabalho" 
					<?php ($chamada["tipo"] == "trabalho") ? print "checked" : print "" ; ?> 
                    onclick="javascript:mostrar(false, 'precos_chamada');" class="formulario"/>Trabalho
                <input type="radio" name="tipo" value="inscricao" 
                	<?php ($chamada["tipo"] == "inscricao") ? print "checked" : print "" ; ?> 
                    onclick="javascript:mostrar(true, 'precos_chamada');" class="formulario"/>Inscri&ccedil;&atilde;o
            </td>
        </tr>
    </table>
    <div id="precos_chamada" style="display:<?php ($chamada["tipo"] == "inscricao") ? print "block" : print "none"; ?>;">
        <table class="tab_admin" style="margin-top: 15px;">
            <tr class="tab_admin_head"  width="100%">
                <td >Tipo Participante</td>
                <td>Pre&ccedil;o</td>
                <td>Pre&ccedil;o (em Reais)</td>
          </tr>
            <?php if(!empty($tipos_participante)){
                foreach($tipos_participante as $tipo_participante){ ?>
                    <tr>
                        <td><?php print $tipo_participante["nome"]; ?></td>
                        <td>U$
                            <?php 
                            if(!empty($precos_chamada)){ 
                                foreach($precos_chamada as $preco_chamada){
                                    if($preco_chamada["id_tipo_participante"] == $tipo_participante["id"]){
                                        $valor = str_replace(".", ",", $preco_chamada["preco"]);
                                        ?>
                                        <input type="text" name="preco_chamada_tipo_<?php print $tipo_participante["id"]; ?>" value="<?php echo $valor; ?>" class="formulario" style="width:45px; text-align:center; padding-right:2px"/> 
                                        (Ex.: U$ 50,00)
                                    <?php }//if
                                }//foreach
                            }else{?>
                                    <input type="text" name="preco_chamada_tipo_<?php print $tipo_participante["id"]; ?>" value="<?php echo $valor; ?>" class="formulario" style="width:45px; text-align:center; padding-right:2px"/>                                            (Ex.: U$ 50,00)
                            <?php
                            }//else
                            ?>								
                        </td>
                        <td>R$
                            <?php 
                            if(!empty($precos_chamada)){ 
                                foreach($precos_chamada as $preco_chamada){
                                    if($preco_chamada["id_tipo_participante"] == $tipo_participante["id"]){
                                        $valor = str_replace(".", ",", $preco_chamada["preco_reais"]);
                                        ?>
                                        <input type="text" name="preco_reais_chamada_tipo_<?php print $tipo_participante["id"]; ?>" value="<?php echo $valor; ?>" class="formulario" style="width:45px; text-align:center; padding-right:2px"/> (Ex.: R$ 50,00)
                                    <?php }//if
                                }//foreach
                            }else{?>
                                    <input type="text" name="preco_reais_chamada_tipo_<?php print $tipo_participante["id"]; ?>" value="<?php echo $valor; ?>" class="formulario" style="width:45px; text-align:center; padding-right:2px"/>                                            (Ex.: R$ 50,00)
                            <?php
                            }//else
                            ?>								
                        </td>
		        	</tr>
                <?php }//foreach 
            }//if ?>
        </table>
    </div>
    <input type="submit" value="<?php print $GLOBALS["texto_botao"]; ?>"  class="botao_editar"/>
</form>
<script type="application/javascript">
	function mostrar(exibir, id_sub_menu){
		//alert("exibir "+id_sub_menu+": "+exibir);
	
		var sub_menu = document.getElementById(id_sub_menu);
		if(exibir) sub_menu.style.display = "block";
		else sub_menu.style.display = "none";
	}
</script>
