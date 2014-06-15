<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php 
$simposios = $GLOBALS["simposios"];
$topicos = $GLOBALS["topicos"];
$resumos = $GLOBALS["resumos"];
$linhas_tematicas = $GLOBALS["linhas_tematicas"];
$participantes = $GLOBALS["participantes"];
?>
Relat&oacute;rio de Simp&oacute;sios
<br />
<br />
<?php 
if(!empty($simposios)){
	foreach($simposios as $simposio){ ?>
        <hr style="border-bottom:#0066cc 2px dotted; margin:20px 0px;" />
		<div style="margin-bottom:10px;">
        	Tópico: <?php 
				if(!empty($topicos)){
					foreach($topicos as $topico){
						if($topico["id"] == $simposio["id_topico"]) echo $topico["nome"];
					}
				}
			?>
        </div>
        <div style="text-transform:uppercase; font-weight:bold; margin-bottom:20px;"><?php echo $simposio["titulo_sessao"]; ?></div>
        <div style="margin-bottom:10px;">
			<?php 
			$sql = "SELECT p.nome, p.instituicao FROM ev_simposio_coordenador sc, ev_participante p
				WHERE 
					sc.id_simposio = '".$simposio["id"]."' 
					AND sc.id_participante = p.id
				ORDER BY ordem ASC";
			$result = mysql_query($sql, $conexao) or trigger_error(mysql_error(), E_USER_ERROR);
			$coordenadores = array();
			while($linha = mysql_fetch_array($result)){
				array_push($coordenadores, $linha);
			} //while
			if(!empty($coordenadores)){
				foreach($coordenadores as $coordenador){
					echo $coordenador["nome"];
					echo "<br />".$coordenador["instituicao"];
					echo "<br />";
				}//foreach
			}//if
			?>
        </div>
        <div style="margin-bottom:10px; text-align:justify;"><strong>Resumo:</strong> <?php echo $simposio["resumo_sessao"]; ?></div>
        <div style="margin-bottom:30px;"><strong>Palavras-chave:</strong> <?php echo $simposio["palavras_chave_sessao"]; ?></div>
        <div style="margin-left:50px">
			<?php
            if(!empty($resumos)){
                foreach($resumos as $resumo){ 
                    if( $resumo["id_simposio"] == $simposio["id"] ){ ?>
                        <div style="text-transform:uppercase; font-weight:bold; margin-bottom:20px;"><?php echo $resumo["titulo"]; ?></div>
                        <div style="margin-bottom:10px;">
                            <?php 
                                if(!empty($participantes)){
                                    foreach($participantes as $participante){
                                        if($participante["id"] == $resumo["autor"]) {
                                            echo $participante["nome"];
                                            echo "<br />".$participante["instituicao"];
                                        }//if
                                    }//foreach
                                    foreach($participantes as $participante){
                                        if($participante["id"] == $resumo["co_autor"]) {
                                            echo "<br />".$participante["nome"];
                                            echo "<br />".$participante["instituicao"];
                                        }//if
                                    }//foreach
                                }//if
                            ?>
                        </div>
                        <div style="margin-bottom:10px; text-align:justify;"><strong>Resumo:</strong> <?php echo $resumo["resumo"]; ?></div>
                        <div style="margin-bottom:30px;"><strong>Palavras-chave:</strong> <?php echo $resumo["palavras_chave"]; ?></div>
                    <?php }//if
                }//foreach 
            } //if ?>
		</div>
	<?php }//foreach 
} //if
?>
<br />
<a href="#topo" style="float:right;">Topo</a>