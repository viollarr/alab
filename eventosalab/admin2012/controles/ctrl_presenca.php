<?php
class ctrl_presenca extends ctrl_generico {

    function __construct() {
        $this->id_evento = $_SESSION["id_evento_admin"];
        //$this->tabela = "ev_evento";

    }

    /**
     * Apenas chama a tela que exibe as demais opcões.
     */
    function presencas() {

        /* Participantes */
        $sql = "SELECT ev.id, us.name FROM ev_participante ev, jos_users us WHERE ev.id_evento='".$this->id_evento."' AND ev.id_associado_alab = us.id ORDER BY us.name ASC";
        $result = mysql_query($sql);
        $participantes = array();
        while ($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {
            // Adiciona essa linha de registro na variável que será passada para a TELA
            array_push($participantes, $linha);
        } //while
        $GLOBALS["participantes"] = $participantes;

        return "presencas";
    }

    function presencas_participante() {
        //////////////////////////////////////
        // Classe de avaliação de trabalhos //
        //////////////////////////////////////
        require_once("controles/ctrl_avaliacao.php");
        $ctrl_avaliacao = new ctrl_avaliacao();

        ////////////////////////////////////
        // ID do participante selecionado //
        ////////////////////////////////////
        $id_participante = (int) $_POST['id_participante'];

        //////////////////
        // PARTICIPANTE //
        //////////////////
        //$participante = array();
        $sql = "SELECT part.id, us.name, pre.presente, 
            CASE part.id_tipo_participante 
                WHEN 13 THEN 'sim'
                ELSE 'nao'
            END AS ouvinte
            FROM ev_participante AS part, jos_users us
            LEFT JOIN ev_presenca AS pre ON pre.id_participante = '{$id_participante}'
                AND pre.id_evento = '{$this->id_evento}' 
                AND pre.tipo = 'ouvinte' 
            WHERE 
                part.id_evento='" . $this->id_evento . "' 
                AND part.id = " . $id_participante . " 
				AND part.id_associado_alab = us.id
            LIMIT 1";
        //echo "SQL: gerada participante: " . $sql;
        $result = mysql_query($sql);
        $participante = mysql_fetch_array($result, MYSQL_ASSOC);
		

        ////////////////////////////////////////////
        // POSTER //
        ////////////////////////////////////////////
        // Pegar todas comunicações individuais deste participante
        $sql = "SELECT resumo.id, resumo.titulo, p.presente 
                FROM ev_resumo resumo, ev_participante_resumo participante_resumo 
                LEFT JOIN ev_presenca p ON participante_resumo.id_resumo = p.id_trabalho 
                    AND p.id_evento = '{$this->id_evento}' 
                    AND p.tipo = 'poster' 
                    AND p.id_participante = '{$id_participante}'
                WHERE participante_resumo.id_participante = $id_participante
                    AND participante_resumo.id_resumo = resumo.id
                    AND resumo.id_tipo_trabalho = 4
                ORDER BY resumo.titulo ASC";
        //echo "<br />SQL (ctrl_presenca): " . $sql . '<br />';
        $result = mysql_query($sql);
        $participante['posteres'] = array();
        while ($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {
            // Verificar se foram aceitos, e caso SIM,
            // acrescentar no array de comunica��es individuais deste participante
            if ($ctrl_avaliacao->aceito($linha['id'], 'poster')) {
                //echo "Trabalho Aceito";
                $participante['posteres'][] = $linha;
            }//if
        }//while
		
        ////////////////////////////////////////////
        // PAPER //
        ////////////////////////////////////////////
        // Pegar todos os trabalhos em comunicação coordenada deste participante
        $sql = "SELECT resumo.id, resumo.titulo, p.presente 
                FROM ev_resumo resumo, ev_participante_resumo participante_resumo
                LEFT JOIN ev_presenca p ON participante_resumo.id_resumo = p.id_trabalho 
                    AND p.id_evento = '{$this->id_evento}' 
                    AND p.tipo = 'paper' 
                    AND p.id_participante = '{$id_participante}'
                WHERE participante_resumo.id_participante = $id_participante
                        AND participante_resumo.id_resumo = resumo.id
                        AND resumo.id_tipo_trabalho = 5
                ORDER BY resumo.titulo ASC";
        $result = mysql_query($sql);
        $participante['papers'] = array();
        while ($linha = mysql_fetch_array($result, MYSQL_ASSOC)) {
            // Verificar se foram aceitos, e caso SIM,
            // acrescentar no array de resumo em coordenada deste participante
            if ($ctrl_avaliacao->aceito($linha['id'], 'paper')) {
                //echo "Trabalho Aceito";
                $participante['papers'][] = $linha;
            }//if
        }//while

        $GLOBALS["participante"] = $participante;

        //echo "presencas_qp4_participante()";
        require_once("telas/presencas_participante.php");

        exit();
    }

    function salvar() {
        //////////////////////////////////
        // Conexão com o banco de dados //
        //////////////////////////////////
        ////////////////////////////////////
        // ID do participante selecionado //
        ////////////////////////////////////
        $id_participante = (int) $_POST['id'];

        /*
          print "POST: <pre>";
          print_r($_POST);
          print "</pre>";
          /* */

        // DELETANDO PRESENÇAS ANTERIORES PARA PODER CADASTRAR AS NOVAS.
        $sql = "DELETE FROM ev_presenca WHERE id_participante = '$id_participante' AND id_evento='" . $this->id_evento . "' ";
        mysql_query($sql); // or die(mysql_error());
        // OUVINTE
        if (!empty($_POST['ouvinte'])) {
            $ouvinte_presente = $_POST['ouvinte'];
            $values[] = "('" . $this->id_evento . "', '$id_participante', '0', 'ouvinte', '$ouvinte_presente')";
        } //if
        // PÔSTERES
        $posteres = $_POST['posteres'];
        if (is_array($posteres)) {
            foreach ($posteres as $id_trabalho) {
                $presente = addslashes($_POST["poster_" . $id_trabalho]);
                $values[] = "('" . $this->id_evento . "', '$id_participante', '$id_trabalho', 'poster', '$presente')";
            } //foreach
        } //if
		
		$papers = $_POST['papers']; 
		if(is_array($papers)){
			foreach($papers as $id_trabalho){
				$presente = addslashes($_POST["paper_" . $id_trabalho]);
				$values[] = "('".$this->id_evento."', '$id_participante', '$id_trabalho', 'papers', '$presente')";
			} //foreach
		} //if

        // Concatenando os values para inserir no banco de dados
        $values = implode(", ", $values);

        $sql = "INSERT INTO ev_presenca(id_evento, id_participante, id_trabalho, tipo, presente) VALUES " . $values;
        /*
          print "SQL: <pre>";
          print_r($sql);
          print "</pre>";
          /* */

        mysql_query($sql); // or die(mysql_error());
        if (mysql_affected_rows() > 0)
            $GLOBALS['msg_ctrl_presenca'] = "Presen&ccedil;a(s) cadastrada(s) com sucesso.";
        else
            $GLOBALS['msg_ctrl_presenca'] = "N&atilde;o foi poss&iacute;vel cadastrar a(s) presen&ccedil;a(s).";
        return $this->presencas();

        //exit("<hr />ctrl_presenca");
    }

    function salvar_presenca() {

        // Vari�veis usadas para seguran�a.
        $presencas_possiveis = array('sim', 'nao');
        $certificados_possiveis = array('poster', 'paper', 'ouvinte');

        // Verificando se o valor de presen�a passado � v�lido.
        if (in_array($_POST['presente'], $presencas_possiveis))
            $presente = $_POST['presente'];
        else {
            echo false;
            exit();
        }

        //echo "Certificado clicado: " . $_POST['certificado'];
        // Verificando se o tipo de certificado passado � v�lido.
        if (in_array($_POST['certificado'], $certificados_possiveis))
            $certificado = $_POST['certificado'];
        else {
            echo false;
            exit();
        }

        // Verificando se o id de participante passado � v�lido.
        if (!empty($_POST['id_participante']))
            $id_participante = (int) $_POST['id_participante'];
        else {
            echo false;
            exit();
        }

        // Pegando o id do trabalho caso a presen�a seja na apresenta��o de algum trabalho.
        $id_trabalho = (int) $_POST['id_trabalho'];

        //exit("salvar_presenca_qp4()");
        // Verificar se a presen�a para este participante j� foi marcada...
        $sql = "SELECT * FROM ev_presenca
                WHERE 
                    id_evento = '{$this->id_evento}'
                    AND id_participante = '{$id_participante}'
                    AND id_trabalho = '{$id_trabalho}'
                    AND tipo = '{$certificado}' ";

        //echo " | SQL gerada: " . $sql;
        // ... se sim, atualizar.
        if (mysql_num_rows(mysql_query($sql)) > 0)
            $sql = "UPDATE ev_presenca
                    SET 
                        presente = '{$presente}',
                        modificado = NOW()
                    WHERE 
                        id_evento = '{$this->id_evento}'
                        AND id_participante = '{$id_participante}'
                        AND id_trabalho = '{$id_trabalho}'
                        AND tipo = '{$certificado}' ";
        else
            $sql = "INSERT INTO ev_presenca(id_evento, id_participante, id_trabalho, tipo, presente) 
                    VALUE ('{$this->id_evento}', '{$id_participante}', '{$id_trabalho}', '{$certificado}', '{$presente}')";

        //echo "SQL: " . $sql . " | ";

        if (mysql_query($sql))
            echo true;
        else
            echo false;

        // Precisa fazer isso, pois do contr�rio ir� retornar para o controller principal.
        exit();
    }

    function debatedores_simposio() {
        // Conexão com o banco de dados
        // Participantes 
        $sql = "SELECT id, nome FROM ev_participante WHERE id_evento='" . $this->id_evento . "' ORDER BY nome ASC";
        $result = mysql_query($sql);
        $debatedores = array();
        while ($participante = mysql_fetch_array($result, MYSQL_ASSOC)) {
            // Verificar se é debatedor de algum simpósio
            $sql_simposios = "SELECT id, titulo_sessao
					FROM ev_simposio 
					WHERE 
						id_evento='" . $this->id_evento . "' 
						AND (id_participante_debatedor = " . $participante['id'] . " OR id_participante_debatedor_2 = " . $participante['id'] . ") 
					ORDER BY titulo_sessao ASC";
            $result_simposios = mysql_query($sql_simposios);
            // Se for debatedor de algum simpósio...
            if (mysql_num_rows($result_simposios) > 0) {
                // Salvar dados do(s) simpósio(s) do(s) qual(is) este participante é debatedor
                while ($simposio = mysql_fetch_array($result_simposios, MYSQL_ASSOC)) {

                    // Presenças
                    $sql_presencas = "SELECT presente FROM ev_presenca 
						WHERE 
							id_evento='" . $this->id_evento . "' 
							AND id_participante = " . $participante['id'] . " 
							AND tipo = 'debatedor_simposio'
							AND id_trabalho = '" . $simposio['id'] . "' ";
                    $result_presenca = mysql_query($sql_presencas);
                    $linha_presenca = mysql_fetch_assoc($result_presenca);
                    // Salvando a presença deste debatedor (participante) para este simpósio
                    $simposio['presenca'] = $linha_presenca['presente'];

                    // Salvando os simpósios do debatedor com as respectivas presenças
                    $participante['simposios'][] = $simposio;
                }//while
                // Array de debatedores
                $debatedores[] = $participante;
            }//if
        } //while

        /*
          print "<br /><br />(ctrl_presenca) Debatedores: <pre>";
          print_r($debatedores);
          print "</pre>";
          /* */

        //$debatedores[$i]['nome'];
        //$debatedores[$i]['simpósio']['titulo_sessao'];
        //$debatedores[$i]['simpósio']['presenca'];

        $GLOBALS["debatedores"] = $debatedores;
        return "debatedores_simposio";
    }

//function

    function salvar_presencas_debatedores_simposio() {
        // Conexão com o banco de dados


        /*
          print "<br /><br />(ctrl_presenca) Presenças: <pre>";
          print_r($_POST['presencas']);
          print "</pre>";
          /* */

        foreach ($_POST['presencas'] as $linha_presenca) {
            $arr_presenca = explode("|", $linha_presenca);
            $linha = (int) $arr_presenca[0];
            $id_participante = (int) $arr_presenca[1];
            $id_simposio = (int) $arr_presenca[2];
            $presenca = '';
            if ($_POST["presenca_" . $linha] == 'sim')
                $presenca = 'sim';
            if ($_POST["presenca_" . $linha] == 'nao')
                $presenca = 'nao';

            if (!empty($presenca)) {
                // Verificar se já tem presença cadastrada para debatedor de simpósio.
                // Caso tenha, faz o update se não faz o insert.
                $sql_presenca_anterior = "SELECT * FROM ev_presenca 
					WHERE 
						id_evento = '" . $this->id_evento . "'
						AND id_participante = '" . $id_participante . "'
						AND id_trabalho = '" . $id_simposio . "'
						AND tipo = 'debatedor_simposio' ";
                $result_presenca_anterior = mysql_query($sql_presenca_anterior);
                // Update
                if (mysql_num_rows($result_presenca_anterior) > 0) {
                    /* echo "<hr>" . */$sql = "UPDATE ev_presenca
						SET 
							presente = '" . $presenca . "'
						WHERE
							id_evento = '" . $this->id_evento . "'
							AND id_participante = '" . $id_participante . "'
							AND id_trabalho = '" . $id_simposio . "'
							AND tipo = 'debatedor_simposio' ";
                } // if
                // Insert
                else {
                    /* echo "<hr>" . */$sql = "INSERT INTO ev_presenca(id_evento, id_participante, id_trabalho, tipo, presente) 
						VALUES ('" . $this->id_evento . "', '" . $id_participante . "', '" . $id_simposio . "', 'debatedor_simposio', '" . $presenca . "')";
                }//else
                mysql_query($sql) or die(mysql_error());
            }
        } // foreach

        $GLOBALS['msg_ctrl_presenca'] = "Presen&ccedil;a(s) cadastrada(s) com sucesso.";
        return $this->debatedores_simposio();
    }

    private function pr($label = '', $var) {
        ?>
        <div>
            <?php
            $label = utf8_encode($label);
            echo "{$label}: <pre>";
            print_r($var);
            echo "</pre><br/>";
            ?>
        </div>
        <?php
    }

//function 
    ////////////////////////////////////////////////////////////////////////
    // Usada para popular a tabela presenca com valores 'sim' para todos. //
    //               ---> USAR COM MUITA CAUTELA!!! <---                  //
    ////////////////////////////////////////////////////////////////////////
    /*
      function popular_presencas(){


      // Participantes
      $sql = "SELECT id, nome, id_tipo_participante FROM ev_participante WHERE id_evento='".$this->id_evento."' ORDER BY nome ASC";
      $result = mysql_query($sql);
      $participantes = array();
      while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
      // Adiciona essa linha de registro na variável que será passada para a TELA
      array_push($participantes, $linha);
      } //while


      //////////////////////////////////////
      // Classe de avaliação de trabalhos //
      //////////////////////////////////////
      require_once("controles/ctrl_avaliacao.php");
      $ctrl_avaliacao = new ctrl_avaliacao();


      foreach($participantes as $participante){
      $values = array();

      /////////////
      // OUVINTE //
      /////////////
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '0', 'ouvinte', 'sim')";


      ///////////////////////////////////
      // COMISSÃO ACADÊMICO-CIENTÍFICA //
      ///////////////////////////////////
      // id_tipo_participante: 10
      if($participante['id_tipo_participante'] == 10){
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '0', 'comissao', 'sim')";
      }


      //////////////////////////
      // COORDENAÇÃO SIMPÓSIO //
      //////////////////////////
      $simposios_coordenados = array();
      // Pegar simpósios cooordenados por este participante
      $sql = "SELECT s.id, s.titulo_sessao
      FROM ev_simposio s INNER JOIN ev_simposio_coordenador sc
      ON s.id = sc.id_simposio
      WHERE
      sc.id_participante = ".$participante['id']."
      AND s.id_evento = ".$this->id_evento."
      ";
      $result = mysql_query($sql);
      while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'coordenacao_simposio', 'sim')";
      }//while


      //////////////////////////
      // TRABALHO EM SIMPÓSIO //
      //////////////////////////
      $trabalhos_em_simposio = array();
      // Pegar trabalhos em simpósio deste participante
      $sql = "SELECT id, titulo
      FROM ev_resumo
      WHERE
      id_evento='".$this->id_evento."'
      AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
      AND id_tipo_trabalho = 1
      AND id_simposio > 0
      ORDER BY titulo ASC";
      $result = mysql_query($sql);
      while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'trabalho_em_simposio', 'sim')";
      }//while


      /////////////////////////////////////////////////
      // COORDENAÇÃO DE SESSÃO [COMUNIC. COORDENADA] //
      /////////////////////////////////////////////////
      $coordenadas = array();
      // Pegar simpósios cooordenados por este participante
      $sql = "SELECT id, titulo_sessao
      FROM ev_comunicacao_coordenada
      WHERE
      id_coordenador = ".$participante['id']."
      AND id_evento = ".$this->id_evento."
      ";
      $result = mysql_query($sql);
      while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'coordenacao_sessao', 'sim')";
      }//while


      ////////////////////////////////////////////
      // APRESENTAÇÃO DE COMUNICAÇÃO INDIVIDUAL //
      ////////////////////////////////////////////
      $comunicacoes_individuais = array();
      // Pegar todas comunicações individuais deste participante
      $sql = "SELECT id, titulo
      FROM ev_resumo
      WHERE
      id_evento='".$this->id_evento."'
      AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
      AND id_tipo_trabalho = 3
      ORDER BY titulo ASC";
      $result = mysql_query($sql);
      while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
      // Verificar se foram aceitos, e caso SIM,
      // acrescentar no array de pôsteres deste participante
      if($ctrl_avaliacao->aceito($linha['id'], 'comunicacao_individual')){
      //echo "Trabalho Aceito";
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'comunicacao_individual', 'sim')";
      }//if
      }//while
      $participante['comunicacoes_individuais'] = $comunicacoes_individuais; // array


      ////////////////////////////////////////////
      // APRESENTAÇÃO DE COMUNICAÇÃO COORDENADA //
      ////////////////////////////////////////////
      $comunicacoes_coordenadas = array();
      // Pegar todos os trabalhos em comunicação coordenada deste participante
      $sql = "SELECT id, titulo
      FROM ev_resumo
      WHERE
      id_evento='".$this->id_evento."'
      AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
      AND id_tipo_trabalho = 2
      AND id_comunicacao_coordenada > 0
      ORDER BY titulo ASC";
      $result = mysql_query($sql);
      while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
      // Verificar se foram aceitos, e caso SIM,
      // acrescentar no array de pôsteres deste participante
      if($ctrl_avaliacao->aceito($linha['id'], 'resumo_em_coordenada')){
      //echo "Trabalho Aceito";
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'comunicacao_coordenada', 'sim')";
      }//if
      }//while


      ////////////////////////////
      // APRESENTAÇÃO DE PÔSTER //
      ////////////////////////////
      $posteres = array();
      // Pegar todos os posteres deste participante
      $sql = "SELECT id, titulo
      FROM ev_resumo
      WHERE
      id_evento='".$this->id_evento."'
      AND (autor = ".$participante['id']." OR co_autor = ".$participante['id'].")
      AND id_tipo_trabalho = 4
      ORDER BY titulo ASC";
      $result = mysql_query($sql);
      while($linha = mysql_fetch_array($result, MYSQL_ASSOC)){
      // Verificar se foram aceitos, e caso SIM,
      // acrescentar no array de pôsteres deste participante
      if($ctrl_avaliacao->aceito($linha['id'], 'poster')){
      //echo "Trabalho Aceito";
      $values[] = "('".$this->id_evento."', '".$participante['id']."', '".$linha['id']."', 'poster', 'sim')";
      }//if
      }//while
      $participante['posteres'] = $posteres; // array

      // Concatenando os values para inserir no banco de dados
      $values = implode(", ", $values);

      $sql = "INSERT INTO ev_presenca(id_evento, id_participante, id_trabalho, tipo, presente) VALUES " . $values;
      //print "SQL: <pre>";
      //	print_r($sql);
      //print "</pre>";
      mysql_query($sql);// or die(mysql_error());
      } //foreach participantes
      return $this->presencas();
      }//function
     */
}
?>