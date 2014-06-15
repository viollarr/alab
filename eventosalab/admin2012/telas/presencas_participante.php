<?php
$participante = $GLOBALS["participante"];
//echo "Participante clicado e seus trabalhos<br /><pre>"; print_r($participante); echo "</pre><br />"; 
?>

<?php
// Poster
foreach ($participante['posteres'] as $poster) {
    ?>
    <li>
    <?php echo utf8_encode("Poster"); ?>
        <br /><span class="titulo_trabalho"><?php echo utf8_encode($poster['titulo']); ?></span>
        <br />
        Presente: 
        <label><input type="radio" name="poster_<?php echo $poster['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca('sim', '<?php echo $participante['id']; ?>', '<?php echo $poster['id']; ?>', 'poster', this)" <?php echo ($poster['presente'] == 'sim') ? "checked='checked'" : ""; ?> /> Sim</label>
        <label><input type="radio" name="poster_<?php echo $poster['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca('nao', '<?php echo $participante['id']; ?>', '<?php echo $poster['id']; ?>', 'poster', this)" <?php echo ($poster['presente'] == 'nao') ? "checked='checked'" : ""; ?> /> N&atilde;o</label>
        <img src="telas/imgs/ajax-loader.gif" class="ajax-loader" />
    </li>
<?php } //foreach  ?>

<?php
// Paper
foreach ($participante['papers'] as $paper) {
    ?>
    <li>
    <?php echo utf8_encode("Paper"); ?>
        <br /><span class="titulo_trabalho"><?php echo utf8_encode($paper['titulo']); ?></span>
        <br />
        Presente: 
        <label><input type="radio" name="paper_<?php echo $paper['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca('sim', '<?php echo $participante['id']; ?>', '<?php echo $paper['id']; ?>', 'paper', this)" <?php echo ($paper['presente'] == 'sim') ? "checked='checked'" : ""; ?> /> Sim</label>
        <label><input type="radio" name="paper_<?php echo $paper['id']; ?>_<?php echo $participante['id']; ?>" onclick="salvar_presenca('nao', '<?php echo $participante['id']; ?>', '<?php echo $paper['id']; ?>', 'paper', this)" <?php echo ($paper['presente'] == 'nao') ? "checked='checked'" : ""; ?> /> N&atilde;o</label>
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
        <label><input type="radio" name="ouvinte_<?php echo $participante['id']; ?>" onclick="salvar_presenca('sim', '<?php echo $participante['id']; ?>', '0', 'ouvinte', this)" <?php echo ($participante['presente'] == 'sim') ? "checked='checked'" : ""; ?> /> Sim</label>
        <label><input type="radio" name="ouvinte_<?php echo $participante['id']; ?>" onclick="salvar_presenca('nao', '<?php echo $participante['id']; ?>', '0', 'ouvinte', this)" <?php echo ($participante['presente'] == 'nao') ? "checked='checked'" : ""; ?> /> N&atilde;o</label>
        <img src="telas/imgs/ajax-loader.gif" class="ajax-loader" />
    </li>
<?php } //if  ?>
