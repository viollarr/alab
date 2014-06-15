<?php
class ctrl_new_evento extends ctrl_generico{
	function __construct(){
		$this->id_evento = $_SESSION["id_evento_admin"];
		$this->tipo_evento = $_SESSION["tipo_evento"];
	}
	
	function form(){
		return new_evento;
	}

	function criticarCampos() {

		$error = array();
		$sucesso = array();
		$diretorio_topo = "telas/imgs_topo_eventos/";
		
		if(empty($_POST['editar_evento_alteracao'])){
			if(empty($_POST["titulo"])){
				$error["titulo"] = "Informe um T&iacute;tulo para o evento";
			}
			elseif(self::checkIfExists(array('titulo' => $_POST['titulo']))){
				$error["titulo"] = "Voc&ecirc; n&atilde;o pode cadastrar esse T&iacute;tulo pois j&aacute; existe em nosso cadastro.";
			}
			if(empty($_POST['apelido'])) {
					$error['apelido'] = "Informe um apelido para o Evento";
			}
			elseif(self::checkIfExists(array('apelido' => $_POST['apelido']))){
				$error["titulo"] = "Voc&ecirc; n&atilde;o pode cadastrar esse apelido pois j&aacute; existe em nosso cadastro.";
			}
			if(empty($_FILES['imagem']["name"])) {
					$error['imagem'] = "Voc&ecirc; deve enviar uma imagem para o topo.";
			}
			if(empty($_POST["periodo"])){
				$error["periodo"] = "Informe o per&iacute;odo que ser&aacute; realizado o evento";
			}
			if(empty($_POST["local"])){
				$error["local"] = "Informe o local que ser&aacute; realizado o evento";
			}
			
			if(!count($error)){
				$type_arquivo	= explode("/",$_FILES["imagem"]["type"]);
				$type_arquivo	= $type_arquivo[1];
				if(self::movendoArquivo($_FILES, $diretorio_topo, $_POST['apelido'])){
					if(self::salvar($type_arquivo)){
						$sucesso["mensagem"] = "Evento criado com Sucesso. Acompanhe na listagem ao lado";
						$_SESSION['sucesso'] = $sucesso;
					}else{
						unlink($diretorio_topo.$_POST["apelido"].".".$type_arquivo);
						$error["error"] = "Erro ao cadastrar os valores.";
						$_SESSION['error'] = $error;
					}
				}
				return new_evento;
				
			}
			else{
				$_SESSION['error'] = $error;
				return new_evento;
			}
		}
		else{
			$tipo  = array();
			$value = array();
			
			if(empty($_POST["titulo"])){
				$error["titulo"] = "Informe um T&iacute;tulo para o evento";
			}
			else{
				$tipo[] 	= "titulo";
				$value[] 	= $_POST["titulo"];
			}
			if(empty($_POST['apelido'])) {
					$error['apelido'] = "Informe um apelido para o Evento";
			}
			else{
				$tipo[] 	= 'apelido';
				$value[] 	= $_POST["apelido"];
			}
			if(empty($_POST["periodo"])){
				$error["periodo"] = "Informe o per&iacute;odo que ser&aacute; realizado o evento";
			}
			else{
				$tipo[] 	= 'periodo';
				$value[] 	= $_POST["periodo"];
			}
			if(empty($_POST["local"])){
				$error["local"] = "Informe o local que ser&aacute; realizado o evento";
			}
			else{
				$tipo[] 	= 'local';
				$value[] 	= $_POST["local"];
			}

			if(!count($error)){
				$id_evento = $_POST['id_evento'];
				
				foreach($tipo as $key => $up){
					if($key==0){
						$valores = $up." = '".$value[$key]."'";
					}
					else{
						$valores .= ', '.$up." = '".$value[$key]."'";
					}
				}

				if(!empty($_FILES['imagem']["name"])) {
					$type_arquivo	= explode("/",$_FILES["imagem"]["type"]);
					$type_arquivo	= $type_arquivo[1];
					if(self::movendoArquivo($_FILES, $diretorio_topo, $_POST['apelido'], true)){
						$valores .= ", imagem_topo = '".$_POST['apelido'].".".$type_arquivo."'";
						if(self::editar($valores, $id_evento)){
							$sucesso["mensagem"] = "Evento alterado com Sucesso.";
							$_SESSION['sucesso'] = $sucesso;
						}else{
							$error["error"] = "Erro ao cadastrar os valores.";
							$_SESSION['error'] = $error;
						}
					}
				}
				else{
					$valores .= ", imagem_topo = '".$_POST['imagem_topo']."'";
					if(self::editar($valores, $id_evento)){
						$sucesso["mensagem"] = "Evento alterado com Sucesso.";
						$_SESSION['sucesso'] = $sucesso;
					}else{
						$error["error"] = "Erro ao cadastrar os valores.";
						$_SESSION['error'] = $error;
					}
				}

				return editar_evento;				
			}
			else{
				$_SESSION['error'] = $error;
				return editar_evento;
			}
		}
	}

