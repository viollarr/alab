<?php
	require("../conexao.php");

	$id_evento = $_SESSION['id_evento'];
?>
<div style="margin-left:30px;">
    <span class="menuinterno">
    	<a href="principal.php"><?php techo('Envio de trabalho', 'Paper submission'); ?></a>
	    &nbsp;|&nbsp;&nbsp;<a href="participante.php"><?php techo('Editar Dados', 'Edit Data'); ?></a>
	    &nbsp;|&nbsp;&nbsp;<a href="resumos.php"><?php techo('Resumos enviados', 'Papers sent'); ?></a>
        &nbsp;<?php 
        // Verificar se o particpante se inscreveu com trabalho.
		// id_tipo_participante != 13 && modalidade_participacao = 1 : (Não ouvinte && com trabalho)
        $sql = "SELECT id_tipo_participante, modalidade_participacao FROM ev_participante 
            WHERE id_evento = '".$_SESSION['id_evento']."' AND id = '".$_SESSION['id_participante']."'";
        $result = mysql_query($sql, $conexao);// or die(mysql_error());
        list($id_tipo_participante, $participante_com_trabalho) = mysql_fetch_array($result);
    
        // Verificar se já pode exibir o Item de Menu CARTA
        if($id_tipo_participante != 13 && $participante_com_trabalho){
        	//if($_SESSION['id_participante'] == 1784){ // Rodrigo Borba
            	echo "|&nbsp;&nbsp;<a href=\"cartaaceite.php\">".stecho('Carta', 'Letter')."</a>&nbsp;";
            //} //if
        } //if
		
        ?>
		|&nbsp;&nbsp;<a href="certificadoparticipacao.php"><?php techo('Certificado de participa&ccedil;&atilde;o', 'Certificate of participation'); ?></a>
        <?php
		
        /**/
        // Verificar se o participante logado é um avaliador de trabalho para este evento
        //if($_SESSION['id_participante'] == 1833 || $_SESSION['id_participante'] == 1784) { // DANIEL COSTA (IMAGINATTO) e Rodrigo Borba
            $sql = "SELECT id FROM ev_avaliacao WHERE id_avaliador = '".$_SESSION['id_participante']."' AND id_evento = {$id_evento}";
            $result = mysql_query($sql, $conexao);
            $num_avaliacoes = mysql_num_rows($result);
            if($num_avaliacoes > 0){ ?>
                |&nbsp;&nbsp;<a href="avaliacao_trabalhos.php"><?php techo('Avaliar trabalhos', 'Paper review'); ?></a>&nbsp;
            <?php }//if 
        //} //if 
        /**/

		// Botão para efetuar o pagamento da inscrição.
		//if($_SESSION['id_participante'] == 1784) : // Rodrigo Borba (comissão) 
			// Verificar se é brasileiro: CPF preenchido.
			$sql = "SELECT cpf
				FROM ev_participante
				WHERE id_evento = {$id_evento} AND id = {$_SESSION['id_participante']}";
			$result = mysql_query($sql, $conexao) or die(mysql_error());
			list($cpf) = mysql_fetch_array($result);
			//echo "CPF: " . $cpf;
			if(!empty($cpf)):
				?>
				|&nbsp;&nbsp;<a href="boleto.php"><?php techo('Pagamento de inscri&ccedil;&atilde;o', 'Registration payment'); ?></a>&nbsp;
				<?php
			endif;
		//endif;
		?>
    </span>
</div>
