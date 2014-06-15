<?php
	require_once("conexao.php");
	require_once("check_user.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
	$idparticipante=$_SESSION['id_participante'];
	
     $html = '
      <html>
      <head></head>
      <style>
      h1 {color:#333; size:20px; margin-bottom:5px;}
      h3 {color:#222;}
      </style>
      <body>
     
     <h1>Certificado</h1>
     <h3>Exemplo certificado de participação.</h3>
	 <h1>'.$idparticipante.'</h1>
     
     </body>
     </html>
	 ';
     ?>
<?php
	 
     require_once("dompdf/dompdf_config.inc.php");
      
     $dompdf = new DOMPDF();
     $dompdf->load_html($html);
     $dompdf->set_paper('letter', 'landscape');
     $dompdf->render();
     $dompdf->stream("carta-aceite-".$idparticipante.".pdf");
?>
</body>
</html>