	function salvar($type_arquivo){
		
		$insert = "INSERT INTO ev_evento (titulo, apelido, imagem_topo, periodo, local) VALUES ('".$_POST['titulo']."', '".$_POST['apelido']."', '".$_POST["apelido"].".".$type_arquivo."', '".$_POST['periodo']."', '".$_POST['local']."')";
		$query = mysql_query($insert);
		
		// pegando o id do novo evento
		$select_evento = "SELECT id FROM ev_evento WHERE titulo = '".$_POST['titulo']."' AND apelido = '".$_POST['apelido']."'";
		$query_evento = mysql_query($select_evento);
		$x = mysql_fetch_array($query_evento);
		
		// inserindo 5 tipos de participantes padroes para os novos eventos
		$insert_tipo[] = "INSERT INTO ev_tipo_participante (id_evento, nome, nome_en, online, isento_inscricao) VALUES ('".$x['id']."', 'Professores/as e pesquisadores/as', 'Teachers and researchers', 'sim', 'nao')";
		$insert_tipo[] = "INSERT INTO ev_tipo_participante (id_evento, nome, nome_en, online, isento_inscricao) VALUES ('".$x['id']."', 'Aluno de P&oacute;s Gradua&ccedil;&atilde;o', 'Graduate Student', 'sim', 'nao')";
		$insert_tipo[] = "INSERT INTO ev_tipo_participante (id_evento, nome, nome_en, online, isento_inscricao) VALUES ('".$x['id']."', 'Aluno de Gradua&ccedil;&atilde;o', 'Undergraduate Student', 'nao', 'nao')";
		//$insert_tipo[] = "INSERT INTO ev_tipo_participante (id_evento, nome, nome_en, online, isento_inscricao) VALUES ('".$x['id']."', 'Ouvintes', 'Auditor', 'sim', 'nao')";
		$insert_tipo[] = "INSERT INTO ev_tipo_participante (id_evento, nome, nome_en, online, isento_inscricao) VALUES ('".$x['id']."', 'Convidado', 'Guest', 'nao', 'sim')";
		$insert_tipo[] = "INSERT INTO ev_tipo_participante (id_evento, nome, nome_en, online, isento_inscricao) VALUES ('".$x['id']."', 'Comiss&atilde;o', 'Committee', 'nao', 'sim')";
		// inserindo 2 tipos de trabalhos padroes para os novos eventos
		$insert_tipo[] = "INSERT INTO ev_evento_tipo_trabalho (id_evento, id_tipo_trabalho) VALUES ('".$x['id']."', 4')";
		$insert_tipo[] = "INSERT INTO ev_evento_tipo_trabalho (id_evento, id_tipo_trabalho) VALUES ('".$x['id']."', '5')";
		// inserindo 10 tipos de perguntas padroes para os novos eventos
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'O resumo apresenta objetivos claros?', '', 4, 1)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'Explicita a fundamentação teórica que embasa a pesquisa?', '', 4, 2)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'Especifica a metodologia utilizada?', '', 4, 3)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'Apresenta resultados obtidos/esperados?', '', 4, 4)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'É relevante para o tema do evento', '', 4, 5)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'O resumo apresenta objetivos claros?', '', 5, 1)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'Explicita a fundamentação teórica que embasa a pesquisa?', '', 5, 2)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'Especifica a metodologia utilizada?', '', 5, 3)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'Apresenta resultados obtidos/esperados?', '', 5, 4)";
		$insert_tipo[] = "INSERT INTO ev_pergunta (id_evento, pergunta, pergunta_en, id_tipo_trabalho, ordem) VALUES ('".$x['id']."', 'É relevante para o tema do evento', '', 5, 5)";

		
		foreach($insert_tipo as $inserindo_tipo){
			$xpto = mysql_query($inserindo_tipo);
		}
		
			return $query;
	}
	
	function editar($update, $id_evento){
		
		$alterar = "UPDATE ev_evento SET ".$update." WHERE id = '".$id_evento."'";
		$query_up = mysql_query($alterar);
		
		$registros = $this->select("SELECT * FROM ev_evento WHERE id = '".$this->id_evento."' ");
		$GLOBALS["editar_evento"] = $registros[0];
				
		return $query_up;
	}

	function movendoArquivo($arquivo, $dir, $nome_arquivo, $editar = false){

		$_UP['pasta'] 		= $dir;
		$_UP['tamanho'] 	= 1024 * 1024 * 2;
		$_UP['largura']		= 990;
		$_UP['altura']		= 215;
		$_UP['extensoes'] 	= array("giff","gif","jpg","png","jpeg","GIF","PNG","JPG","JPEG");
		$_UP['renomeia'] 	= true;
		$_UP['erros'][0] 	= 'Não houve erro';
		$_UP['erros'][1] 	= 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] 	= 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] 	= 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] 	= 'Não foi feito o upload do arquivo';
		$type_arquivo		= explode("/",$arquivo["imagem"]["type"]);
		$type_arquivo		= $type_arquivo[1];
		$dimensões			= getimagesize($arquivo['imagem']['tmp_name']);
		$largura			= $dimensões[0];
		$altura				= $dimensões[1];	

		
		if ($arquivo['imagem']['error'] != 0) {
			$error["error"] = $_UP['erros'][$arquivo['imagem']['error']];
			$_SESSION['error'] = array($error["error"]);
			return false;
		}

	
		if ($_UP['renomeia'] == true) {
			$nome_final = $nome_arquivo.'.'.$type_arquivo;
		}else {
			$nome_final = $arquivo['imagem']['name'];
		}
		if($editar){
			if (array_search($type_arquivo, $_UP['extensoes']) === false) {
				$error["error"] = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
				$_SESSION['error'] =  array($error["error"]);
				return false;
			}elseif (($_UP['largura'] != $largura)&&($_UP['altura'] != $altura)) {
				$error["error"] = "Por favor, envie arquivos com as seguintes dimens&otilde;es: 990 X 215 px";
				$_SESSION['error'] =  array($error["error"]);
				return false;
			}elseif ($_UP['tamanho'] < $arquivo['imagem']['size']) {
				$error["error"] = "O arquivo enviado &eacute; muito grande, envie arquivos de at&eacute; 2Mb.";
				$_SESSION['error'] =  array($error["error"]);
				return false;
			}else {
				if (move_uploaded_file($arquivo['imagem']['tmp_name'], $_UP['pasta'] . $nome_final)) {
					return true;
				}else{
					$error["error"] = "N&atilde;o foi poss&iacute;vel enviar o arquivo, tente novamente";
					$_SESSION['error'] =  array($error["error"]);
					return false;
				}
			
			}	
		}
		else{
			if(file_exists($_UP['pasta'].$nome_final)){
				$error["error"] = "Uma imagem com o mesmo nome j&aacute; encontra-se em nosso diret&oacute;rio.";
				$_SESSION['error'] =  array($error["error"]);
				return false;
			}elseif (array_search($type_arquivo, $_UP['extensoes']) === false) {
				$error["error"] = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
				$_SESSION['error'] =  array($error["error"]);
				return false;
			}elseif (($_UP['largura'] != $largura)&&($_UP['altura'] != $altura)) {
				$error["error"] = "Por favor, envie arquivos com as seguintes dimens&otilde;es: 990 X 215 px";
				$_SESSION['error'] =  array($error["error"]);
				return false;
			}elseif ($_UP['tamanho'] < $arquivo['imagem']['size']) {
				$error["error"] = "O arquivo enviado &eacute; muito grande, envie arquivos de at&eacute; 2Mb.";
				$_SESSION['error'] =  array($error["error"]);
				return false;
			}else {
				if (move_uploaded_file($arquivo['imagem']['tmp_name'], $_UP['pasta'] . $nome_final)) {
					return true;
				}else{
					$error["error"] = "N&atilde;o foi poss&iacute;vel enviar o arquivo, tente novamente";
					$_SESSION['error'] =  array($error["error"]);
					return false;
				}
			
			}	
		}
		
	}
	function checkIfExists(array $where) {
		if(!empty($where['titulo'])){
			$select = "SELECT titulo FROM ev_evento WHERE titulo = '".$where["titulo"]."'";	
		}
		if(!empty($where["apelido"])){
			$select = "SELECT apelido FROM ev_evento WHERE titulo = '".$where["apelido"]."'";	
		}
		
		$query_exists = mysql_query($select);
		$rows_exists = mysql_num_rows($query_exists);
		
		return (boolean)$rows_exists;
	}
	
}
?>