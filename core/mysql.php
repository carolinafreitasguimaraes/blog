<?php

// Função para inserir dados em uma tabela.
function insere(string $entidade, array $dados): bool
{
    $retorno = false;

    foreach ($dados as $campo => $dado) {
        $coringa[$campo] = '?'; // Coringa para o valor do campo.
        $tipo[] = gettype($dado)[0]; // Tipo de dado para o bind_param.
        $$campo = $dado; // Variável dinâmica com o valor do campo.
    }

    $instrucao = insert($entidade, $coringa); // Monta a instrução SQL de inserção.

    $conexao = conecta(); // Estabelece uma conexão com o banco de dados.

    $stmt = mysqli_prepare($conexao, $instrucao); // Prepara a instrução SQL.

    // Liga os parâmetros à instrução SQL dinamicamente usando eval.
    eval('mysqli_stmt_bind_param($stmt, \'' . implode('', $tipo) . '\', $' . implode(', $', array_keys($dados)) . '); ');

    mysqli_stmt_execute($stmt); // Executa a instrução SQL.

    // Verifica se a operação afetou linhas.
    $retorno = (boolean) mysqli_stmt_affected_rows($stmt);

    $_SESSION['erros'] = mysqli_stmt_error_list($stmt); // Armazena erros na sessão.

    mysqli_stmt_close($stmt); // Fecha a instrução.

    desconecta($conexao); // Desconecta do banco de dados.

    return $retorno;
}

// Função para atualizar dados em uma tabela.
function atualiza(string $entidade, array $dados, array $criterio = []): bool
{
    $retorno = false;

    foreach ($dados as $campo => $dado) {
        $coringa_dados[$campo] = '?'; // Coringa para o valor do campo de dados.
        $tipo[] = gettype($dado)[0]; // Tipo de dado para o bind_param.
        $$campo = $dado; // Variável dinâmica com o valor do campo de dados.
    }

    foreach ($criterio as $expressao) {
        $dado = $expressao[count($expressao) - 1];

        $tipo[] = gettype($dado)[0]; // Tipo de dado para o bind_param.
        $expressao[count($expressao) - 1] = '?'; // Coringa para o valor do critério.
        $coringa_criterio[] = $expressao;

        $nome_campo = (count($expressao) < 4) ? $expressao[0] : $expressao[1];

        if (isset($nome_campo)) {
            $nome_campo = $nome_campo . '_' . rand(); // Evita conflito de variáveis.
        }

        $campos_criterio[] = $nome_campo; // Armazena os nomes dos campos de critério.

        $$nome_campo = $dado; // Variável dinâmica com o valor do campo de critério.
    }

    $instrucao = update($entidade, $coringa_dados, $coringa_criterio); // Monta a instrução SQL de atualização.

    $conexao = conecta(); // Estabelece uma conexão com o banco de dados.

    $stmt = mysqli_prepare($conexao, $instrucao); // Prepara a instrução SQL.

    // Liga os parâmetros à instrução SQL dinamicamente usando eval.
    $comando = 'mysqli_stmt_bind_param($stmt,' . "'" . implode('', $tipo) . "'";
    $comando .= ', $' . implode(', $', array_keys($dados));
    $comando .= ', $' . implode(', $', $campos_criterio);
    $comando .= ');';
    eval($comando);

    mysqli_stmt_execute($stmt); // Executa a instrução SQL.

    // Verifica se a operação afetou linhas.
    $retorno = (boolean) mysqli_stmt_affected_rows($stmt);

    $_SESSION['errors'] = mysqli_stmt_error_list($stmt); // Armazena erros na sessão.

    mysqli_stmt_close($stmt); // Fecha a instrução.

    desconecta($conexao); // Desconecta do banco de dados.

    return $retorno;
}

// Função para deletar dados em uma tabela.
function deleta(string $entidade, array $criterio = []): bool
{
    $retorno = false;

    $coringa_criterio = [];

    foreach ($criterio as $expressao) {
        $dado = $expressao[count($expressao) - 1];

        $tipo[] = gettype($dado)[0]; // Tipo de dado para o bind_param.
        $expressao[count($expressao) - 1] = '?'; // Coringa para o valor do critério.
        $coringa_criterio[] = $expressao;

        $nome_campo = (count($expressao) < 4) ? $expressao[0] : $expressao[1];

        $campos_criterio[] = $nome_campo; // Armazena os nomes dos campos de critério.

        $$nome_campo = $dado; // Variável dinâmica com o valor do campo de critério.
    }

    $instrucao = delete($entidade, $coringa_criterio); // Monta a instrução SQL de exclusão.

    $conexao = conecta(); // Estabelece uma conexão com o banco de dados.
    $stmt = mysqli_prepare($conexao, $instrucao); // Prepara a instrução SQL.

    if (isset($tipo)) {
        $comando = 'mysqli_stmt_bind_param($stmt,';
        $comando .= "'" . implode('', $tipo) . "'";
        $comando .= ', $' . implode(', $', $campos_criterio);
        $comando .= ');';

        eval($comando);
    }

    mysqli_stmt_execute($stmt); // Executa a instrução SQL.

    // Verifica se a operação afetou linhas.
    $retorno = (boolean) mysqli_stmt_affected_rows($stmt);

    $_SESSION['errors'] = mysqli_stmt_error_list($stmt); // Armazena erros na sessão.

    mysqli_stmt_close($stmt); // Fecha a instrução.

    desconecta($conexao); // Desconecta do banco de dados.

    return $retorno;
}

// Função para buscar dados em uma tabela.
function buscar(string $entidade, array $campos = ['*'], array $criterio = [], string $ordem = null): array
{
    $retorno = false;
    $coringa_criterio = [];

    foreach ($criterio as $expressao) {
        $dado = $expressao[count($expressao) - 1];

        $tipo[] = gettype($dado)[0]; // Tipo de dado para o bind_param.
        $expressao[count($expressao) - 1] = '?'; // Coringa para o valor do critério.
        $coringa_criterio[] = $expressao;

        $nome_campo = (count($expressao) < 4) ? $expressao[0] : $expressao[1];

        if (isset($$nome_campo)) {
            $nome_campo = $nome_campo . '_' . rand(); // Evita conflito de variáveis.
        }

        $campos_criterio[] = $nome_campo; // Armazena os nomes dos campos de critério.

        $$nome_campo = $dado; // Variável dinâmica com o valor do campo de critério.
    }

    $instrucao = select($entidade, $campos, $coringa_criterio, $ordem); // Monta a instrução SQL de seleção.

    $conexao = conecta(); // Estabelece uma conexão com o banco de dados.

    $stmt = mysqli_prepare($conexao, $instrucao); // Prepara a instrução SQL.

    if (isset($tipo)) {
        $comando = 'mysqli_stmt_bind_param($stmt,';
        $comando .= "'" . implode('', $tipo) . "'";
        $comando .= ', $' . implode(', $', $campos_criterio);
        $comando .= ');';

        eval($comando);
    }

    mysqli_stmt_execute($stmt); // Executa a instrução SQL.

    if ($result = mysqli_stmt_get_result($stmt)) {
        $retorno = mysqli_fetch_all($result, MYSQLI_ASSOC); // Obtém os resultados como um array associativo.

        mysqli_free_result($result); // Libera os resultados.

        $_SESSION['errors'] = mysqli_stmt_error_list($stmt); // Armazena erros na sessão.
    }

    mysqli_stmt_close($stmt); // Fecha a instrução.

    desconecta($conexao); // Desconecta do banco de dados.

    return $retorno;
}
?>