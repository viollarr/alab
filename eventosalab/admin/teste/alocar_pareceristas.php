<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<?php
$tipos_trabalho   = $GLOBALS["tipos_trabalho"];
$linhas_tematicas = $GLOBALS["linhas_tematicas"];
$avaliadores      = $GLOBALS["avaliadores"];
?>
<form name="form1" method="post" action="">
  Modalidades de Trabalhos
  <hr>
  
  	<?php
	foreach($tipos_trabalho as $tipo_trabalho){
		?>
	    <label><input type="checkbox" name="tipos_trabalho[]" id="tipos_trabalho[]" value="<?=$tipo_trabalho["id"]?>">&nbsp;<?=$tipo_trabalho["nome"]?></label>
        <br />
        <?php
	}//foreach
	?>
  
  &nbsp;
  <hr>
  &nbsp;
  Linhas Tem&aacute;ticas
  <hr>
  
  	<?php
	foreach($linhas_tematicas as $linha_tematica){
		?>
	    <label><input type="checkbox" name="linhas_tematicas[]" id="linhas_tematicas[]" value="<?=$linha_tematica["id"]?>">&nbsp;<?=$linha_tematica["titulo"]?></label>
        <br />
        <?php
	}//foreach
	?>
  
  &nbsp;
  <hr>
  &nbsp;
  Doutores
  <hr>
  
  	<?php
	foreach($avaliadores as $avaliador){
		?>
	    <label><input type="checkbox" name="avaliadores[]" id="avaliadores[]" value="<?=$avaliador["id"]?>">&nbsp;<?=$avaliador["nome"]?></label>
        <br />
        <?php
	}//foreach
	?>
  
  &nbsp;
  <hr>
  &nbsp;
  
    <input type="submit" name="salvar" id="salvar" value="Submit">
  
  
</form>
