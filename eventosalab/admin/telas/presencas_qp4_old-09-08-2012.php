<?php
$participantes = $GLOBALS["participantes"];

/*
  print "<pre>";
  print_r($participantes);
  print "</pre>";
  /* */
?>
<script src="telas/js/jquery-1.4.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.exibir_presencas').click(function(){
            //alert('exibir presencas deste participante');
            
            var $id_participante = $(this).parent().find('.id_participante').val();
            //alert('id_participante: ' + $id_participante);

            // Fechar todos
            $('.presencas').slideUp("slow");
            $('.exibir_presencas').text('Exibir presenças');

            // Fechar se estiver aberto
            if($('#presencas_' + $id_participante).css("display") == 'block'){
                $(this).text('Exibir presenças');
                $('#presencas_' + $id_participante).slideUp("slow");
            }
            // Abrir se estiver fechado
            else{
                $(this).text('Carregando informações...');
                $.ajax({
                    type : "POST",
                    cache : false,
                    url : "<?php echo 'controle.php?ctrl=presenca&acao=presencas_qp4_participante'; ?>",
                    data : {id_participante: $id_participante},
                    success: function($data) {
                        //alert('dados retornados: ' + data);
                        //alert('id_participante: ' + $id_participante);
                        var $presencas = $("#presencas_" + $id_participante + "");
                        $presencas.html($data);
                        $presencas.slideDown("slow");
                        $presencas.parent().find('.exibir_presencas').text('Esconder presenças');
                    }
                });
            } //else
        });
    });
    
    function salvar_presenca_qp4($presente, $id_participante, $id_trabalho, $tipo_certificado){
        //alert('presente: ' + $presente + ' | participante: ' + $id_participante + ' | trabalho: ' + $id_trabalho + ' | tipo_certificao:  ' + $tipo_certificado);
        $.ajax({
            type : "POST",
            cache : false,
            url : "<?php echo 'controle.php?ctrl=presenca&acao=salvar_presenca_qp4'; ?>",
            data : {
                presente: $presente, 
                id_participante: $id_participante, 
                id_trabalho: $id_trabalho, 
                certificado:  $tipo_certificado
            },
            success: function($retorno) {
                //alert('Retorno: ' + $retorno);
                if(!$retorno){
                    alert('Não foi possível salvar a presença.');
                }
                else alert('Presença salva com sucesso.');
            }
        });
    }
</script>

<style type="text/css">
    .destacar_linha:hover{background:#F4F1F3;}

    .participante{float: left;}
    .exibir_presencas{float: right; border: 1px solid #CCC; padding: 0px 5px; border-radius: 5px;}
    .exibir_presencas:hover{cursor: pointer;}

    .presencas{margin-top: 10px; margin-left: 15px; display: none;}
    .presencas li{margin-top: 10px;}
    .presencas li label{padding-left: 10px;}
    .presencas li label:hover{cursor: pointer;}

    .titulo_trabalho{text-transform: uppercase;}
</style>

<div>Controle de Presen&ccedil;as</div>
<br />
<?php if (!empty($GLOBALS["msg_ctrl_presenca"])) { ?>
    <div style="margin-bottom:10px; margin-top:10px; border:1px solid #0099cc; padding:10px; background:#f1f1f1"><?= $GLOBALS["msg_ctrl_presenca"] ?></div>
<?php } //if ?>
<table class="tab_admin">
    <tr class="tab_admin_head">
        <td style="width:60px; text-align:center;">#</td>
        <td style="width:60px; text-align:center;">ID</td>
        <td>Participante</td>
    </tr>
    <?php
    $i = 1;
    foreach ($participantes as $participante) {
        ?>
        <tr class="destacar_linha">
            <td style="text-align:center;"><?php echo $i; ?></td>
            <td style="text-align:center;"><?php echo $participante['id']; ?></td>
            <td>
                <div class="participante"><?php echo $participante['nome']; ?></div>
                <div class="exibir_presencas">Exibir presenças</div>
                <div style="clear:both"></div>
                <input type="hidden" name="id_participante" class="id_participante" value="<?php echo $participante['id']; ?>" />
                <ul class="presencas" id="presencas_<?php echo $participante['id']; ?>"></ul>
            </td>
        </tr>
        <?php if ($i % 10 == 0) { ?>
            <tr class="tab_admin_head">
                <td style="width:60px; text-align:center;">#</td>
                <td style="width:60px; text-align:center;">ID</td>
                <td>Participante</td>
            </tr>
            <?php
        }//if 
        $i++;
    } //foreach 
    ?>
</table>