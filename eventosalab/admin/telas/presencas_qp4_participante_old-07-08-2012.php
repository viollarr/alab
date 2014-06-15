<?php
$participante = $GLOBALS["participante"];
// echo "Participante clicado e seus trabalhos<br /><pre>"; print_r($participante); echo "</pre><br />";
?>

<li>
    Coordenador de Sessão: NOME_COMUNICACAO_COORDENADA
    <br />
    Presente: 
    <label><input type="radio" name="coordenador_sessao" value="sim" /> Sim</label>
    <label><input type="radio" name="coordenador_sessao" value="nao" /> N&atilde;o</label>
</li>
<li>
    Autor/Coautor: NOME_TRABALHO_EM_COORDENADA - NOME_COORDENADA
    <br />
    Presente: 
    <label><input type="radio" name="resumo_em_coordenada" value="sim" /> Sim</label>
    <label><input type="radio" name="resumo_em_coordenada" value="nao" /> N&atilde;o</label>
</li>
<?php foreach ($participante['comunicacoes_individuais'] as $comunicacao_individual) { ?>
    <li>
        Autor/Coautor: <span class="titulo_trabalho"><?php echo utf8_encode($comunicacao_individual['titulo']); ?></span>
        <br />
        Presente: 
        <label><input type="radio" name="comunicacao_individual_<?php echo $comunicacao_individual['id']; ?>" onclick="salvar_presenca('sim', '<?php echo $participante['id']; ?>', '<?php echo $comunicacao_individual['id']; ?>', 'comunicacao_individual')" /> Sim</label>
        <label><input type="radio" name="comunicacao_individual_<?php echo $comunicacao_individual['id']; ?>" onclick="salvar_presenca('nao', '<?php echo $participante['id']; ?>', '<?php echo $comunicacao_individual['id']; ?>', 'comunicacao_individual')" /> N&atilde;o</label>
    </li>
<?php } //foreach ?>
<li>
    Ouvinte: 
    <br />
    Presente: 
    <label><input type="radio" name="ouvinte" value="sim" /> Sim</label>
    <label><input type="radio" name="ouvinte" value="nao" /> N&atilde;o</label>
</li>