<?php
$participante = $GLOBALS["participante"];
//echo "Participante clicado e seus trabalhos<br /><pre>"; print_r($participante); echo "</pre><br />"; 
?>

<?php
// Coordenador de Comunicação Coordenada
foreach ($participante['sessoes_coordenadas'] as $sessao) {
    ?>
    <li>
    <?php echo utf8_encode("Coordenador de Sessão"); ?>
        <br /><span class="titulo_trabalho"><?php echo utf8_encode($sessao['titulo']); ?></span>
        <br />
        Presente: 
        <label><input type="radio" name="coordenacao_sessao_<?php echo $sessao['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('sim', '<?php echo $participante['id']; ?>', '<?php echo $sessao['id']; ?>', 'coordenacao_sessao', this)" <?php echo ($sessao['presente'] == 'sim') ? "checked='checked'" : ""; ?> /> Sim</label>
        <label><input type="radio" name="coordenacao_sessao_<?php echo $sessao['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('nao', '<?php echo $participante['id']; ?>', '<?php echo $sessao['id']; ?>', 'coordenacao_sessao', this)" <?php echo ($sessao['presente'] == 'nao') ? "checked='checked'" : ""; ?> /> N&atilde;o</label>
        <img src="telas/imgs/ajax-loader.gif" class="ajax-loader" />
    </li>
<?php } //foreach  ?>

<?php
// Autor/coautor de Comunicação Coordenada
foreach ($participante['comunicacoes_coordenadas'] as $comunicacao_coordenada) {
    ?>
    <li>
    <?php echo utf8_encode("Autor/Coautor de Resumo em Comunicação Coordenada"); ?>
        <br /><span class="titulo_trabalho"><?php echo utf8_encode($comunicacao_coordenada['titulo']); ?></span>
        <br />
        Presente: 
        <label><input type="radio" name="comunicacao_coordenada_<?php echo $comunicacao_coordenada['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('sim', '<?php echo $participante['id']; ?>', '<?php echo $comunicacao_coordenada['id']; ?>', 'comunicacao_coordenada', this)" <?php echo ($comunicacao_coordenada['presente'] == 'sim') ? "checked='checked'" : ""; ?> /> Sim</label>
        <label><input type="radio" name="comunicacao_coordenada_<?php echo $comunicacao_coordenada['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('nao', '<?php echo $participante['id']; ?>', '<?php echo $comunicacao_coordenada['id']; ?>', 'comunicacao_coordenada', this)" <?php echo ($comunicacao_coordenada['presente'] == 'nao') ? "checked='checked'" : ""; ?> /> N&atilde;o</label>
        <img src="telas/imgs/ajax-loader.gif" class="ajax-loader" />
    </li>
<?php } //foreach  ?>

<?php
// Autor/coautor de Comunicação Individual
foreach ($participante['comunicacoes_individuais'] as $comunicacao_individual) {
    ?>
    <li>
    <?php echo utf8_encode("Autor/Coautor de Comunicação Individual"); ?>
        <br /><span class="titulo_trabalho"><?php echo utf8_encode($comunicacao_individual['titulo']); ?></span>
        <br />
        Presente: 
        <label><input type="radio" name="comunicacao_individual_<?php echo $comunicacao_individual['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('sim', '<?php echo $participante['id']; ?>', '<?php echo $comunicacao_individual['id']; ?>', 'comunicacao_individual', this)" <?php echo ($comunicacao_individual['presente'] == 'sim') ? "checked='checked'" : ""; ?> /> Sim</label>
        <label><input type="radio" name="comunicacao_individual_<?php echo $comunicacao_individual['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('nao', '<?php echo $participante['id']; ?>', '<?php echo $comunicacao_individual['id']; ?>', 'comunicacao_individual', this)" <?php echo ($comunicacao_individual['presente'] == 'nao') ? "checked='checked'" : ""; ?> /> N&atilde;o</label>
        <img src="telas/imgs/ajax-loader.gif" class="ajax-loader" />
    </li>
<?php } //foreach  ?>

<?php
// Ouvinte 
if ($participante['ouvinte'] == 'sim') {
    ?>
    <li>
    <?php echo utf8_encode("Ouvinte"); ?>
        <br />
        Presente: 
        <label><input type="radio" name="ouvinte_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('sim', '<?php echo $participante['id']; ?>', '0', 'ouvinte', this)" <?php echo ($participante['presente'] == 'sim') ? "checked='checked'" : ""; ?> /> Sim</label>
        <label><input type="radio" name="ouvinte_<?php echo $participante['id']; ?>" onclick="salvar_presenca_qp4('nao', '<?php echo $participante['id']; ?>', '0', 'ouvinte', this)" <?php echo ($participante['presente'] == 'nao') ? "checked='checked'" : ""; ?> /> N&atilde;o</label>
        <img src="telas/imgs/ajax-loader.gif" class="ajax-loader" />
    </li>
<?php } //if  ?>
