<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administração</title>

<style type="text/css">
body{background-color:#ECECEE; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333333; line-height:20px;}

#content{
	width: 200px; /*tamanho da imagem*/
	height: 200px; /*tamanho da imagem*/
	position: absolute;
	top: 37%;
	left: 47%; 
	margin-left: -100px; /*metade do comprimento da imagem*/
	margin-top: -37px; /*metade da altura da imagem*/
	padding:20px;
	/*border:2px dashed #FFFFFF;*/
}

#content img{margin-bottom:20px;}

#content form{margin:0;}
#content form table{margin:0 auto;}
.formulario{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:13px; color:#000000; border: 1px solid #999999; padding-left:3px; background:#FFFFFF; text-align:center;}

.enviar{font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; font-size:12px; color:#ffffff; background:#0099CC; border: 1px solid #CCCCCC; padding: 1px 10px 2px 10px; cursor:pointer; float:right; margin-top:10px;}
.enviar:hover{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:12px; color:#ffffff; background:#0066CC; border: 1px solid #999999; padding: 1px 10px 2px 10px; cursor:pointer;}

</style>

</head>

<body>
<div id="content">
    <img src="img_index/logo.gif" width="200" height="74"/>
    <form action="controle.php" method="post">
        <input type="hidden" name="logar" value="true">
        <table>
            <tr>
                <td align="right">Login:</td>
                <td><input name="username" type="text" class="formulario" id="username"></td>
            </tr>
            <tr>
                <td align="right">Senha:</td>
                <td><input name="password" type="password" class="formulario" id="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Entrar" class="enviar"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>