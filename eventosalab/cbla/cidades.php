<?php
include ("../conexao.php");
$cod_estado = utf8_decode($_POST['estado']);

$sql_cidades = "SELECT * FROM ev_cidades WHERE estados_cod_estados='$cod_estado' ORDER BY capital DESC , nome ASC";
$qr_cidades = mysql_query($sql_cidades) or die(mysql_error());
if(mysql_num_rows($qr_cidades) == 0){
   echo  '<option value="0">'.htmlentities('Selecione o estado').'</option>';
}else{
   //echo  '<option value="0">'.htmlentities('Selecione').'</option>';
   while($ln_cidades = mysql_fetch_assoc($qr_cidades)){
      echo '<option value="'.$ln_cidades['cod_cidades'].'">'.htmlentities($ln_cidades['nome']).'</option>';
   }
}
?>