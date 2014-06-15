<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trabalhos Sem Autor</title>
</head>

<body>

<?php
require_once("../conexao.php");

$sql = "SELECT * FROM ev_resumo WHERE autor < 1 AND id_evento = 22";
$result = mysql_query($sql, $conexao);

?>
Tabela
<hr />
<table width="100%" border="1" >
    <tr style="font-weight:bold; background:#CCCCCC;">
        <td>ID</td>
        <td>T&iacute;tulo</td>
        <td>Modalidade de trabalho</td>
        <td>ID Co-Autor</td>
    </tr>
	<?php
    while($linha = mysql_fetch_array($result)){
        /*
        print "<pre>";
            print_r($linha);
        print "</pre>";
        print "<hr>";
        */
        ?>
        <tr>
            <td><?php print $linha["id"]; ?></td>
            <td><?php print utf8_encode( $linha["titulo"] ); ?></td>
            <td>
				<?php 
					switch($linha["id_tipo_trabalho"]){
						 case 1:
							$sql = "SELECT titulo_sessao FROM ev_simposio WHERE id = ".$linha["id_simposio"];
							$res = mysql_query($sql, $conexao);
							list($titulo_sessao) = mysql_fetch_array($res);
						 	print "Resumo em Simpósio: " . utf8_encode($titulo_sessao);
						 	break;
						 case 2:
							$sql = "SELECT titulo_sessao FROM ev_comunicacao_coordenada WHERE id = ".$linha["id_comunicacao_coordenada"];
							$res = mysql_query($sql, $conexao);
							list($titulo_sessao) = mysql_fetch_array($res);
						 	print "Resumo em Comunicação Coordenada: " . utf8_encode($titulo_sessao);
						 	break;
						 case 3:
						 	print "Comunicação Individual";
						 	break;
						 case 4:
						 	print "Pôster";
						 	break;
					}//switch
				?>
            </td>
            <td><?php print $linha["co_autor"]; ?></td>
        <?php
    }//while
    ?>
</table>
</body>
</html>
