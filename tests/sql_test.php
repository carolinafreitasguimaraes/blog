<?php
    require_once '../core/sql.php';
    $id = 1;
    $nome = 'Carolina';
    $email = 'carolina.guimaraes@ifsp.edu.br';
    $senha = 'carol123';
    $dados = ['nome' => $nome,
                'email' => $email,
                'senha' => $senha];
    $entidade = 'usuario';
    $criterio = [['id', '=', $id]];
    $campos = ['id', 'nome', 'email'];
    print_r($dados);
    echo '<br>';
    print_r($campos);
    echo '<br>';
    print_r($criterio);
    echo '<br>';

    //Teste geração INSERT
    $instrucao = insert($entidade, $dados);
    echo $instrucao.'<br>';

    //Teste geração UPDATE
    $instrucao = update($entidade, $dados, $criterio);
    echo $instrucao.'<br>';

    //Teste geração SELECT
    $instrucao = select($entidade, $dados, $criterio);
    echo $instrucao.'<br>';

    //Teste geração UPDATE
    $instrucao = delete($entidade, $criterio);
    echo $instrucao.'<br>';
?>