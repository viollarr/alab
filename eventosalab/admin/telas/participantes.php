<?php
require_once("conexao.php");
?>
<!-- Para poder visualizar no Dreamweaver -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.destacar_linha:hover{background:#F4F1F3;}

	#btn_exportar_participantes{border-radius: 5px; border:1px solid #666; font-size:12px; padding:3px 5px; color:#069;}
	#btn_exportar_participantes:hover{cursor:pointer; background:#DFDFDF; color:#000000; text-decoration:underline;}
</style>
<?php
$participantes = $GLOBALS["participantes"];
$tipos = $GLOBALS["tipos"];
$id_tipo_participante = $GLOBALS["id_tipo_participante"];
?>
<div style="display:inline">
	Participantes - <a href="controle.php?ctrl=participante&acao=abrir_edicao">Inserir Novo</a>
</div>
<div style="float:right;"><a href="controle.php?ctrl=participante&acao=exportar_gmail" id="btn_exportar_participantes">Exportar para Gmail</a></div>
<br />
<br />
<div style="margin-bottom:20px; margin-top:-5px; border:1px solid #0099cc; padding:10px; background:#fcfcfc">
	<h3>Quantidade de inscritos como: </h3>
    <ul style="margin-left:25px; margin-top:7px;">
	  <?php
      //$total_part_tipo = array();
      foreach($tipos as $tipo){
          $id_tipo_part = $tipo["id"];
          if(($id_tipo_part == 5) && ($_SESSION["id_evento_admin"] == 22)){ continue; }
  
          $count_part_tipo = 0;
          
          $sql = "SELECT COUNT(id) FROM ev_participante 
              WHERE id_evento='".$_SESSION["id_evento_admin"]."' AND id_tipo_participante = '".$id_tipo_part."'
              ORDER BY nome ASC";
          $result = mysql_query($sql, $conexao);
          list($count_part_tipo) = mysql_fetch_array($result);
  
          //$total_part_tipo[$id_tipo_part] = $count_part_tipo;
          
          $item = "<li>";
			$item .= "<a href='controle.php?ctrl=participante&acao=listar&id_tipo_participante=".$id_tipo_part."'>";
			  $item .= $tipo["nome"];
			  $item .= ": <strong>".$count_part_tipo."</strong>";
			$item .= "</a>";
          $item .= "</li>";
		  print $item;
      }//foreach
      ?>
    </ul>
</div>
<table class="tab_admin">
    <?php 
	$k = 1;
	foreach($participantes as $participante){ 
	  if(!empty($id_tipo_participante) && ($participante["id_tipo_participante"] != $id_tipo_participante)) { continue; }
      if(($k-1) % 10 == 0){ ?>
        <tr class="tab_admin_head">
            <td class="col_id" style="width:50px;">#</td>
            <td class="col_id" style="width:50px;">ID</td>
            <td>Nome</td>
            <td>E-mail</td>
			<?php if(empty($id_tipo_participante)) { ?>
                <td>Tipo de Participa&ccedil;&atilde;o</td>
            <?php }//if ?>
            <td class="col_editar">Editar</td>
            <td class="col_deletar">Deletar</td>
            <td class="col_deletar" style="width:85px">Trabalhos</td>
        </tr>
      <?php }//if ?>
      <tr class="destacar_linha">
          <td align="center"><?php echo $k;?></td>
          <td align="center"><?php echo $participante["id"];?></td>
          <td><?php echo mb_strtoupper($participante["nome"]);?></td>
          <td><?php echo mb_strtolower($participante["email"]);?></td>
		  <?php if(empty($id_tipo_participante)) { ?>
            <td>
                <?php 
                if(!empty($tipos)){
                    foreach($tipos as $tipo){
                        if($tipo["id"] == $participante["id_tipo_participante"]) echo $tipo["nome"];
                    }//foreach
                }//if
                
                ?>
            </td>
		  <?php }//if ?>
          <td style="vertical-align:middle"><a href="controle.php?ctrl=participante&acao=abrir_edicao&id_participante=<?php echo $participante["id"];?>">Editar</a></td>
          <td style="vertical-align:middle"><a href="controle.php?ctrl=participante&acao=deletar&id_participante=<?php echo $participante["id"];?>" onclick="return confirma_delecao('Você tem certeza que deseja deletar este participante?');">Deletar</a></td>
          <td style="vertical-align:middle">
              <?php if($participante["possui_trabalho"]){ ?>
                  <a href="controle.php?ctrl=tipo_trabalho&acao=trabalhos_participante&id_participante=<?php echo $participante["id"];?>" >Trabalhos</a>
              <?php }//if 
              else print "<center><b>--</b></center>"; ?>
          </td>
      </tr>
      <?php 
      $k++;
	}//foreach ?>
</table>
<?php /**/ ?>